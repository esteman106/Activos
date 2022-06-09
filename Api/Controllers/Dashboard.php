<?php
namespace Api\Controllers;

use Api\Core\Controller;
                                
    class Dashboard extends Controller
    {
    		
        public function __construct(){
            parent::__construct();
        }
        
        public function Init(){
    	    $this->Views->Title = 'Dashboard';
    	    $this->Views->Chains = ['home'=> PUBLIC_HTML,'url'=> BASE_URL];
    	    $this->Views->generateView('Home'); // 1 - shtml,  
    	}
    	
    }