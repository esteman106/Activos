<?php
namespace Api\Core;

class Router 
{
    protected mixed $Controller;
    protected mixed $Method;
    protected mixed $Params = [];
    protected string $url;

    /**
     * @throws \Exception
     */
    public function __construct() {
         $this->url = urldecode(parse_url(URI, PHP_URL_PATH));
         
         $data = Helpers::filterUrl($this->url);
         
          $this->Controller = $data['Controller'];
          $this->Method = $data['Method'];
          $this->Params = $data['Params'];
        
          self::get_controller();  
         
         $this->Controller = new $this->Controller;
       
         self::get_method();        
        
        call_user_func_array([$this->Controller, $this->Method], str_replace('-','_',$this->Params));
    }

    /**
     * @throws \Exception
     */
    public function get_controller() {
         if (!Helpers::validateController($this->Controller))     
             throw new \Exception(Helpers::debugErrors('Oops! Error 505 segment not found.'));
         require_once APP_CONTROLLERS .  $this->Controller. ".php";   
         $this->Controller = '\\Api\Controllers\\' . $this->Controller;
    }

    /**
     * @throws \Exception
     */
    private function get_method() {
         if (method_exists($this->Controller, $this->Method)) {
             $this->Method = $this->Method;
         }else{
             throw new \Exception(Helpers::debugErrors('Oops! Error 404 method not found.'));
         }
    }
   
}