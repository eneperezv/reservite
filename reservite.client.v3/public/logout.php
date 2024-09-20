<?php

// Iniciar sesión
session_start();

// Limpiar el token de la sesión
unset($_SESSION['auth_token']);

// Redirigir al index
header('Location: index.php');
exit;
