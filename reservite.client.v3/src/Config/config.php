<?php
/*
 * @(#)config.php 1.0 19/09/2024
 * 
 * El código implementado en este formulario esta protegido
 * bajo las leyes internacionales del Derecho de Autor, sin embargo
 * se entrega bajo las condiciones de la General Public License (GNU GPLv3)
 * descrita en https://www.gnu.org/licenses/gpl-3.0.html
 */

/**
 * @author eliezer.navarro
 * @version 1.0 | 19/09/2024
 * @since 1.0
 */ 

return [
    'api_url' => 'http://localhost:8080/api/v1/reservite',
    'endpoints' => [
        'auth' => '/auth',
        'get_user' => '/user',
        'get_clients_by_name' => '/client/by-nombre/',
        'get_clients' => '/client',
        'get_hotels' => '/hotel',
        'get_rooms_by_hotel' => '/room/by-hotel/',
        'get_rooms_by_number' => '/room/by-number/',
        'get_dashboard_data' => '/dashboard',
        'create_reservation' => '/reservations',
    ],
    'timezone' => 'America/Bogota',  // Configuración del timezone
];
