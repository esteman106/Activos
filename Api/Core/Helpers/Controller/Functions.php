<?php
namespace Api\Core\Helpers\Controller;

use Api\Core\Sessions;

trait Functions {
    
   
    protected $Varwork = [];
    protected $errInput = '<a href="javascript:history.back(1)"><i class="fa fa-arrow-circle-left"></i></a>
					<strong>Error, Intento de ataque!!</strong>, se registra; presione atr&#225;s para regresar a la
					&#250;ltima p&#225;gina vista.';    
  
    
    protected static function redirect(string $ruta = NULL) {
        if ($ruta) {
            header ( 'location:' . BASE_URL . $ruta );
            exit ();
        } else {
            header ( 'location:' . BASE_URL );
            exit ();
        }
    }
    
    protected function filtraGlobales(array $argumentos,int $tipo = INPUT_POST)
    {
        $entradasPost = filter_input_array($tipo, $argumentos);
        if($entradasPost and is_array($entradasPost)){
            $this->Varwork = $this->Varwork + $entradasPost;
            unset($_POST);
            return 103;
        }else{
            throw new \Exception($this->errInput);
        }
    }
    
    /* Cargador de archivos en formularios */
    
    protected static function procesaArchivo(array $params)
    {
        if (isset($_FILES[$params['nombre']]) and is_uploaded_file($_FILES[$params['nombre']]['tmp_name'])) {
            $tmp_name = $_FILES[$params['nombre']]['tmp_name'];
            $nombre = $_FILES[$params['nombre']]['name'];
            $nombre = str_replace(" ","",$nombre);
            $extension = explode(".", strtolower($nombre));
            if (in_array($extension[1], $params['extensiones']))
            {
                move_uploaded_file($tmp_name, $params['ubicacion'] . $nombre);
                return $nombre;
            }else{
                return 103;// Extension desconocida
            }
        }else{
            return 102; // Archivo no cargado
        }
    }
    
    protected function tokenCSRF() {
        Sessions::setGlobal('token', bin2hex(random_bytes(32)));
        return '<input type="hidden" name="token_csrf" value="'.Sessions::getGlobal('token').'"/>';
    }
    
    /* Codificadores de URL y decodificador */
    
    protected static function codificadorUrl(string $caracteres, string $fcontrol = DATA_KEY):string
    {
        $caracteres= \utf8_encode($caracteres);
        $caracteres = $fcontrol.$caracteres.$fcontrol;
        $caracteres = base64_encode($caracteres);
        return $caracteres;
    }
    
    protected static function decodificadorNoget(string $caracteres, string $fcontrol = DATA_KEY):string
    {
        $caracteres = base64_decode($caracteres);
        $fcontrol= DATA_KEY;
        $caracteres = str_replace($fcontrol, "", "$caracteres");
        $caracteres = utf8_decode($caracteres);
        return $caracteres;
    } 
    
    /* Crea un listado para select */
    protected static function creaListaselec(array $datadb,string $dat1,string $dat2, string $seleccion = null):string
    {
        $datafinal = "";
        for ($i = 0; $i < count($datadb); $i++){
            if(!empty($seleccion) and $datadb[$i][$dat1] === $seleccion){
                $datafinal .= '<option value="'.$datadb[$i][$dat1].'" selected>'.$datadb[$i][$dat2].'</option>';
            }else
                $datafinal .= '<option value="'.$datadb[$i][$dat1].'">'.$datadb[$i][$dat2].'</option>';
        }
        return $datafinal;
    }
    /* Crea un listado para Datalist */
    protected static function creaDatalist(array $infodb,string $valores,string $etiquetas):string
    {
        $datafinal = "";
        for ($i = 0; $i < count($infodb); $i++){
            $datafinal .= '<option value="'.$infodb[$i][$valores].'" label="'.$infodb[$i][$etiquetas].'">';
        }
        return $datafinal;
    }
    // Generacion de listados JSON
    protected static function listadoJson(array $infodb,string $dat1,string $dat2):array
    { 
        $datafinal = [];
        for ($i = 0; $i < count($infodb); $i++){
            $datafinal[$infodb[$i][$dat1]] = $infodb[$i][$dat2];
        }
        return $datafinal;
    }
    
    //Crea tabla JSON con un unico valor de codificacion.
    protected function creaTablaProOptions(array $data, array $params)
    { 
        $url= BASE_URL . $params['Controlador'] .'/';
        $hasta = count($data);
        $Naction = count($params['Acciones']);
        for ($i = 0; $i < $hasta; $i++){
            $tempdata = "";
            for($j = 0;$j < $Naction; $j++){
                if (isset($params['Condiciones']) and ($params['Acciones'][$j] === $params['Condiciones'][1]) and
                    $data[$i][$params['Condiciones'][0]] ===  $params['Condiciones'][2]){
                        $tempdata .= utf8_encode('<a><i class="fa fa-'.$params['Iconos'][$j] .' fa-lg"></i></a>&nbsp;&nbsp;');
                }else{
                    $tempdata .= utf8_encode('<a href="'. $url . $params['Acciones'][$j].'/'. $data[$i][$params['Valores']].'"
					title="'. $params['Titulos'][$j] .'" target="'.$params['Ejecucion'][$j].'"><i class="fa fa-'.
                        $params['Iconos'][$j] .' fa-lg"></i></a>&nbsp;&nbsp;');
                }
            }
            $data[$i]['Opciones'] = $tempdata;
        }
        return json_encode($data);
    }

    /* Notificaciones Procesos */
    protected function notificacionesProcesos() {
        $htmlstring = '';
        if ( Sessions::getGlobal ( 'Mensajes' )) {
            $mensaje = Sessions::getGlobal ( 'Mensajes' );
            Sessions::deleteGlobal( 'Mensajes' );
            $htmlstring = '<div class="sufee-alert alert with-close alert-'.$mensaje['status'].' alert-dismissible fade show">
                             <span class="badge badge-pill badge-'.$mensaje['status'].'">'.$mensaje['status'].'</span>
											'.$mensaje['text'].'
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							    <span aria-hidden="true">×</span>
							</button>
							</div>';
        }
        return $htmlstring;
    }
    
}