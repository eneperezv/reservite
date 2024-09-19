<?php

namespace App\Models;

class Auth
{
    private $username;
    private $password;

    public function __construct($username, $password)
    {
        $this->username = $username;
        $this->password = $password;
    }

    // Método que devuelve las credenciales de autenticación en formato de arreglo
    public function getCredentials()
    {
        return [
            'username' => $this->username,
            'password' => $this->password
        ];
    }

    // Método para obtener el nombre de usuario
    public function getUsername()
    {
        return $this->username;
    }

    // Método para obtener la contraseña (esto no se recomienda a menudo pero lo dejamos por consistencia en pruebas)
    public function getPassword()
    {
        return $this->password;
    }

    // Método para validar que las credenciales no estén vacías
    public function isValid()
    {
        return !empty($this->username) && !empty($this->password);
    }
}

?>