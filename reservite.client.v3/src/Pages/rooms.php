<?php
require_once __DIR__ . '/../../src/Services/ApiService.php';
require_once __DIR__ . '/../../src/Services/Logger.php';
use App\Services\Logger;
$config = require __DIR__ . '/../../src/Config/config.php';

$logger = new Logger();
$token = $_SESSION['auth_token'] ?? null;
if (!$token) {
    die('Error: No autenticado.');
}

if(isset($_GET['hotel'])){
    $url_request = $config['endpoints']['get_rooms_by_hotel'].$_GET['hotel'];
    $apiService = new App\Services\ApiService($config['api_url'], $token, $logger);
    $response = $apiService->get($url_request);
    if (isset($response['error'])) {
        $logger->error("Error al obtener rooms: " . json_encode($response),$_SESSION['username']);
        die('Error al obtener los rooms.');
    }
    $rooms = $response;
}
if(isset($_POST['btnBuscar'])){
    $url_request = $config['endpoints']['get_rooms_by_number'].$_POST['txtRoomNumber'];
    $apiService = new App\Services\ApiService($config['api_url'], $token, $logger);
    $response = $apiService->get($url_request);
    if (isset($response['error'])) {
        $logger->error("Error al obtener rooms: " . json_encode($response),$_SESSION['username']);
        die('Error al obtener los rooms.');
    }
    $rooms = $response;
}
?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <?php
    if(!isset($_GET['hotel'])){
        ?>
        <form action="" method="POST">
            <div class="input-group mb-3">
                <input type="text" class="form-control" id="txtRoomNumber" name="txtRoomNumber" placeholder="Buscar habitacion por número" aria-label="Buscar habitacion por número" aria-describedby="btnBuscar">
                <button class="btn btn-outline-secondary" type="submit" id="btnBuscar" name="btnBuscar">Bucar</button>
            </div>
        </form>
        <br>
        <?php
    } 
    ?>
    <br>
    <h2>Available rooms</h2>
    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th>Hotel</th>
                    <th>Room Number</th>
                    <th>Floor</th>
                    <th>Capacity</th>
                    <th>Description</th>
                    <th>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-compact-down" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M1.553 6.776a.5.5 0 0 1 .67-.223L8 9.44l5.776-2.888a.5.5 0 1 1 .448.894l-6 3a.5.5 0 0 1-.448 0l-6-3a.5.5 0 0 1-.223-.67"/>
                        </svg>
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($rooms)): ?>
                    <?php foreach ($rooms as $room): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($room['hotel']['name']); ?></td>
                            <td><?php echo htmlspecialchars($room['roomnumber']); ?></td>
                            <td><?php echo htmlspecialchars($room['floor']); ?></td>
                            <td><?php echo htmlspecialchars($room['capacity']); ?></td>
                            <td><?php echo htmlspecialchars($room['description']); ?></td>
                            <td>
                            <div class="btn-group" role="group">
                                <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                    #
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">Book this room</a></li>
                                </ul>
                            </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5">No se encontraron habitaciones.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
    <br><br><br><br>
</main>