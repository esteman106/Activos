<?php
namespace Api\Controllers;

use Api\Core\Controller;
use Api\Models\Logout as modelLogout;
use Api\Core\Sessions;
                                                
    class Logout extends Controller
    {
    	
        protected $errSesion = '<strong>Sesion no creada!!</strong>, se registra; presione atr&#225;s para regresar a la
					&#250;ltima p&#225;gina vista.';
        
        public function __construct(){
            parent::__construct();
            $this->model = new modelLogout();            
        }
        
        public function Init(){
            if(isset($this->Varwork['ID_USR']) and isset($this->Varwork['Idsesion'])){
                $this->model->registroSalida($this->Varwork['ID_USR']);
                Sessions::closeSession();
                unset($this->Varwork);
                parent::redirect();
            }else {
                $ip = $_SERVER["REMOTE_ADDR"];
                $this->model->ataqueLogout($ip);
                throw new \Exception($this->errSesion);
            }
    	}
    	
    }