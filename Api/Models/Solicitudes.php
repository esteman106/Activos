<?php

namespace Api\Models;

class Solicitudes extends \Api\Core\Models
{
    public function listadoArticulosBd(){
        parent::consultaSimple('inventario',['id','descripcion'],"WHERE cantidad > 0 and estado = 1");
        return parent::getConsult();
    }

    public function ingresarSolicitud(array $data){
        parent::insertar('solicitudes',['nombres'=>$data['nombres'],
            'correo'=>$data['correo'],'id_articulo'=>$data['sel-articulo']]);
        if(!empty($this->last_id)){
            parent::insertar('prestamos',['id_inventario'=>$data['sel-articulo'],
                'id_solicitante'=>$this->last_id,'fecha_ini'=>$data['fecha-ini'],
                'fecha_fin'=>$data['fecha-fin']]);
            return $this->last_id;
        }
    }

    public function descripcionById($id){
        parent::consultaSimple('inventario',['descripcion'],"WHERE id = ".$id);
        return parent::getConsult('descripcion');
    }
}