<?php

namespace Api\Models;

use Api\Core\Models;
use Api\Core\Sessions;

class ValidateUser extends Models 
{
    
    public function __construct() {
        parent::__construct();
        Sessions::configSession();
        Sessions::initSession();
    }
    
    /**
     * @param array $args
     * @return array
     */
    public function consultaUsuario(array $args):array
    {
        if($args['token_csrf'] === Sessions::getGlobal('token')) {
            $info = self::consultUser($args['correo']);            
            if (count($info) === 2) {
                return $info;
            }else {
                return self::iniciarSesion(parent::convertSHA512($args['contrasena'], $info['salt']),$info);
            }
       }else{
           parent::insertar('logsbd', ['id_proceso'=>107,'info_forms'=>implode(',',$args)]);
           throw new \Exception('Error de token, registrado');
       }       
    }
    
    private function consultUser(string $correo):array 
    {
        $this->consultaSimple('usuarios', ['id','nombres','clave','salt','permisos','intentos','bloqueo'],
            "WHERE correo='". $correo. "' LIMIT 1" );
        if (!empty($this->rows)){
             $data = $this->rows[0];
             unset($this->rows);                       
             return self::validarBloqueos($data);
        }else{           
            parent::insertar('logsbd', ['id_proceso'=>102,'info_forms'=>'Cuenta: '.$correo]);           
            return array (102,'Cuenta Inexistente');
        }
    }
    
    private function validarBloqueos(array $data):array
    {
        if(intval($data['permisos']) === 0 || intval($data['permisos']) === 3){           
            parent::insertar('logsbd', ['id_proceso'=>103,'id_usr'=>$data['id']]);
            return array (104,'Cuenta Deshabilitada, contacte a soporte');
        }else{
            if ($data['bloqueo'] < time()) {
                return $data;
            }else {
                parent::insertar('logsbd', ['id_proceso'=>104,'id_usr'=>$data['id']]);
                return array (103,'Cuenta Bloqueada, intente mas tarde');
            }           
        }
    }
    
    private function iniciarSesion(string $pass, array $data):array
    {
        if($pass == $data['clave']){
            parent::setVar('NombreU', $data['nombres']);
            parent::setVar('Id_Sesion', session_id());
            parent::setVar('ID_COD', $data['id']);
            parent::setVar('Acceso', $data['permisos']);           
            parent::insertar('logsbd', ['id_proceso'=>100,'id_usr'=>$data['id']]);
            return array (100,'Bienvenido ' . $data['nombres']);
        }else {
            return self::ingresaIntentos($data);
        }
    }
    
    private function ingresaIntentos(array $data):array
    {
        if (intval($data['intentos']) < 3){// Incrementar si se requieren mas intentos
            $intc = $data['intentos'] + 1;
            parent::insertar('logsbd', ['id_proceso'=>101,'id_usr'=>$data['id']]);
            parent::actualizar("usuarios",['intentos' => $intc],["id" => $data['id']]);
            return array (101,'Clave Incorrecta');
        }else{
            $bloqt = time() + (10*60); // Bloqueo por 10 min
            parent::insertar('logsbd', ['id_proceso'=>103,'id_usr'=>$data['id']]);
            parent::actualizar("usuarios",['intentos'=> 0,'bloqueo' => $bloqt],["id" => $data['id']]);
            return array (103,'Cuenta Bloqueada, intente mas tarde');
        }
    }
    
}