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
        $auth = new Auth($username, $password);

        // Usamos el método getAuthEndpoint() para obtener la URL desde la configuración
        $token = $this->apiService->post($this->apiService->getAuthEndpoint(), $auth->getCredentials());

        $this->tokenService->saveToken($token['token']);
    }
}

?>