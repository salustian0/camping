<?php namespace App\Controllers;

use App\Controllers\BaseController;

class Companions extends BaseController {
	private $rowPaginate	= 25;
	private $Companions_Model = null;
	private $required_fields = array();

	public function __construct(){
        $this->Companions_Model = model('\App\Models\Companions_Model');	
		$this->Users_Model = model('\App\Models\Users_Model');	

		//Campos necessários para o registro
		$this->required_fields['register'] 	 = array('name','type','idUserFk');
		$this->required_fields['change']	 = array('name','type');
		$this->ref['plural'] = 'acompanhantes';
		$this->ref['single'] = 'acompanhante';

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

		$listing = $this->Companions_Model->listing(array(),$limit);
		if(isset($listing) && count($listing)){
			$tpl['listing'] = $listing;
		}
			
		$tpl['active_toast'] = true;
		$tpl['js'] = array('list.js');

		$total_results = $this->Companions_Model->countPaginate();

		$tpl['total_results'] = isset($total_results) ? $total_results : 0;

		$tpl['pagination'] =  makePaginationView($total_results,$this->rowPaginate);
		$this->template->view("modules/{$this->pathMod}/list.tpl",$tpl);
	}

	public function form(){
		$tpl = array();
		$id = isset($_POST['id']) ? $_POST['id'] : null;
		$data = array();
	
		if(isset($id) && !empty($id)){
			$data = $this->Companions_Model->getRow($id[0]);
			if(isset($data) && count($data)){
				$tpl['data'] = $data;
			}
		}else
		{
		    setToast("<a href='".site_url("settings/users")."'>O Registro de {$this->ref['plural']} é permitido somente pelo móduto de Clientes</a>", "error");
            return redirect()->to('index');
		}

	

		$tpl['js'] = array('companions.js','list.js');
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

    //Método adaptado para este módulo -> Ajax
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

		// Realizando o update do registro no banco de dados
		if($this->Companions_Model->change($data,$id)){
			setToast("{$this->ref['single']} atualizado com sucesso.",'success');
			return redirect()->to("index");
		}
	}


	public function search(){
		$text_search = isset($_POST['search']) ? $_POST['search'] : null;
		$page = isset($_POST['page']) ? $_POST['page'] : null;

		$where = array();

		if(!empty($text_search)){
			$where = "(companions.name like '%{$text_search}%' or companions.idUserFk like  '%{$text_search}%'  or users.name like  '%{$text_search}%' or companions.id like  '%{$text_search}%' or users.docNumber like  '%{$text_search}%')";
		}

        $limit = array("start" => ($page * $this->rowPaginate), "limit" => $this->rowPaginate);
        $total = $this->Companions_Model->countPaginate($where);
        $pagination =  makePaginationView($total,$this->rowPaginate,$page);

        $listing = $this->Companions_Model->listing($where,$limit);

        if(isset($listing) && count($listing)){
            $table = 	$this->template->view("modules/{$this->pathMod}/table.tpl",array('listing' => $listing),true);
            echo json_encode(array("table" => $table, "pagination" => $pagination,'total_results' => $total));
            die();
        }
        echo json_encode(false);
	}



	//Método adaptado para este módulo -> Ajax
	public function register(){
        $data = array();
        $indexes = array('name','type','idUserFk');
        $data = setIndexes($indexes,$_POST);
        $data['dtRegister'] = date('Y-m-d H:i:s');
        $data = array_filter($data);



        //Verificação se os campos requeridos pelo registro foram informados
		if(!has_fields($this->required_fields['register'],$data))
		{
            $data['message'] = "Por favor preencha os campos necessários";
            $data['type'] = 'error';
            echo json_encode($data);
            exit();
		}


		//type = C -> conjugê permitido somente 1 por cliente.
		$exists = ($data['type'] === "C" &&  $this->Companions_Model->already_exists(array('idUserFk' => $data['idUserFk'], 'type' => "C")));

		if(!$exists)
		{
			// Realizando o cadastro
			$last_id = $this->Companions_Model->record($data);

            if($last_id){
                $data['message'] = "{$this->ref['single']} adicionado com sucesso.";
                $data['type'] = 'success';
                $data['id'] = $last_id;
                echo json_encode($data);
			}else
			{
                $data['message'] = "Houve um erro durante a tentativa de registro, por favor tente novamente mais tarde";
                $data['type'] = 'success';
                echo json_encode($data);
            }
		}
		else
		{
            $data['message'] = "Já existe um conjugê registrado para esse usuario, você pode excluir ou editar.";
            $data['type'] = 'error';
            echo json_encode($data);
		}

	}
	public function delete(){
		$ids = get_var('id',$_POST);

		$count_success = 0;
		if(!empty($ids)){
			foreach($ids as $k => $v){
				$data = array();
				$data['active'] = "N";
				if($this->Companions_Model->change($data,$v)){
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
