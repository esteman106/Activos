<?php

require_once('Globals.php');
require_once APP_DIR . 'autoload.php';

try {
   
   new Api\Core\Router;
   
} catch (Exception $e) {
    
    include_once VIEWS_DIR . 'Error'. SD. 'Template.php';
    
}