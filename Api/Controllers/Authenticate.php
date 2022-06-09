<?php
namespace Api\Controllers;

use Api\Core\Controller;
                
    class Authenticate extends Controller
    {
        
        public function __construct()
        {
            parent::__construct();
        }
        
        public function Init(){
            if(isset($this->Varwork['ID_USR']) and isset($this->Varwork['Idsesion'])) {
                parent::redirect('dashboard');
            } else {
                $retorno = parent::filtraGlobales(['correo' => FILTER_VALIDATE_EMAIL,'contrasena' => FILTER_SANITIZE_SPECIAL_CHARS,
                    'token_csrf'=>FILTER_SANITIZE_SPECIAL_CHARS]);               
                if($retorno == 103){                    
                    echo json_encode($this->model->consultaUsuario($this->Varwork));
                }
            }
        }
        
    }