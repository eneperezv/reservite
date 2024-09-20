<?php

// Iniciar sesión
session_start();

// Verificar si el token está presente en la sesión
if (!isset($_SESSION['auth_token'])) {
    // Si no hay token, redirigir al login
    header('Location: index.php?error=Debe iniciar sesión primero');
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
    <h2>Bienvenido al Dashboard</h2>
    <?php /*
    <p>Su token es: <?php echo htmlspecialchars($_SESSION['auth_token']); ?></p>
    */ ?>
    <a href="logout.php">Cerrar sesión</a>
</body>
</html>
