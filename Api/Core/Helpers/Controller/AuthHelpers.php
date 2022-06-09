<?php
namespace Api\Core\Helpers\Controller;

    use Api\Core\Sessions;
                
class AuthHelpers {
        
     static public function validateSession() {
         if (Sessions::getGlobal('Acceso') and Sessions::getGlobal('NombreU')) {
                    return true;
           }else{
               return false;
           }
     }
     
     static public function getVarSession() {
         
         $array['Idsesion'] = Sessions::getGlobal('Id_Sesion');
         $array['ID_USR'] = Sessions::getGlobal('ID_COD');
         $array['Perfil'] = Sessions::getGlobal( 'Acceso' );
         
         return $array;
     }
     
     static public function nameUser() {         
         return Sessions::getGlobal('NombreU');        
     }     

     static public function getToken(){
         return Sessions::getGlobal('token');
     }

     static public function setNotificacion(array $mensaje){
         Sessions::setGlobal('Mensajes',$mensaje);
     }
        
}