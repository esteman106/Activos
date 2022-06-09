<?php
namespace Api\Models;

use Api\Core\Models;

class Logout extends Models {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function registroSalida(string $id){
        $this->insertar('logsbd', ['id_proceso'=>105,'id_usr'=>$id]);
    }
    
    public function ataqueLogout(string $ip){
        $this->insertar('logsbd', ['id_proceso'=>106,'info_forms'=>
            'Ejecutado desde IP: '.$ip]);
    }
}