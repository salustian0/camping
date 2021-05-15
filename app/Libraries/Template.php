<?php 
namespace App\Libraries;

use App\Controllers\Dashboard;
use Smarty;

require_once( APPPATH.'/ThirdParty/smarty-3.1.36/libs/Smarty.class.php' );
class Template extends Smarty {

    public $debug   = false;
    public $isCache = false;
    public $instance = null;


    public function __construct($instance = null){
        parent::__construct();



        $this->template_dir = APPPATH   . "views/";
        $this->compile_dir  = APPPATH   . "views/compiled";
        if ( ! is_writable( $this->compile_dir ) ){
            @chmod( $this->compile_dir, 0777 );
        } 

        $this->cache_dir    = APPPATH   . "cache/";

        // delimiters
        $this->left_delimiter   = '{{';
        $this->right_delimiter  = '}}';

        $this->assign( 'FCPATH'     , FCPATH );     // path to website
        $this->assign( 'APPPATH'    , APPPATH );    // path to application directory
        //$this->assign( 'BASEPATH'   , BASEPATH );   // path to system directory
        $this->assign( 'TITLE'      , TITLE );
        $this->assign( 'DESCRIPTION', DESCRIPTION );
        $this->assign( 'COPYHIGHT'  , COPYHIGHT );
        $this->assign( 'CACHE_BUSTER'  , CACHE_BUSTER );
        $this->assign( 'ENVIRONMENT'  , ENVIRONMENT );
        $this->instance = $instance;
    }

    public function setDebug( $debug=true ){
        if(ENVIRONMENT !== 'development'){
            $this->debug = $debug;
        }
    }

    /**
     * Metodo responsavel por verificar a sessão de modulos e monstar no TPL
     */
    public function permissionMenu(){
        if(isset($_SESSION['modules']) && count($_SESSION['modules'])){
            $this->assign('menu', $_SESSION['modules']);
        }
    }

    /**
     *  Parse a template using the Smarty engine
     *
     * This is a convenience method that combines assign() and
     * display() into one step. 
     *
     * Values to assign are passed in an associative array of
     * name => value pairs.
     *
     * If the output is to be returned as a string to the caller
     * instead of being output, pass true as the third parameter.
     *
     * @access    public
     * @param    string
     * @param    array
     * @param    bool
     * @return    string
     */
    public function view($template, $data = array(), $return = FALSE)
    {

        if ( ! $this->debug ){
            $this->error_reporting = false;
        }
        $this->error_unassigned = false;

        foreach ($data as $key => $val){
            $this->assign($key, $val);
        }
        
        $this->permissionMenu();
        
        if ($return == FALSE){
             $this->display($template);
        }else{
            return $this->fetch($template);
        }
    }

    public function setVar($name = null, $value){
        $this->assign($name,$value);
    }
    
    protected function setJs($js = array()){
        if(isset($js) && count($js)){
            foreach($js as $k => $v){
                $this->assign('js',$v);
            }
        }
    }

    protected function setCss($css = array()){
        if(isset($css) && count($css)){
            foreach($css as $k => $v){
                $this->assign('css',$v);
            }
        }
    }

}