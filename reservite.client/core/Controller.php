<?php
/*
 * @(#)Controller.php 1.0 15/09/2024
 * 
 * El código implementado en este formulario esta protegido
 * bajo las leyes internacionales del Derecho de Autor, sin embargo
 * se entrega bajo las condiciones de la General Public License (GNU GPLv3)
 * descrita en https://www.gnu.org/licenses/gpl-3.0.html
 */

/**
 * Clase general Controller
 *
 * @author eliezer.navarro
 * @version 1.0 | 15/09/2024
 * @since 1.0
 */
class Controller{
    
    public function model($model){
        require_once '../app/models/'.$model.'.php';
        return new $model();
    }

    public function view($view,$data = []){
        require_once '../app/views/'.$view.'.php';
    }

}
?>