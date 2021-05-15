<?php namespace App\Controllers;

class Login extends BaseController{
    private $administrators_model = null;
    private $modules_model = null;
    public function __construct()
    {
        $this->administrators_model = model('App\Models\Administrators_Model');
        $this->modules_model = model("App\Models\Modules_Model");

    }

    public function index(){

        //processa login
        if(isset($_POST['login'])){
            return $this->login_auth();
        }
        
        $this->template->view('login.tpl');
    }

    private function login_auth(){
        $rows = array();


        $rows['email'] 		= empty($_POST['email']) ? NULL : $_POST['email'];
        $rows['password'] 	= empty($_POST['password']) ?  NULL :$_POST['password'];
        if(empty($rows['email']) or empty($rows['password'])){
            setToast('por favor preencha os campos necessários.','error');
            reportData($rows);
            return redirect()->to('index');
        }



        $user = $this->administrators_model->getPasswordByUsername($rows['email']);

        if(isset($user) and is_array($user) and count($user)){
            $db_password = $user['password'];
            //Verificando senha 
            if(password_verify($rows['password'],$db_password)){
                $user_data = $this->administrators_model->getUserById($user['id']);
                $session = array();
				$session['name'] 		= $user_data['name'];
				$session['email'] 		= $user_data['email'];
				$session['id'] 			= $user_data['id'];
                //$session['perfil'] 		= $user_data['perfil'];
                $_SESSION['painel'] = $session;

              //<Modulos
              //Listando menu link pai
              $modulesDad  = $this->modules_model->getModulesDadByAdm($_SESSION['painel']['id']);
              //Listando menu link filho -> dropdown case
              if(isset($modulesDad) && count($modulesDad)){
                  foreach($modulesDad as $k => $v){
                     $modulesChilds = $this->modules_model->getModulesChilds($v['id'],$_SESSION['painel']['id']);
                     if(isset($modulesChilds) && count($modulesChilds)){
                        $modulesDad[$k]['childs'] = $modulesChilds;
                     }
                  }
                  $_SESSION['menu'] = $modulesDad;
                }

              //Modules>
				
                //Redirecionar para a dashboard
                setToast("Bem vindo(a) {$user_data['name']}",'success');
                return redirect()->to('dashboard');
            }
            else
            {
                setToast('senha inválida','error');
                reportData($rows);
                return redirect()->to('index');
            }
        }
        else
        {
            setToast('Usuario não encontrado na base de dados.','error');
            reportData($rows);
            return redirect()->to('index');
        }      
        
    }
    
    function logout(){
        session_destroy();
        return redirect()->to(site_url("/"));
    }
}