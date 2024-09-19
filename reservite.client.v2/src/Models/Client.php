<?php

namespace App\Models;

class Client
{
    private $id;
    private $name;
    private $email;
    private $address;
    private $phone;

    public function __construct($id, $name, $email, $address, $phone)
    {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->address = $address;
        $this->phone = $phone;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getAddress()
    {
        return $this->address;
    }

    public function getPhone()
    {
        return $this->phone;
    }

    public static function fromArray($clientData)
    {
        return new self(
            $clientData['id'],
            $clientData['name'],
            $clientData['email'],
            $clientData['address'],
            $clientData['phone']
        );
    }
}

?>