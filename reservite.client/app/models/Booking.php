<?php

/*
 * @(#)Booking.php 1.0 15/09/2024
 * 
 * El código implementado en este formulario esta protegido
 * bajo las leyes internacionales del Derecho de Autor, sin embargo
 * se entrega bajo las condiciones de la General Public License (GNU GPLv3)
 * descrita en https://www.gnu.org/licenses/gpl-3.0.html
 */

/**
 * Clase Model para gestion de reservas
 *
 * @author eliezer.navarro
 * @version 1.0 | 15/09/2024
 * @since 1.0
 */

    class Booking{

        public function reserveRoom($roomType,$checkInDate,$checkOutDate){
            $url = 'URL_DE_LA_API';
            $data = [
                'roomType' => $roomType,
                'checkInDate' => $checkInDate,
                'checkOutDate' => $checkOutDate
            ];

            $options = [
                'http' => [
                    'header' => "Content-type: application/json\r\nAuthorization: Bearer $token\r\n",
                    'method' => 'POST',
                    'content' => json_encode($data),
                ],
            ];

            $context = stream_context_create($options);
            $result = file_get_contents($url,false,$context);

            if($result === FALSE){
                return null;
            }

            $response = json_decode($result,true);
            return [
                'status' => http_response_code(),
                'data' => $response
            ];
        }

    }

?>