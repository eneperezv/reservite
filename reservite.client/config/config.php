<?php

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
