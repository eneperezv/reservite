<?php

namespace App\Controllers;

use App\Models\Auth;
use App\Services\ApiService;
use App\Services\TokenService;

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