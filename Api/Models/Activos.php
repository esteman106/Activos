<?php

namespace Api\Models;

class Activos extends \Api\Core\Models
{
    public function listarActivos(){
        parent::consultaSimple('inventario',['*']);
        return $this->getConsult();
    }
}