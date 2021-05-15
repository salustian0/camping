<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class fAuth implements FilterInterface
{
    private $session;
    private $template;

    function __construct()
    {
        $this->session = \Config\Services::session();
    }

    public function before(RequestInterface $request, $arguments = null)
    {
        $uri = service('uri');
        //Setando informações de caminho e modulo
        $router = service('router'); 
        $path = strtolower(str_replace("\\App\\Controllers\\",'',$router->controllerName()));
        $path = array_filter(explode('\\',$path));
        


        $arr['module'] = end($path);
        unset($path[count($path) -1]);
        $arr['path'] = implode('/',$path);

        session()->set('module_settings',$arr);

      //Setando informações de caminho e modulo

        //Controle de acesso
        if($arr['module'] == 'login' && $router->methodName() != 'logout'){
            if(isset($_SESSION['painel'])){
                return redirect()->to(site_url('dashboard'));
            }
        }
        else if(!isset($_SESSION['painel'])){
         return redirect()->to(site_url('login/index'));
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    
    }
}