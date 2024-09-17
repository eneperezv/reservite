<!DOCTYPE html>
<?php
/*
 * @(#)booking.php 1.0 15/09/2024
 * 
 * El código implementado en este formulario esta protegido
 * bajo las leyes internacionales del Derecho de Autor, sin embargo
 * se entrega bajo las condiciones de la General Public License (GNU GPLv3)
 * descrita en https://www.gnu.org/licenses/gpl-3.0.html
 */

/**
 * Clase Vista para gestion de reservas
 *
 * @author eliezer.navarro
 * @version 1.0 | 15/09/2024
 * @since 1.0
 */
?>
<html>
<head>
    <title>Reserve a Room</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <h1>Reserve a Room</h1>
    <form action="/reserve" method="post">
        <label for="roomType">Room Type:</label>
        <select name="roomType" id="roomType">
            <option value="single">Single</option>
            <option value="double">Double</option>
            <option value="suite">Suite</option>
        </select>
        <br>
        <label for="checkInDate">Check-In Date:</label>
        <input type="date" id="checkInDate" name="checkInDate">
        <br>
        <label for="checkOutDate">Check-Out Date:</label>
        <input type="date" id="checkOutDate" name="checkOutDate">
        <br>
        <button type="submit">Reserve</button>
    </form>
    <?php if (isset($data['error'])): ?>
        <p style="color:red;"><?= $data['error'] ?></p>
    <?php endif; ?>
</body>
</html>
