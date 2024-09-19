<?php

namespace App\Controllers;

use App\Services\ApiService;
use App\Services\TokenService;

class ClientController
{
    protected $apiService;
    protected $tokenService;

    public function __construct()
    {
        $this->apiService = new ApiService();
        $this->tokenService = new TokenService();
    }

    public function searchClientByName($name)
    {
        $token = $this->tokenService->getToken();

        // Usamos el método getClientsSearchEndpoint() para obtener la URL desde la configuración
        $clients = $this->apiService->get($this->apiService->getClientsSearchEndpoint(), [
            'name' => $name,
        ], [
            'Authorization' => 'Bearer ' . $token,
        ]);

        return $clients;
    }
}

?>