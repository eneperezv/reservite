<?php

require_once __DIR__ . '/../../src/Services/AuthService.php';
require_once __DIR__ . '/../../src/Services/Logger.php';

use App\Services\Logger;

// Iniciar sesión
session_start();

// Cargar configuración
$config = require __DIR__ . '/../../src/Config/config.php';

// Establecer la zona horaria desde la configuración
date_default_timezone_set($config['timezone']);

// Instanciar el logger
$logger = new Logger();

// Acceder a la URL base y al endpoint de autenticación
$apiBaseUrl = $config['api_url'];
$authEndpoint = $config['endpoints']['auth'];

// Crear la URL completa para el login
$authUrl = $apiBaseUrl . $authEndpoint;

// Obtener credenciales del formulario
$username = $_POST['txtUsername'] ?? null;
$password = $_POST['txtPassword'] ?? null;

if (!$username || !$password) {
    // Redirigir al index con mensaje de error si no se envían credenciales
    header('Location: index.php?error=Usuario o contraseña no proporcionados');
    exit;
}

// Crear instancia del servicio de autenticación
$authService = new App\Services\AuthService($authUrl);

// Intentar autenticar al usuario
$response = $authService->login($username, $password);

if ($response && isset($response['token'])) {
    // Autenticación exitosa, guardamos el token en la sesión
    $_SESSION['auth_token'] = $response['token'];

    // Redirigimos al dashboard
    header('Location: ../dash.php');
    exit;
} else {
    // Autenticación fallida, redirigimos con un mensaje de error
    $logger->error("Error de autenticación para el usuario {$username}.");
    header('Location: ../index.php?error=Credenciales incorrectas');
    exit;
}
