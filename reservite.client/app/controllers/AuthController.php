<?php

/*
 * @(#)ClientController.php 1.0 15/09/2024
 * 
 * El código implementado en este formulario esta protegido
 * bajo las leyes internacionales del Derecho de Autor, sin embargo
 * se entrega bajo las condiciones de la General Public License (GNU GPLv3)
 * descrita en https://www.gnu.org/licenses/gpl-3.0.html
 */

/**
 * Clase Controller para gestion de autenticacion
 *
 * @author eliezer.navarro
 * @version 1.0 | 15/09/2024
 * @since 1.0
 */

    class AuthController extends Controller{
        
        public function login(){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $username = $_POST['username'];
                $password = $_POST['password'];
                $user = $this->model('User');
                $token = $user->authenticate($username,$password);
                if($token){
                    $_SESSION['authToken'] = $token;
                    header('Location: /index');
                }else{
                    header('Location: /login?error=true');
                }
            }else{
                $this->view('login');
            }
        }

    }

?>