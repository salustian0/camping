<?php namespace App\Controllers;

use App\Libraries\Template;

class System extends BaseController
{

	public function __construct(){
	}


	public function get_toasts()
	{
		if(isset($_SESSION['toast'])){
			$toast = $_SESSION['toast'];
			unset($_SESSION['toast']);
			echo json_encode($toast);
		}
		else
		{
			echo json_encode(false);
		}
	}
	public function verify_session(){
	    $status = false;
	    if(isset($_SESSION['painel']['id'])){
	        $status = true;
        }
	    echo json_encode(array("status" => $status));
    }
    public function setActiveMenus(){
	    if(isset($_POST['actives']) && count($_POST['actives'])){
	        $_SESSION['active_menus']['actives'] = $_POST['actives'];
        }
	    if(isset($_POST['opened'])){
	        $_SESSION['active_menus']['opened'] = $_POST['opened'];
        }
	    echo json_encode($_SESSION['active_menus']);
    }
    public function getActiveMenus(){
	    if(isset($_SESSION['active_menus']) && count($_SESSION['active_menus'])){
	        echo json_encode($_SESSION['active_menus'],true);
	        unset($_SESSION['active_menus']);
	        die();
        }
	    echo json_encode(false);
    }

}
