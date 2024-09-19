<?php

namespace Enp\ReserviteClientV2\Controllers;

use Enp\ReserviteClientV2\Models\Reservation;
use Enp\ReserviteClientV2\Services\ApiService;
use Enp\ReserviteClientV2\Services\TokenService;

class ReservationController
{
    protected $apiService;
    protected $tokenService;

    public function __construct()
    {
        $this->apiService = new ApiService();
        $this->tokenService = new TokenService();
    }

    public function createReservation($clientId, $roomId, $checkIn, $checkOut)
    {
        $token = $this->tokenService->getToken();

        $reservation = new Reservation($clientId, $roomId, $checkIn, $checkOut);

        // Usamos el método getReservationEndpoint() para obtener la URL desde la configuración
        $response = $this->apiService->post($this->apiService->getReservationEndpoint(), $reservation->toArray(), [
            'Authorization' => 'Bearer ' . $token,
        ]);

        return $response;
    }
}

?>