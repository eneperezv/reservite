<?php
/*
 * @(#)logout.php 1.0 19/09/2024
 * 
 * El código implementado en este formulario esta protegido
 * bajo las leyes internacionales del Derecho de Autor, sin embargo
 * se entrega bajo las condiciones de la General Public License (GNU GPLv3)
 * descrita en https://www.gnu.org/licenses/gpl-3.0.html
 */

/**
 * @author eliezer.navarro
 * @version 1.0 | 19/09/2024
 * @since 1.0
 */ 

// Iniciar sesión
session_start();

// Limpiar el token de la sesión
unset($_SESSION['auth_token']);

// Redirigir al index
header('Location: index.php');
exit;
