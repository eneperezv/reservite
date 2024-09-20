<?php

namespace App\Services;

class AuthService
{
    private $apiUrl;

    public function __construct($apiUrl)
    {
        $this->apiUrl = $apiUrl;
    }

    // Método que realiza el login enviando las credenciales a la API
    public function login($username, $password)
    {
        $data = [
            'username' => $username,
            'password' => $password
        ];

        // Usamos cURL para hacer la solicitud HTTP a la API
        $ch = curl_init($this->apiUrl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);

        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        // Si la respuesta es exitosa (HTTP 200)
        if ($httpCode === 200) {
            return json_decode($response, true);
        }

        // Si falla, devolvemos null
        return null;
    }
}
