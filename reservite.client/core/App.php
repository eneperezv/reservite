<?php
/* PENDIENTE DE PRUEBAS 
 * @(#)App.php 1.0 15/09/2024
 * 
 * El código implementado en este formulario esta protegido
 * bajo las leyes internacionales del Derecho de Autor, sin embargo
 * se entrega bajo las condiciones de la General Public License (GNU GPLv3)
 * descrita en https://www.gnu.org/licenses/gpl-3.0.html
 */

/**
 * Clase de inicializacion de la aplicacion
 *
 * @author eliezer.navarro
 * @version 1.0 | 15/09/2024
 * @since 1.0
 */
class App{
    
    protected $controller = 'HomeController';
    protected $method = 'index';
    protected $params = [];

    public function __construct(){
        $url = $this->parseUrl();
        if(file_exists('../app/controllers/'.$url[0].'Controller.php')){
            $this->controller = $url[0].'Controller';
            unset($url[0]);
        }
        require_once '../app/controllers/'.$this->controller.'.php';
        $this->controller = new $this->controller;
        if(isset($url[1])){
            if(method_exists($this->controller,$url[1])){
                $this->method = $url[1];
                unset($url[1]);
            }
        }
        $this->params = $url ? array_values($url) : [];
        call_user_func_array([$this->controller,$this->method],$this->params);
    }

    public function parseUrl(){
        if(isset($_GET['url'])){
            return explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITASE_URL));
        }
    }
}
?>