<?php

require_once __DIR__ . '/../../src/Services/ApiService.php';
require_once __DIR__ . '/../../src/Services/Logger.php';

use App\Services\Logger;

// Iniciar sesión
//session_start();

// Cargar configuración
$config = require __DIR__ . '/../../src/Config/config.php';

// Crear instancia del logger
$logger = new Logger();

// Obtener el token de la sesión
$token = $_SESSION['auth_token'] ?? null;

if (!$token) {
    die('Error: No autenticado.');
}

// Crear instancia de ApiService
$apiService = new App\Services\ApiService($config['api_url'], $token, $logger);

// Realizar la solicitud GET al endpoint de clientes
$response = $apiService->get($config['endpoints']['get_clients']);

if (isset($response['error'])) {
    // Si hay un error, mostrar un mensaje y registrar el error
    $logger->error("Error al obtener los clientes: " . json_encode($response));
    die('Error al obtener los datos de clientes.');
}

// Si la respuesta es exitosa, guardamos los clientes
$clientes = $response;

?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <h2>Clients</h2>
    <div class="table-responsive small">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Dirección</th>
                    <th>Teléfono</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($clientes)): ?>
                    <?php foreach ($clientes as $cliente): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($cliente['id']); ?></td>
                            <td><?php echo htmlspecialchars($cliente['name']); ?></td>
                            <td><?php echo htmlspecialchars($cliente['email']); ?></td>
                            <td><?php echo htmlspecialchars($cliente['address']); ?></td>
                            <td><?php echo htmlspecialchars($cliente['phone']); ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5">No se encontraron clientes.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</main>