<?php
namespace Api\Controllers;

    use Api\Core\Controller;
                
    class Usuarios extends Controller
    {
    		
        public function __construct(){
            parent::__construct();
        }
        
        public function Init(){
    	    $this->Views->Title = 'Usuarios';
            $this->Views->Location = 'Usuarios';
    	    $this->Views->Chains = ['home'=> PUBLIC_HTML,'url'=> BASE_URL];
    	    $this->Views->generateView('Home','Usuarios');
    	}
    	
    }