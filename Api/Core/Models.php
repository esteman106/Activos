<?php
namespace Api\Core;

use Api\Core\Helpers\Models\Functions as FunctionsModels;

abstract class Models extends Database
{
    use FunctionsModels;    
    
    public function __construct() {        
        parent::conectarBD();
    }
    
    protected function convertSHA512(string $pass, string $salt):string     
    {
        return hash('sha512', $pass . $salt);         
    }

    public function registerLog(int $proceso, string $nota = null, string $id_usr = null){
        parent::insertar('logsbd', ['id_proceso'=>$proceso,'info_forms'=>$nota,'id_usr'=>$id_usr]);
    }

}