<?php

namespace Api\Models;

class Prestamos extends \Api\Core\Models
{
    public function listadoPrestamos(){
        parent::sintaxisLibre('SELECT solicitudes.id, solicitudes.nombres,solicitudes.correo, prestamos.fecha_ini, 
       prestamos.fecha_fin,prestamos.autorizado,inventario.descripcion FROM prestamos INNER JOIN solicitudes ON 
           prestamos.id_solicitante = solicitudes.id INNER JOIN inventario ON prestamos.id_inventario = inventario.id');
        return $this->getConsult();
    }

    public function aprobarPrestamo(int $id){
        parent::consultaSimple('prestamos',['id_inventario'],"WHERE id = ".$id);
        $id_act = intval(parent::getConsult('id_inventario'));
        parent::consultaSimple('inventario',['cantidad'],"WHERE id = ".$id_act);
        $cant = intval(parent::getConsult('cantidad'));
        if($cant > 0){
            --$cant;
            parent::actualizar('inventario',['cantidad'=>$cant],['id'=>$id_act]);
            parent::actualizar('prestamos',['autorizado'=>1],['id'=>$id]);
            return true;
        }else{
            return false;
        }
    }
}