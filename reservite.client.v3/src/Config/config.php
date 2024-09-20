<?php

return [
    'api_url' => 'http://localhost:8080/api/v1/reservite',
    'endpoints' => [
        'auth' => '/auth',
        'get_user' => '/user',
        'get_clients' => '/clients',
        'create_reservation' => '/reservations',
    ],
    'timezone' => 'America/Bogota',  // Configuración del timezone
];
