<?php

/*
 * @(#)User.php 1.0 15/09/2024
 * 
 * El código implementado en este formulario esta protegido
 * bajo las leyes internacionales del Derecho de Autor, sin embargo
 * se entrega bajo las condiciones de la General Public License (GNU GPLv3)
 * descrita en https://www.gnu.org/licenses/gpl-3.0.html
 */

/**
 * Clase Model para gestion de usuarios y autenticacion
 *
 * @author eliezer.navarro
 * @version 1.0 | 15/09/2024
 * @since 1.0
 */

    class User{

        public function authenticate($username,$password){
            $url = 'http://localhost:8080/api/v1/reservite/auth';
            $data = ['username'=>$username,'password'=>$password];

            $options = [
                'http' => [
                    'header' => "Content-type: application/json\r\n",
                    'method' => 'POST',
                    'contend' => json_encode($data),
                ],
            ];

            $context = stream_context_create($options);
            $result = file_get_contents($url,false,$context);

            if($result == FALSE){
                return null;
            }

            $response = json_decode($result,true);
            return $response['token'] ?? null;
        }

    }

?>