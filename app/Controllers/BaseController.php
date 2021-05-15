<?php 
namespace App\Controllers;
ini_set('memory_limit', '-1');
/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 *
 * @package CodeIgniter
 */

use App\Libraries\Template;
use CodeIgniter\Controller;

class BaseController extends Controller
{
	protected $template = null;
	protected $module = null;
	protected $pathMod = null;
	protected $path = null;
	protected $message = null;
	protected $data_sent = null;
	protected $pager = null;
	protected $ref = array();

	function __construct(){

	}

	/**
	 * An array of helpers to be loaded automatically uponw
	 * class instantiation. These helpers will be available
	 * to all other controllers that extend BaseController.
	 *
	 * @var array
	 */
	public $helpers = ['default','url', 'database','form'];

	/**
	 * Constructor.
	 */
	public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger)
	{
		// Do Not Edit This Line
		parent::initController($request, $response, $logger);

		//--------------------------------------------------------------------
		// Preload any models, libraries, etc, here.
		//--------------------------------------------------------------------
		// E.g.:

		$this->pager = \Config\Services::pager();
		$this->session = \Config\Services::session();
		$this->template = new Template($this);	


		// Prevent XSS input */
		if(count($_GET)){
			$_GET   = filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);
		}
		if(count($_POST)){
			$_POST  = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
		}

		// Dados retornados 
		if(isset($_SESSION['data_sent']) && count($_SESSION['data_sent'])){
			$this->data_sent =  $_SESSION['data_sent'];
			$this->template->setVar('data',$this->data_sent);
			unset($_SESSION['data_sent']);
		}
		
		// Prevent XSS input */

		//Configurando caminho e module
		if(isset($_SESSION['module_settings'])){
			$this->module = $_SESSION['module_settings']['module'];
			$this->pathMod = "/".$_SESSION['module_settings']['path']."/".$_SESSION['module_settings']['module'];
			$this->template->setVar('pathMod',$this->pathMod);

			$this->path = $_SESSION['module_settings']['path'];
			unset($_SESSION['module_settings']);
		}
		/*
		if(isset($_SESSION['error']) && count($_SESSION['error'])){
			$this->template->setVar('error',$_SESSION['error']);
			unset($_SESSION['error']);
		}
		*/

		if(isset($_SESSION['painel']) && isset($_SESSION['painel']['id'])){
			$this->template->setVar('user',$_SESSION['painel']);
		}

		/* Carregando menu */
		if(isset($_SESSION['menu']) && count($_SESSION['menu'])){
			$this->template->setVar('menu',$_SESSION['menu']);
		}

		$this->template->setVar('MODULE_URL',site_url($this->pathMod));


		//$this->default();

		$this->template->setVar('active_toast',true);
		$this->template->setVar('ref',$this->ref);






	}


	


}
