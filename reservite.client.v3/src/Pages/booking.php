<?php
// Iniciar sesión
session_start();
require_once __DIR__ . '/../../src/Services/ApiService.php';
require_once __DIR__ . '/../../src/Services/Logger.php';
use App\Services\Logger;
    
$config = require __DIR__ . '/../../src/Config/config.php';

//echo 'token'.$_SESSION['auth_token'].'<br>';

if(isset($_POST['btnBooking'])){
    $checkin    = $_POST['txtCheckin'].' 15:00:00';
    $checkout   = $_POST['txtCheckout'].' 12:00:00';
    $expire     = $_POST['txtCheckin'].' 20:00:00';
    $roomnumber = $_POST['txtRoomnumber'];
    $idclient   = $_POST['txtIdClient'];
    $idroom     = $_POST['txtIdRoom'];
    
    $room = [
        'id' => $idroom,
        'roomnumber' => $roomnumber
    ];

    $client = [
        'id' => $idclient
    ];

    $data = [
        'id' => null,
        'room' => $room,
        'client' => $client,
        'dateCheckIn' => $checkin, 
        'dateExpire' => $expire, 
        'dateCheckOut' => $checkout
    ];
    //echo var_dump($data);

    $logger = new Logger();
    $token = $_SESSION['auth_token'] ?? null;
    if (!$token) {
        die('Error: No autenticado.');
    }
    
    $url_request = $config['endpoints']['post_booking'];
    $apiService = new App\Services\ApiService($config['api_url'], $token, $logger);
    $response = $apiService->post($url_request,$data);
    if (isset($response['error'])) {
        $logger->error("Error al obtener rooms: " . json_encode($response),$_SESSION['username']);
        die('Error al obtener los rooms.');
    }
    $booking = $response;

    //echo var_dump($booking);

    header('Location: ../dash.php?page=main&opc=ok');
    
}
?>