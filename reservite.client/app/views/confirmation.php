<!DOCTYPE html>
<?php
/*
 * @(#)confirmation.php 1.0 15/09/2024
 * 
 * El código implementado en este formulario esta protegido
 * bajo las leyes internacionales del Derecho de Autor, sin embargo
 * se entrega bajo las condiciones de la General Public License (GNU GPLv3)
 * descrita en https://www.gnu.org/licenses/gpl-3.0.html
 */

/**
 * Clase Vista para gestion de confirmacion de reserva
 *
 * @author eliezer.navarro
 * @version 1.0 | 15/09/2024
 * @since 1.0
 */
?>
<html>
<head>
    <title>Reservation Confirmation</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <h1>Reservation Confirmed</h1>
    <p>Room Type: <?= $data['reservation']['roomType'] ?></p>
    <p>Check-In Date: <?= $data['reservation']['checkInDate'] ?></p>
    <p>Check-Out Date: <?= $data['reservation']['checkOutDate'] ?></p>
</body>
</html>
