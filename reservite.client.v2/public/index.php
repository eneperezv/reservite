<?php

require_once __DIR__ . '/../vendor/autoload.php';

use App\Controllers\AuthController;
use App\Controllers\ClientController;
use App\Controllers\ReservationController;

$action = $_GET['action'] ?? null;

switch ($action) {
    case 'login':
        // Autenticación
        $username = $_POST['username'] ?? null;
        $password = $_POST['password'] ?? null;

        if ($username && $password) {
            $authController = new AuthController();
            $authController->authenticate($username, $password);
            echo "Autenticado con éxito. Token guardado.";
        } else {
            echo "Por favor, proporciona un usuario y una contraseña.";
        }
        break;

    case 'searchClient':
        // Buscar cliente por nombre
        $name = $_GET['name'] ?? null;

        if ($name) {
            $clientController = new ClientController();
            $clients = $clientController->searchClientByName($name);
            echo "Clientes encontrados: <br>";
            echo "<pre>" . print_r($clients, true) . "</pre>";
        } else {
            echo "Por favor, proporciona un nombre para buscar.";
        }
        break;

    case 'createReservation':
        // Crear una reserva
        $clientId = $_POST['clientId'] ?? null;
        $roomId = $_POST['roomId'] ?? null;
        $checkIn = $_POST['checkIn'] ?? null;
        $checkOut = $_POST['checkOut'] ?? null;

        if ($clientId && $roomId && $checkIn && $checkOut) {
            $reservationController = new ReservationController();
            $reservation = $reservationController->createReservation($clientId, $roomId, $checkIn, $checkOut);
            echo "Reserva creada con éxito: <br>";
            echo "<pre>" . print_r($reservation, true) . "</pre>";
        } else {
            echo "Faltan datos para crear la reserva.";
        }
        break;

    default:
        echo "Acción no especificada.";
        break;
}

?>