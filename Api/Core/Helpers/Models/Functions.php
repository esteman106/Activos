<?php
namespace Api\Core\Helpers\Models;

use Api\Core\Sessions;

trait Functions {   
    
    protected function stringAleatorio(int $longitud):string{
        $cadena = "";
        $caracteres = "1234567890abcdefghijklmnopqrstuvwxyzABCDFGHIJKLMNOPQRSTWVXYZ";
        for($i = 0; $i < $longitud; $i++) $cadena  .= $caracteres[mt_rand(0, 59)];
        return $cadena;
    }
    
    protected function getConsult(string $column = null)
    {
        if ($this->rows) {
            $datosbd = ((count($this->rows) > 1) || empty($column)) ? $this->rows : $this->rows[0][$column];
            unset($this->rows);
        }else{
            $datosbd=[];
        }
        return $datosbd;
    }
    
    protected function setVar(string $clave,string $valor) {
        Sessions::setGlobal($clave, $valor);
    }

    public function ListarDatos(string $tabla,array $columnas, string $adicionales = '') {
        parent::consultaSimple($tabla, $columnas, $adicionales);
        return $this->getConsult();
    }
}