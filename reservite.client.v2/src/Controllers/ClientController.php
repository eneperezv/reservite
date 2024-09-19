<?php

namespace Enp\ReserviteClientV2\Controllers;

use Enp\ReserviteClientV2\Services\ApiService;
use Enp\ReserviteClientV2\Services\TokenService;

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