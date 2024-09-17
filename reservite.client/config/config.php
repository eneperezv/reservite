<?php
/*
 * @(#)config.php 1.0 15/09/2024
 * 
 * El código implementado en este formulario esta protegido
 * bajo las leyes internacionales del Derecho de Autor, sin embargo
 * se entrega bajo las condiciones de la General Public License (GNU GPLv3)
 * descrita en https://www.gnu.org/licenses/gpl-3.0.html
 */

/**
 * Clase Config para gestion de configuracion
 *
 * @author eliezer.navarro
 * @version 1.0 | 15/09/2024
 * @since 1.0
 */

session_start();

define('API_BASE_URL', 'https://api.example.com/');

// Función para realizar solicitudes a la API
function apiRequest($endpoint, $method = 'GET', $data = null, $token = null) {
    $url = API_BASE_URL . $endpoint;
    $options = [
        'http' => [
            'header' => "Content-type: application/json\r\n",
            'method' => $method,
        ]
    ];

    if ($data) {
        $options['http']['content'] = json_encode($data);
    }

    if ($token) {
        $options['http']['header'] .= "Authorization: Bearer $token\r\n";
    }

    $context = stream_context_create($options);
    $result = file_get_contents($url, false, $context);

    if ($result === FALSE) {
        return null;
    }

    return json_decode($result, true);
}
