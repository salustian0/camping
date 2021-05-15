<?php namespace App\Controllers;

use App\Libraries\Template;

class Dashboard extends BaseController
{

	private $modules_model = null;
	public function __construct(){
		$this->modules_model= model('\App\Models\Modules_Model');
	}


	public function index()
	{
		
	    $this->template->view('dashboard.tpl');
	}

}
