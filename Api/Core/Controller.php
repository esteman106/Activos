<?php
namespace Api\Core;
    
use Api\Core\Helpers\Controller\AuthHelpers;    
use Api\Core\Helpers\Controller\Functions;
use Api\Models\ValidateUser;
                                                 

    abstract class Controller
    {
        
       use Functions;
        
        protected $Views;
        protected $model;
        
        
        public function __construct(){
            $this->Views = new Views;
            $this->model = new ValidateUser();
            if (AuthHelpers::validateSession()){
                $this->Varwork = AuthHelpers::getVarSession();
                $this->Views->nameUsr = AuthHelpers::nameUser();
                $this->Views->profile = $this->Varwork['Perfil'];
            }elseif(!in_array(get_class($this),ALL_USERS)){                
                self::redirect();
            }            
        }
        
        abstract public function Init();

        /**
         * @return Views
         */
        public function getViews(): Views
        {
            return $this->Views;
        }

        /**
         * @param Views $Views
         */
        public function setViews(Views $Views): void
        {
            $this->Views = $Views;
        }


    }