<?php
namespace Api\Core;

class Helpers
{
    
    public static function filterUrl(string $url):array
    {
        $data = [];
        $data['Controller'] = DEFAULT_CONTROLLER;
        
        if (BASE_INDEX !== "/") {
            $url = explode("/", str_replace(BASE_INDEX, "", $url));
            if(isset($url[0]) and !empty($url[0])){
                $data['Controller'] = ucfirst(array_shift($url));
                $data['Method'] = empty($url[0]) ? "Init" : ucfirst(str_replace("-","",array_shift($url)));                
            } else $data['Method'] = "Init";
        
        }else{
           $url = array_filter(explode("/", $url));
           if(isset($url[1]) and !empty($url[1])){
              $data['Controller'] = ucfirst(array_shift($url));
              $data['Method'] = empty($url[1]) ? "Init" : ucfirst(str_replace("-","",array_shift($url)));      //Para revision logica          
           } else $data['Method'] = "Init";
        }
        
        $data['Params'] = $url;
        return $data;
    }
    
    public static function validateController(string $controller):bool
    {
        if(!is_file(APP_CONTROLLERS . $controller.".php"))
            return false;
            return true;
    }  
    
    public static function debugErrors(string $param): string
    {
        return $param;
    }
}