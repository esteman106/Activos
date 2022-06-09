<?php
namespace Api\Controllers;

    use Api\Core\Controller;    
                                    
    class Home extends Controller
    {
    	
        public function __construct() {
            parent::__construct();
        }
        
    	public function Init(){
    	    if(isset($this->Varwork['ID_USR']) and isset($this->Varwork['Idsesion'])) {
    	        parent::redirect('dashboard');
    	    }else {
    	       $this->Views->Title = 'Login'; 
    	       $this->Views->Chains = ['home'=> PUBLIC_HTML,'url'=> BASE_URL,'token'=>parent::tokenCSRF()];
    	       $this->Views->generateView('Login','Home','Home'); // stml - carpeta - plantilla - operador 1 default, 2 solo shtml
    	    }
    	}
    	
    }