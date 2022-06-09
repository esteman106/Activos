<?php
namespace Api\Core;
/*******************************************************************************
 * Sesiones Clase                                                               *
 *                                                                              *
 * Version: 1.00                                                                *
 * Date:    2019-03-04                                                          *
 * Author:  Manuel Romero                                                       *
 *******************************************************************************/
class Sessions
{
    
    public static function initSession() {
        session_start();
    }
    
    public static function configSession(){
        $session_name = SESION_NAME;
        $secure = SSL_INIT;
        $httponly = HTTP_ONLY;
        if (ini_set('session.use_only_cookies', 1) === FALSE) {
            exit();
        }
        $cookieParams = session_get_cookie_params();
        session_name($session_name);
        session_set_cookie_params($cookieParams["lifetime"],
            $cookieParams["path"],
            $cookieParams["domain"],
            $secure,
            $httponly);
    }
    
    public static function refreshSession(){
        session_regenerate_id();
    }
    
    public static function closeSession(){
        $params = session_get_cookie_params ();
        setcookie ( session_name (), '', time () - 42000, $params ["path"], $params ["domain"], $params ["secure"], $params ["httponly"] );
        $_SESSION = array ();
        session_destroy ();
    }
    
    public static function setGlobal(string $clave, $valor){
        if (!empty($clave)){
            $_SESSION[$clave] = $valor;
        }
    }
    
    public static function getGlobal(string $clave){
        if (isset($_SESSION[$clave])){
            return $_SESSION[$clave];
        }
    }
    
    public static function deleteGlobal(string $clave){
        if (isset($_SESSION[$clave])) {
            unset($_SESSION[$clave]);
        }
    }
    
}