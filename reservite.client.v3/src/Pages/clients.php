<?php
/*
 * @(#)clients.php 1.0 22/09/2024
 * 
 * El código implementado en este formulario esta protegido
 * bajo las leyes internacionales del Derecho de Autor, sin embargo
 * se entrega bajo las condiciones de la General Public License (GNU GPLv3)
 * descrita en https://www.gnu.org/licenses/gpl-3.0.html
 */

/**
 * @author eliezer.navarro
 * @version 1.0 | 22/09/2024
 * @since 1.0
 */ 
require_once __DIR__ . '/../../src/Services/ApiService.php';
require_once __DIR__ . '/../../src/Services/Logger.php';
use App\Services\Logger;
$config = require __DIR__ . '/../../src/Config/config.php';
if(isset($_POST['btnBuscar'])){
    $logger = new Logger();
    $token = $_SESSION['auth_token'] ?? null;
    if (!$token) {
        die('Error: No autenticado.');
    }
    $query = $_POST['txtCliente'];
    $apiService = new App\Services\ApiService($config['api_url'], $token, $logger);
    $response = $apiService->get($config['endpoints']['get_clients_by_name'].$query);
    if (isset($response['error'])) {
        $logger->error("Error al obtener los clientes: " . json_encode($response),$_SESSION['username']);
        die('Error al obtener los datos de clientes.');
    }
    $clientes = $response;
}
?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <form action="" method="POST">
        <div class="input-group mb-3">
            <input type="text" class="form-control" id="txtCliente" name="txtCliente" placeholder="Buscar cliente por nombre" aria-label="Buscar cliente por nombre" aria-describedby="btnBuscar">
            <button class="btn btn-outline-secondary" type="submit" id="btnBuscar" name="btnBuscar">Bucar</button>
        </div>
    </form>
    <br><br>
    <h2>Clients</h2>
    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Dirección</th>
                    <th>Teléfono</th>
                    <th>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-compact-down" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M1.553 6.776a.5.5 0 0 1 .67-.223L8 9.44l5.776-2.888a.5.5 0 1 1 .448.894l-6 3a.5.5 0 0 1-.448 0l-6-3a.5.5 0 0 1-.223-.67"/>
                        </svg>
                    </th>
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
                            <td>
                            <div class="btn-group" role="group">
                                <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                    #
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">Book a room</a></li>
                                </ul>
                            </div>
                            </td>
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
    <br><br><br><br>
</main>