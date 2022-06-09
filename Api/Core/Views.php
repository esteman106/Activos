<?php 
namespace Api\Core;

    class Views
    {
        
        public $AddBody = '';
        public $Title = '';
        public $Chains = [];
        
       
        /**
         * @param string $view
         * @param string $template
         * @param int $oper
         * @throws \Exception
         * @return string
         */
        public function generateView(string $view, string $folder = null, string $template = null, int $oper = 1)
        {
            $folder = $folder ?? 'Dashboard';
            $template = $template ?? 'Dashboard';
            $routeView = PUBLIC_DIR . $folder . SD .  $view . EXT_CONTENT;            
            $temp = VIEWS_DIR . $template . SD . 'Template.php';            
            if(is_readable($routeView) and is_readable($temp) and $oper === 1){                
                $this->AddBody = self::render(self::getContent($routeView)); // renderiza el shtml              
                require_once $temp;
                
            }elseif (is_readable($routeView) and $oper === 2){ // Solo leer el shtml
                
                $htmlchains = self::render(self::getContent($routeView));
                return $htmlchains;
                
            }else {
                throw new \Exception('Vista no Disponible');
            }
        }
        
        /**
         * @param string $file
         * @return string
         */
        private function getContent(string $file):string
        {            
            $htmlTemp = mb_convert_encoding(file_get_contents($file),FORMAT_CONTENT);
            return $htmlTemp;            
        }
        
        /**
         * @param string $html
         * @return string
         */
        private function render(string $html = NULL):string
        {
            foreach($this->Chains as $key => $valor){
                if(is_array($valor)){
                    foreach ($valor as $key2 => $string) {
                        $html = str_replace('{'.$key2.'}', $string, $html);
                    }
                }else{
                    $html = str_replace('{'.$key.'}', $valor, $html);
                }
            }
            return $html;
        }       
    }