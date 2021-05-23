<?php namespace App\Controllers;

use App\Controllers\BaseController;

class Orders extends BaseController {
	private $rowPaginate	= 25;
	private $Orders_Model = null;
    private $Products_Model = null;
    private $Users_Model = null;

    private $required_fields = array();

	public function __construct(){
        $this->Orders_Model = model('\App\Models\Orders_Model');
        $this->Products_Model = model('\App\Models\Products_Model');
        $this->Users_Model = model('\App\Models\Users_Model');


        //Campos necessários para o registro
		$this->required_fields['register'] 	 = array('name','description');
		$this->required_fields['change']	 = array();

		$this->ref['plural'] = 'pedidos';
		$this->ref['single'] = 'pedido';

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

	//Verificando se é uma ação de formulario
	public function create(){
	    if(!isset($_SESSION['creating_order'])){
            $_SESSION['creating_order'] = true;
            setToast("Criação de pedido em andamento","info");
        }
	    else
	    {
	        setToast("Já existe uma criação de pedido em andamento.","warning");
        }
        return redirect()->to("index");
    }

	/*Módulo de listagem de dados*/
	public function index(){
		$tpl = array();
		$limit = array("start" => 0, 'limit' => $this->rowPaginate);

		$listing = $this->Orders_Model->listing(array(),$limit);
		if(isset($listing) && count($listing)){
			$tpl['listing'] = $listing;
		}

		$tpl['active_toast'] = true;

		$tpl['js'] = array('list.js','orders.js');


        $total_results = $this->Orders_Model->countPaginate();
        $tpl['total_results'] = isset($total_results) ? $total_results : 0;

		$tpl['pagination'] =  makePaginationView($total_results,$this->rowPaginate);
		$this->template->view("modules/{$this->pathMod}/list.tpl",$tpl);
	}



    //Busca 'Listagem' -> Ajax
	public function search(){
		$text_search = isset($_POST['search']) ? $_POST['search'] : null;
		$page = isset($_POST['page']) ? $_POST['page'] : null;

		$where = array();

		if(!empty($text_search)){
			$where = "(list_orders.user_id like '%{$text_search}%' or list_orders.id like  '%{$text_search}%')";
		}

		$limit = array("start" => ($page * $this->rowPaginate), "limit" => $this->rowPaginate);
		$total = $this->Orders_Model->countPaginate($where);
		$pagination =  makePaginationView($total,$this->rowPaginate,$page);

		$listing = $this->Orders_Model->listing($where,$limit);

		if(isset($listing) && count($listing)){
			$table = 	$this->template->view("modules/{$this->pathMod}/table.tpl",array('listing' => $listing),true);
			echo json_encode(array("table" => $table, "pagination" => $pagination,'total_results' => $total));
			die();
		}
		echo json_encode(false);
	}

    public function search_users(){
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
            $table = 	$this->template->view("modules/{$this->pathMod}/users/table.tpl",array('listing' => $listing),true);
            echo json_encode(array("table" => $table, "pagination" => $pagination,'total_results' => $total));
            die();
        }
        echo json_encode(false);
    }


    public function search_products(){
        $text_search = isset($_POST['search']) ? $_POST['search'] : null;
        $page = isset($_POST['page']) ? $_POST['page'] : null;

        $where = array();

        if(!empty($text_search)){
            $where = "(product.name like '%{$text_search}%' or product.description like  '%{$text_search}%' or category.name like  '%{$text_search}%')";
        }

        $limit = array("start" => ($page * $this->rowPaginate), "limit" => $this->rowPaginate);
        $total = $this->Products_Model->countPaginate($where);
        $pagination =  makePaginationView($total,$this->rowPaginate,$page);

        $listing = $this->Products_Model->listing($where,$limit);

        if(isset($listing) && count($listing)){
            $table = 	$this->template->view("modules/{$this->pathMod}/products/table.tpl",array('listing' => $listing),true);
            echo json_encode(array("table" => $table, "pagination" => $pagination,'total_results' => $total));
            die();
        }
        echo json_encode(false);
    }




	public function delete(){
		$ids = get_var('id',$_POST);
		$count_success = 0;
		if(!empty($ids)){
			foreach($ids as $k => $v){
				$data = array();
				$data['active'] = "N";
				if($this->Orders_Model->change($data,$v)){
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
