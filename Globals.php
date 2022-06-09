<?php

setlocale(LC_ALL, 'es_CO');
const PROTOCOLO = 'http' . '://';
const DOMAIN_URL = PROTOCOLO . 'localhost';

/* Segmento del lado del Servidor */
const SD = DIRECTORY_SEPARATOR;
define('ROOT', realpath(dirname(__FILE__)) . SD);
const APP_DIR = ROOT . 'Api' . SD;
const APP_CONTROLLERS = APP_DIR . 'Controllers' . SD;
const VIEWS_DIR = APP_DIR . 'Views' . SD;
const PUBLIC_DIR = ROOT . 'Public' . SD;
const LIBS_DIR = APP_DIR . 'Libs' . SD;
/* Segmento URL */
define('SERVER_EXECUTION', $_SERVER['SERVER_NAME']);
define('URI',$_SERVER['REQUEST_URI']);
const PUBLIC_HTML = DOMAIN_URL . '/activos/Public/';
const ASSETS = DOMAIN_URL . '/activos/Public/vendor/';
const BASE_INDEX = '/activos/'; // Si, no esta en subcarpeta solo colocar '/'
const BASE_URL = DOMAIN_URL . BASE_INDEX;

/* Datos de protecion de sesiones y control de pruebas email */
const DATA_KEY = 'MujRiz1wk(TwgsjYKGKv';
const SSL_INIT = FALSE;
const HTTP_ONLY = TRUE;
const SESION_NAME = 'ACTIVOS_APP';
/* Configuracion de correo */
const SMTP_AUTH = true; // Valor por defecto
const HOST_EMAIL = ''; // direccion de servidor SMTP
const TEST_EMAIL = ''; // Cambiar para envio de notificaciones
const NOTIFY_EMAIL = ''; // Quien recibe las notificaciones
const SUBJECT_DEFAULT = 'Notificacion de Solicitud';
const PASS_EMAIL = ''; // Clave de cuenta que envia las notificaciones
const PROTOCOL_EMAIL = 'ssl';
const PORT_EMAIL = 465;

/* Formateo contenido */
const ALL_USERS = ['Api\Controllers\Home', 'Api\Controllers\Authenticate', 'Api\Controllers\Logout','Api\Controllers\Solicitudes'];
const DEFAULT_CONTROLLER = 'Home';
const FORMAT_CONTENT = 'UTF-8';
const EXT_CONTENT = '.shtml';
const LNG_CONTENT = 'es'; // Refer - https://www.w3schools.com/tags/ref_language_codes.asp


/* Segmento base de datos */
const BD_DATOS = [
    'host' => 'localhost',
    'nombreBD' => 'activos',
    'usuario' => 'root',
    'password' => ''
];