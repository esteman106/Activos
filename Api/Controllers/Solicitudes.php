<?php
namespace Api\Controllers;

    use Api\Core\Controller;
    use Api\Core\Helpers\Controller\AuthHelpers;
    use Api\Libs\SendMail;

    class Solicitudes extends Controller
    {
    	
        public function __construct() {
            parent::__construct();
            $this->model = new \Api\Models\Solicitudes();
        }
        
    	public function Init(){
    	       $this->Views->Title = 'Solicitudes';
    	       $this->Views->Chains = ['home'=> PUBLIC_HTML,'url'=> BASE_URL,'token'=>parent::tokenCSRF(),
                   'list-articulos'=>self::listadoArticulos(),'notificaciones'=>parent::notificacionesProcesos()];
    	       $this->Views->generateView('FormSolicitud','Home','Home');
    	}

        public function Store(){
            parent::filtraGlobales(['correo' => FILTER_VALIDATE_EMAIL,'nombres' => FILTER_SANITIZE_SPECIAL_CHARS,
                'token_csrf'=>FILTER_SANITIZE_SPECIAL_CHARS,'fecha-ini' => FILTER_DEFAULT,'fecha-fin' => FILTER_DEFAULT,
                'sel-articulo'=>FILTER_SANITIZE_NUMBER_INT]);
            if($this->Varwork['token_csrf'] === AuthHelpers::getToken()){
                    $status = $this->model->ingresarSolicitud($this->Varwork);
                    if (!empty($status)){
                        $lib = new SendMail();
                        $lib->loadTemplate(self::cargarTemplate());
                        $status = $lib->proccessMail();
                        if($status[0]){
                            $this->model->registerLog(115,$status[1]);
                            AuthHelpers::setNotificacion(['status'=>'success','text'=>'Solicitud registrada con exito!']);
                        }else{
                            $this->model->registerLog(116,$status[1]);
                            AuthHelpers::setNotificacion(['status'=>'warning','text'=>'Solicitud registrada con exito, pero sin notificacion a email']);
                        }
                    }else{
                        AuthHelpers::setNotificacion(['status'=>'danger','text'=>'No se pudo registrar la solicitud!']);
                    }
                self::redirect('solicitudes');
            }else{
                throw new \Exception('Error de token, registrado');
            }
        }

        private function listadoArticulos(){
            $databd = $this->model->listadoArticulosBd();
            return parent::creaDatalist($databd,'id','descripcion');
        }

        private function cargarTemplate(){
            $this->Views->Chains = ['url'=> BASE_URL,'nombres'=>$this->Varwork['nombres'],
                'correo'=>$this->Varwork['correo'],'articulo'=>self::consultaDescripcionArt($this->Varwork['sel-articulo']),
                'fecha-ini'=>$this->Varwork['fecha-ini'],'fecha-fin'=>$this->Varwork['fecha-fin']];
            return $this->Views->generateView('template_default','Dashboard',null,2);;
        }

        private function consultaDescripcionArt($id){
            return $this->model->descripcionById($id);
        }

    }