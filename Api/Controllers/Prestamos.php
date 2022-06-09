<?php

namespace Api\Controllers;

use Api\Core\Helpers\Controller\AuthHelpers;

class Prestamos extends \Api\Core\Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->model = new \Api\Models\Prestamos();
    }

    public function Init()
    {
        $this->Views->Title = 'Prestamos';
        $this->Views->Location = 'Prestamos';
        $this->Views->Chains = ['home'=> PUBLIC_HTML,'url'=> BASE_URL,'notificaciones'=>parent::notificacionesProcesos()];
        $this->Views->generateView('Prestamos');
    }

    public function View(){
        $databd = $this->model->listadoPrestamos();
        $htmlStrings = parent::creaTablaProOptions ( $databd, [
            'Valores' => 'id',
            'Controlador' => 'prestamos',
            'Acciones' => [
                'ver-activo',
                'aprobar'
            ],
            'Iconos' => [
                'eye',
                'thumbs-up'
            ],
            'Titulos' => [
                'Ver Activo',
                'Aprobar prestamo'
            ],
            'Ejecucion' => [
                '_blank',
                '_self'
            ],
            'Condiciones' =>['autorizado','aprobar','1']
        ] );
        header("Content-Type: application/json;charset=utf-8");
        echo $htmlStrings;
        exit ();
    }

    public function Aprobar(string $id){
        if($this->model->aprobarPrestamo(intval($id))){
            AuthHelpers::setNotificacion(['status'=>'success','text'=>'Prestamo realizado con exito!']);
        }else{
            AuthHelpers::setNotificacion(['status'=>'danger','text'=>'Sin inventario disponible no se realiza el prestamo!']);
        }
        self::redirect('prestamos');
    }

    public function Veractivo(string $id){

    }
}