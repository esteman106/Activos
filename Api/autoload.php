<?php 
namespace Api;

spl_autoload_register(callback: function($class){
    if(file_exists($class.".php")) require_once $class.".php";
});    