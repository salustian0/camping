<?php namespace App\Controllers\Settings;

use App\Controllers\BaseController;

class Users extends BaseController {
	private $rowPaginate	= 50;
	private $Users_Model = null;
	private $required_fields = array();

	public function __construct(){
        $this->Users_Model = model('\App\Models\Users_Model');
        $this->Companions_Model = model('\App\Models\Companions_Model');


        //Campos necessários para o registro
		$this->required_fields['register'] 	 = array('name','email');
		$this->required_fields['change']	 = array('name','email');
		$this->ref['plural'] = 'clientes';
		$this->ref['single'] = 'cliente';


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
	    $result = json_decode(base64_decode("eyJ2b3VjaGVyIjpudWxsLCJwbG90cyI6bnVsbCwiY2FyZE51bWJlciI6IjUyNjcuNzcyMC42MDk3Ljk2MzEiLCJjYXJkTmFtZSI6Ikd1aWxoZXJtZSBCYXJjaGEgQ2FyZG9zbyIsImNhcmREb2NOdW1iZXIiOiIxMTEuMTExLjExMS0xMSIsImNhcmREYXRlIjoiMDFcLzI4IiwiY2FyZENWViI6IjI3NiIsImN1c3RvbWVyTmFtZSI6bnVsbCwiY3VzdG9tZXJEb2NOdW1iZXIiOm51bGwsInByb21vVGlja2V0IjpudWxsLCJ0ZXJtc09mVXNlIjoiWSIsInBheW1lbnRUeXBlIjoiY3JlZGl0X2NhcmQiLCJjaGVja291dCI6bnVsbCwidHlwZSI6ImRpZ2l0YWwiLCJpZENlbGVicml0eSI6IjEwNSJ9"),true);
		_pre($result);
		exit;
	    $tpl = array();
		$limit = array("start" => 0, 'limit' => $this->rowPaginate);
		$listing = $this->Users_Model->listing(array(),$limit);

		if(isset($listing) && count($listing)){
			$tpl['listing'] = $listing;
		}

		$tpl['active_toast'] = true;

		$tpl['js'] = array('list.js');

        $total_results = $this->Users_Model->countPaginate();
        $tpl['total_results'] = isset($total_results) ? $total_results : 0;

		$tpl['pagination'] =  makePaginationView($total_results,$this->rowPaginate);
		$this->template->view("modules/{$this->pathMod}/list.tpl",$tpl);
	}

    /*Módulo de registro e edição de dados*/
	public function form(){
		$tpl = array();
		$id = isset($_POST['id']) ? $_POST['id'] : null;

        /* TYPES */
        $types = array(
            '' => 'selecione',
            'A' => 'Acompanhante',
            'C' => 'Cônjuge',
            'F' => 'Filho(a)'
        );

        $tpl['types'] = $types;

        if(isset($id) && !empty($id)){
                $data = $this->Users_Model->getRow($id[0]);
                if(isset($data) && count($data)){
                    $tpl['data'] = $data;
                    $companions = $this->Companions_Model->getCompanionsByUser($id[0]);
                    if(isset($companions) && count($companions)){
                        $tpl['companions'] = $companions;
                    }
                }

        }


			if(isset($this->data_sent['companions'])){
			    $companions = array();
			    foreach ($this->data_sent['companions']['name'] as $k => $v){
			        $type = $this->data_sent['companions']['type'][$k];
			        $companions[] = array(
			            'id' => $k,
                        'name' => $v,
                        'type' => $type
                    );
                }
			    $tpl['companions'] = $companions;
            }

			$js = array('class' => 'form-control', 'id' => 'input-type');
			$selected = isset($data['type']) ? $data['type'] : '';
			
			$slc_type = form_dropdown('type', $types, $selected,$js);
			$tpl['slc_type'] = $slc_type;
			/* TYPES */

		$tpl['js'] = array('table-add.js');
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
		$indexes = array('name','email','password','cpassword');
		$data = setIndexes($indexes,$_POST);
		
		if(isset($data['password'])){
			$data['password'] = password_hash($data['password'],PASSWORD_DEFAULT);
		}

		$data['dtUpdate'] = date('Y-m-d H:i:s');

		//filtrando indices vazios
		$data = array_filter($data);

		// Realizando o update do registro no banco de dados
		if($this->Users_Model->change($data,$id)){
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
			$where = "(users.name like '%{$text_search}%' or users.email like  '%{$text_search}%' or users.id like  '%{$text_search}%' or users.docNumber like  '%{$text_search}%')";
		}

		$limit = array("start" => ($page * $this->rowPaginate), "limit" => $this->rowPaginate);
		$total = $this->Users_Model->countPaginate($where);
		$pagination =  makePaginationView($total,$this->rowPaginate,$page);

		$listing = $this->Users_Model->listing($where,$limit);

		if(isset($listing) && count($listing)){
			$table = 	$this->template->view("modules/{$this->pathMod}/table.tpl",array('listing' => $listing),true);
			echo json_encode(array("table" => $table, "pagination" => $pagination,'total_results' => $total));
			die();
		}
		echo json_encode(false);
	}


	//Método particular desse módulo
	public function change_companions(){
	    $id =  isset($_POST['c_id']) ? $_POST['c_id'] : 0;
	    $data['dtUpdate'] = date('Y-m-d H:i:S');
	    $data['name'] = $_POST['name'];
	    $data['type'] = $_POST['type'];
                if($this->Companions_Model->change($data,$id)){
                    echo json_encode(true);
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
		$exists = $this->Users_Model->already_exists(array('email' => $_POST['email']));
		if(!$exists)
		{
			$data = array();
			$indexes = array('name','email');
			$data = setIndexes($indexes,$_POST);
	
			if(isset($data['password'])){
				$data['password'] = password_hash($data['password'],PASSWORD_DEFAULT);
			}

			$data['dtRegister'] = date('Y-m-d H:i:s');
	
			//filtrando indices vazios
			$data = array_filter($data);
	
			// Realizando o cadastro
            $last_id = $this->Users_Model->record($data);
			if($last_id){
			    if(isset($_POST['companions']) && count($_POST['companions'])){
			        $count_companions = 0;
                    foreach ($_POST['companions']['name'] as $k => $v){
                        $data = array();
                        $data['name'] = $v;
                        $data['type'] = $_POST['companions']['type'][$k];
                        $data['dtRegister'] = date('Y-m-d H:i:s');
                        $data['idUserFk'] = $last_id;

                        if($this->Companions_Model->record($data)){
                            $count_companions++;
                        }
                    }
                    if($count_companions > 0)
                    {
                        $message  = ($count_companions > 1 ? "registrados com sucesso." : "registrado com sucesso.");
                        setToast("{$count_companions} acompanhantes {$message}",'success');
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

	public function delete(){
		$ids = get_var('id',$_POST);
		$count_success = 0;
		if(!empty($ids)){
			foreach($ids as $k => $v){
				$data = array();
				$data['active'] = "N";
				if($this->Users_Model->change($data,$v)){
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
