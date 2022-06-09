<?php

namespace Api\Controllers;

class Activos extends \Api\Core\Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->model = new \Api\Models\Activos();
    }

    public function Init()
    {
        $this->Views->Title = 'Activos';
        $this->Views->Location = 'Activos';
        $this->Views->Chains = ['home'=> PUBLIC_HTML,'url'=> BASE_URL];
        $this->Views->generateView('Activos');
    }

    public function View(){
        $databd = $this->model->listarActivos();
        $htmlStrings = parent::creaTablaProOptions ( $databd, [
            'Valores' => 'id',
            'Controlador' => 'activos',
            'Acciones' => [
                'editar',
                'desactivar'
            ],
            'Iconos' => [
                'edit',
                'times'
            ],
            'Titulos' => [
                'Editar Activo',
                'Desactivar'
            ],
            'Ejecucion' => [
                '_blank',
                '_self'
            ]
        ] );
        header("Content-Type: application/json;charset=utf-8");
        echo $htmlStrings;
        exit ();
    }
}