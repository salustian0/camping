<?php namespace App\Controllers\Settings;

use App\Controllers\BaseController;

class Administrator extends BaseController {
	private $rowPaginate	= 3;
	private $administrator_model = null;
	private $required_fields = array();


	public function __construct(){
        $this->administrator_model = model('\App\Models\Administrators_Model');
		$this->ModulesRelAdministrators_Model = model('\App\Models\ModulesRelAdministrators_Model');
		$this->Modules_Model = model('\App\Models\Modules_Model');

		/* Variável utilizada para referencia ao modulo -> utilizado na view */
		$this->ref['single'] = "administrador";
		$this->ref['plural'] = "administradores";
		

		//Campos necessários para o registro
		$this->required_fields['register'] 	 = array('name','email','password','cpassword');
		$this->required_fields['change']	 = array('name','email');

	}


	//Verificando se é uma ação de formulario
	public function submit(){
		$action = isset($_POST['action']) && !empty($_POST['action']) ? $_POST['action'] : null;
		
		$_SESSION['data_sent'] = $_POST;

		if(method_exists($this,$action)){
			return $this->$action();
			die();
		}
		else
		{
			return redirect()->to(site_url('404'));
		}
	}

	public function index(){
		$tpl = array();
		$limit = array("start" => 0, 'limit' => $this->rowPaginate);

		$listing = $this->administrator_model->listing(array(),$limit);
		if(isset($listing) && count($listing)){
			$tpl['listing'] = $listing;
		}
			
		$tpl['js'] = array('list.js');

        $total_results  = $this->administrator_model->countPaginate();
        $tpl['total_results'] = isset($total_results) ? $total_results : 0;

		$tpl['pagination'] =  makePaginationView($total_results,$this->rowPaginate);
		$this->template->view("modules/{$this->pathMod}/list.tpl",$tpl);
	}

	public function form(){
		$tpl = array();
		$id = isset($_POST['id']) ? $_POST['id'] : null;

	
		if(isset($id) && !empty($id)){
			$data = $this->administrator_model->getRow($id[0]);
			if(isset($data) && count($data)){
				$tpl['data'] = $data;
			}
		}
			//<Modulos

              //Listando menu link pai
			  
			  $findModulesId = isset($id[0]) ? $id[0] : 0;
              $modulesDad  = $this->Modules_Model->getAllModulesDad($findModulesId);

              //Listando menu link filho -> dropdown case
              if(isset($modulesDad) && count($modulesDad)){
                  foreach($modulesDad as $k => $v){
                     $modulesChilds = $this->Modules_Model->getAllModulesChilds($v['id'],$findModulesId);
                     if(isset($modulesChilds) && count($modulesChilds)){
                        $modulesDad[$k]['childs'] = $modulesChilds;
                     }
                  }
                  $tpl['list_modules'] = $modulesDad;
                }

              //Modules>

		$this->template->view("modules/{$this->pathMod}/form.tpl",$tpl);
	}

	public function save(){

			$id = isset($_POST['id']) ? $_POST['id'] : null;

			/* Decisão alteração ou registro*/
			if(empty($id))
			{
				return $this->register();
			}
			else
			{
				return $this->change($id);
			}
	}


	private function change($id = 0){
		//Verificação se os campos requeridos pelo registro foram informados
		if(!has_fields($this->required_fields['change'],$_POST))
		{
			setToast('por favor preencha os campos necessários.','error');
			return redirect()->to("form");
		}

		$data = array();
		$indexes = array('name','email','password','cpassword');
		$data = setIndexes($indexes,$_POST);
		
		if(isset($data['password'])){
			$data['password'] = password_hash($data['password'],PASSWORD_DEFAULT);
		}

		$data['dtUpdate'] = date('Y-m-d H:i:s');

		//filtrando indices vazios
		$data = array_filter($data);

		//Acesso aos modulos
		if(isset($_POST['access']) && count($_POST['access'])){
			$this->ModulesRelAdministrators_Model->remove(array('idAdministratorFk' => $id));
			foreach($_POST['access'] AS $ka => $va){
				$access = array();
				$access['idAdministratorFk'] = $id;
				$access['idModuleFk']		 = $va;
				$access['dtRegister']		 = date('Y-m-d H:i:s');

				$this->ModulesRelAdministrators_Model->record($access);
			}
		}


		// Realizando o update do registro no banco de dados
		if($this->administrator_model->change($data,$id)){
			setToast("{$this->ref['single']} atualizado com sucesso.",'success');
			return redirect()->to("index");
		}
	}


	public function search(){
		$text_search = isset($_POST['search']) ? $_POST['search'] : null;
		$page = isset($_POST['page']) ? $_POST['page'] : null;

		$where = array();

		if(!empty($text_search)){
			$where = "(administrators.name like '%{$text_search}%' or administrators.email like  '%{$text_search}%' or administrators.id like  '%{$text_search}%')";
		}

		$limit = array("start" => ($page * $this->rowPaginate), "limit" => $this->rowPaginate);
        $total_results  = $this->administrator_model->countPaginate($where);
        $pagination =  makePaginationView($total_results,$this->rowPaginate,$page);
		$listing = $this->administrator_model->listing($where,$limit);

		if(isset($listing) && count($listing)){
			$table = 	$this->template->view("modules/{$this->pathMod}/table.tpl",array('listing' => $listing),true);
			echo json_encode(array("table" => $table, "pagination" => $pagination,'total_results' => $total_results));
			die();
		}
		echo json_encode(false);
	}



	private function register(){

		//Verificação se os campos requeridos pelo registro foram informados
		if(!has_fields($this->required_fields['register'],$_POST))
		{
			setToast('por favor preencha os campos necessários.','error');
			return redirect()->to("form");
		}


		$exists = $this->administrator_model->already_exists(array('email' => $_POST['email']));
		if(!$exists)
		{
			$data = array();
			$indexes = array('name','email','password','cpassword');
			$data = setIndexes($indexes,$_POST);
	
			if($data['password'] === $data['cpassword'])
			{
				$data['password'] = password_hash($data['password'],PASSWORD_DEFAULT);
			}
			else
			{
				setToast('As senhas não coincidem','error');
				return redirect()->to("index");
			}
	
			$data['dtRegister'] = date('Y-m-d H:i:s');
	
			//filtrando indices vazios
			$data = array_filter($data);

			// Realizando o cadastro
			$id = $this->administrator_model->record($data);
			if($id)
			{
							//Acesso aos modulos
							if(isset($_POST['access']) && count($_POST['access'])){
								foreach($_POST['access'] AS $ka => $va){
									$access = array();
									$access['idAdministratorFk'] = $id;
									$access['idModuleFk']		 = $va;
									$access['dtRegister']		 = date('Y-m-d H:i:s');

									$this->ModulesRelAdministrators_Model->record($access);
								}
							}
				setToast("{$this->ref['single']} registrado com sucesso!",'success');
				return redirect()->to("index");
			}
		}
		else
		{
			setToast("{$this->ref['single']} já existente na base de dados",'warning');
			return redirect()->to("form");
		}
		
	}

	// Ação de deletar registros -> Ajax
	public function delete(){
		$ids = get_var('id',$_POST);
		$count_success = 0;
		if(!empty($ids)){
			foreach($ids as $k => $v){
				$data = array();
				$data['active'] = "N";
				if($this->administrator_model->change($data,$v)){
					$count_success++;
				}
			}
			if($count_success > 0)
			{
				$data['message'] = ($count_success > 1 ? "{$count_success} {$this->ref['plural']} deletados com sucesso." : "{$this->ref['single']} deletado com sucesso.");
				$data['type'] = 'success';
				echo json_encode($data);
			}else
			{
				$data['message'] = 'Nenhum dado foi modificado, por favor tente novamente mais tarde.';
				$data['type'] = 'error';
				echo json_encode($data);
			}
		}else
		{
			echo json_encode(false);
		}
	}
}
