<?php

namespace Enp\ReserviteClientV2\Services;

class TokenService
{
    public function __construct()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }

    // Almacena el token en la sesión
    public function saveToken($token)
    {
        $_SESSION['auth_token'] = $token;
    }

    // Recupera el token almacenado
    public function getToken()
    {
        if (isset($_SESSION['auth_token'])) {
            return $_SESSION['auth_token'];
        }

        throw new \Exception('No authentication token found. Please log in.');
    }

    // Limpia el token cuando sea necesario (ej. logout)
    public function clearToken()
    {
        unset($_SESSION['auth_token']);
    }
}

?>