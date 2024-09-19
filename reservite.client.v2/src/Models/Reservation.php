<?php

namespace Enp\ReserviteClientV2\Models;

class Reservation
{
    private $id;
    private $roomId;
    private $clientId;
    private $dateCheckIn;
    private $dateCheckOut;
    private $status;
    private $qrcode;

    public function __construct($clientId, $roomId, $dateCheckIn, $dateCheckOut, $status = 1, $qrcode = null)
    {
        $this->clientId = $clientId;
        $this->roomId = $roomId;
        $this->dateCheckIn = $dateCheckIn;
        $this->dateCheckOut = $dateCheckOut;
        $this->status = $status;
        $this->qrcode = $qrcode;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getRoomId()
    {
        return $this->roomId;
    }

    public function getClientId()
    {
        return $this->clientId;
    }

    public function getDateCheckIn()
    {
        return $this->dateCheckIn;
    }

    public function getDateCheckOut()
    {
        return $this->dateCheckOut;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function getQrCode()
    {
        return $this->qrcode;
    }

    public function toArray()
    {
        return [
            'client' => ['id' => $this->clientId],
            'room' => ['id' => $this->roomId],
            'dateCheckIn' => $this->dateCheckIn,
            'dateCheckOut' => $this->dateCheckOut,
            'status' => $this->status,
            'qrcode' => $this->qrcode,
        ];
    }

    public static function fromArray($reservationData)
    {
        return new self(
            $reservationData['client']['id'],
            $reservationData['room']['id'],
            $reservationData['dateCheckIn'],
            $reservationData['dateCheckOut'],
            $reservationData['status'],
            $reservationData['qrcode'] ?? null
        );
    }
}

?>