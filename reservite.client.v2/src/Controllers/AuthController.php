<?php

namespace Enp\ReserviteClientV2\Controllers;

use Enp\ReserviteClientV2\Models\Auth;
use Enp\ReserviteClientV2\Services\ApiService;
use Enp\ReserviteClientV2\Services\TokenService;

class AuthController
{
    protected $apiService;
    protected $tokenService;

    public function __construct()
    {
        $this->apiService = new ApiService();
        $this->tokenService = new TokenService();
    }

    public function authenticate($username, $password)
    {
        // Llamamos al modelo Auth para obtener las credenciales
        $auth = new Auth($username, $password);

        if ($auth->isValid()) {
            $token = $this->apiService->post($this->apiService->getAuthEndpoint(), $auth->getCredentials());

            // Guardamos el token en el TokenService
            $this->tokenService->saveToken($token['token']);
        } else {
            throw new \Exception("Credenciales no válidas");
        }
    }

}

?>