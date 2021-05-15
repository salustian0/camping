<?php namespace App\Controllers;

use App\Controllers\BaseController;

class Category extends BaseController {
	private $rowPaginate	= 25;
	private $Category_Model = null;
	private $required_fields = array();

	public function __construct(){
        $this->Category_Model = model('\App\Models\Category_Model');


        //Campos necessários para o registro
		$this->required_fields['register'] 	 = array('name','description');
		$this->required_fields['change']	 = array();

		$this->ref['plural'] = 'categorias';
		$this->ref['single'] = 'categoria';

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

	/*Módulo de listagem de dados*/
	public function index(){
		$tpl = array();
		$limit = array("start" => 0, 'limit' => $this->rowPaginate);


		$listing = $this->Category_Model->listing(array(),$limit);

		if(isset($listing) && count($listing)){
			$tpl['listing'] = $listing;
		}

		$tpl['active_toast'] = true;

		$tpl['js'] = array('list.js');

        $total_results = $this->Category_Model->countPaginate();
        $tpl['total_results'] = isset($total_results) ? $total_results : 0;

		$tpl['pagination'] =  makePaginationView($total_results,$this->rowPaginate);
		$this->template->view("modules/{$this->pathMod}/list.tpl",$tpl);
	}

    /*Módulo de registro e edição de dados*/
	public function form(){
		$tpl = array();
		$id = isset($_POST['id']) ? $_POST['id'] : null;

        if(isset($id) && !empty($id)){
            $data = $this->Category_Model->getRow($id[0]);
            if(isset($data) && count($data)){
                $tpl['data'] = $data;
            }
        }

        /*Posteriormente pode ser necessário categoria por modulo*/
        //$js = array('class' => 'form-control', 'id' => 'type');
        //$selected = isset($data['category_id']) ? $data['category_id'] : '';

        /* MODULES */
        //$slc_modules = form_dropdown('type', $modules, $selected,$js);
        //$tpl['slc_category'] = $slc_category;
        /* MODULES */

		$tpl['js'] = array();
		$this->template->view("modules/{$this->pathMod}/form.tpl",$tpl);
	}

	//Método de verificação Edição ou registro, ambos utilizam o mesmo formulario
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

    //Alteração de dados
	private function change($id = 0){
		//Verificação se os campos requeridos pelo registro foram informados
		if(!has_fields($this->required_fields['change'],$_POST))
		{
			setToast('por favor preencha os campos necessários.','error');
			return redirect()->to("form");
		}

		$data = array();
		$data = setIndexes($this->required_fields['register'],$_POST);


		$data['dtUpdate'] = date('Y-m-d H:i:s');

		//filtrando indices vazios
		$data = array_filter($data);

		// Realizando o update do registro no banco de dados
		if($this->Category_Model->change($data,$id)){
			setToast("{$this->ref['single']} atualizado com sucesso.",'success');
			return redirect()->to("index");
		}
	}

    //Busca 'Listagem' -> Ajax
	public function search(){
		$text_search = isset($_POST['search']) ? $_POST['search'] : null;
		$page = isset($_POST['page']) ? $_POST['page'] : null;

		$where = array();

		if(!empty($text_search)){
			$where = "(category.name like '%{$text_search}%' or category.description like  '%{$text_search}%' or category.module like  '%{$text_search}%')";
		}

		$limit = array("start" => ($page * $this->rowPaginate), "limit" => $this->rowPaginate);
		$total = $this->Category_Model->countPaginate($where);
		$pagination =  makePaginationView($total,$this->rowPaginate,$page);

		$listing = $this->Category_Model->listing($where,$limit);

		if(isset($listing) && count($listing)){
			$table = 	$this->template->view("modules/{$this->pathMod}/table.tpl",array('listing' => $listing),true);
			echo json_encode(array("table" => $table, "pagination" => $pagination,'total_results' => $total));
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
		$exists = $this->Category_Model->already_exists(array('category.name' => $_POST['name']));

		if(!$exists)
		{
			$data = array();

			$data = setIndexes($this->required_fields['register'],$_POST);

			$data['dtRegister'] = date('Y-m-d H:i:s');
			$data['idAdministratorFk'] = $_SESSION['painel']['id'];

	
			//filtrando indices vazios
			$data = array_filter($data);
	
			// Realizando o cadastro
            $last_id = $this->Category_Model->record($data);
			if($last_id){
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

	public function delete(){
		$ids = get_var('id',$_POST);
		$count_success = 0;
		if(!empty($ids)){
			foreach($ids as $k => $v){
				$data = array();
				$data['active'] = "N";
				if($this->Category_Model->change($data,$v)){
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
