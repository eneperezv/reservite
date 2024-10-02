<?php
/*
 * @(#)rooms.php 1.0 22/09/2024
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

$logger = new Logger();
$token = $_SESSION['auth_token'] ?? null;
if (!$token) {
    die('Error: No autenticado.');
}
$dat = false;
$book = false;
$rooms;
if(isset($_GET['hotel'])){
    $url_request = $config['endpoints']['get_rooms_by_hotel'].$_GET['hotel'];
    $apiService = new App\Services\ApiService($config['api_url'], $token, $logger);
    $response = $apiService->get($url_request);
    if (isset($response['error'])) {
        $logger->error("Error al obtener rooms: " . json_encode($response),$_SESSION['username']);
        die('Error al obtener los rooms.');
    }
    $rooms = $response;
    $dat = true;
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
    $dat = true;
}
if(isset($_GET['booking'])){
    $url_request = $config['endpoints']['get_rooms_by_number'].$_GET['booking'];
    $apiService = new App\Services\ApiService($config['api_url'], $token, $logger);
    $response = $apiService->get($url_request);
    if (isset($response['error'])) {
        $logger->error("Error al obtener rooms: " . json_encode($response),$_SESSION['username']);
        die('Error al obtener los rooms.');
    }
    $rooms = $response;
    $url_request = $config['endpoints']['get_clients'];
    $apiService = new App\Services\ApiService($config['api_url'], $token, $logger);
    $responseCli = $apiService->get($url_request);
    if (isset($response['error'])) {
        $logger->error("Error al obtener rooms: " . json_encode($response),$_SESSION['username']);
        die('Error al obtener los rooms.');
    }
    $clientes = $responseCli;
    $book = true;
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
    if($dat){
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
                                        <li><a class="dropdown-item" href="dash.php?page=rooms&booking=<?php echo htmlspecialchars($room['roomnumber']); ?>">Book this room</a></li>
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
        <?php
    }
    if($book){
        ?>
        <form method="POST">
            <div class="bd-example-snippet bd-code-snippet">
                <div class="bd-example m-0 border-0">
                    <nav>
                        <div class="nav nav-tabs mb-3" id="nav-tab" role="tablist">
                            <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Room</button>
                            <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Client</button>
                            <button class="nav-link" id="nav-date-tab" data-bs-toggle="tab" data-bs-target="#nav-date" type="button" role="tab" aria-controls="nav-date" aria-selected="false">Date</button>
                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                            <?php if (!empty($rooms)): ?>
                                <?php foreach ($rooms as $room): ?>
                                    <div class="col-12">
                                        <div class="row g-3">
                                            <div class="col-sm-4">
                                                <label for="txtPiso" class="form-label">Floor</label>
                                                <input type="text" class="form-control" name="txtPiso" value="<?php print $room['floor']; ?>" required>
                                            </div>
                                            <div class="col-sm-4">
                                                <label for="txtCapacidad" class="form-label">Capacity</label>
                                                <input type="text" class="form-control" name="txtCapacidad" value="<?php print $room['capacity']; ?>" required>
                                            </div>
                                            <div class="col-sm-4">
                                                <label for="txtRoomNumber" class="form-label">Piso</label>
                                                <input type="text" class="form-control" name="txtRoomNumber" value="<?php print $room['roomnumber']; ?>" required>
                                            </div>
                                            <div class="col-12">
                                                <label for="txtDescription" class="form-label">Description</label>
                                                <textarea class="form-control" name="txtDescription"><?php print $room['description']; ?></textarea>
                                            </div>
                                            <hr class="my-4">
                                            <div class="col-sm-4">
                                                <label for="txtHotel" class="form-label">Hotel</label>
                                                <input type="text" class="form-control" name="txtHotel" value="<?php print $room['hotel']['name']; ?>" required>
                                            </div>
                                            <div class="col-sm-4">
                                                <label for="txtAddress" class="form-label">Address</label>
                                                <input type="text" class="form-control" name="txtAddress" value="<?php print $room['hotel']['address']; ?>" required>
                                            </div>
                                            <div class="col-sm-4">
                                                <label for="txtPhone" class="form-label">Phone</label>
                                                <input type="text" class="form-control" name="txtPhone" value="<?php print $room['hotel']['phone']; ?>" required>
                                            </div>
                                            <input type="hidden" name="txtIdRoom" value="<?php print $room['id']; ?>">
                                            <input type="hidden" name="txtIdHotel" value="<?php print $room['hotel']['id']; ?>">
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="5">No se encontraron habitaciones.</td>
                                </tr>
                            <?php endif; ?>
                        </div>
                        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                            <input type="text" class="form-control" id="txtClientSearch" onkeyup="tableFilter()" placeholder="Search for Client.." title="Type in a name">
                            <div class="table-responsive">
                                <table class="table table-striped table-sm" id="tblClients">
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
                                                <tr <?php if(isset($_GET['client'])) { if($cliente['id']==$_GET['client']){echo ' class="table-success"';} }?> >
                                                    <td><?php echo htmlspecialchars($cliente['id']); ?></td>
                                                    <td><?php echo htmlspecialchars($cliente['name']); ?></td>
                                                    <td><?php echo htmlspecialchars($cliente['email']); ?></td>
                                                    <td><?php echo htmlspecialchars($cliente['address']); ?></td>
                                                    <td><?php echo htmlspecialchars($cliente['phone']); ?></td>
                                                    <td>
                                                        <a class="btn btn-primary btn-sm" href="dash.php?page=rooms&booking=<?php echo $_GET['booking'].'&client='.$cliente['id']; ?>">
                                                            <i class="bi bi-check2-circle"></i> Select
                                                        </a>
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
                        </div>
                        <div class="tab-pane fade" id="nav-date" role="tabpanel" aria-labelledby="nav-date-tab">
                            <div class="row">
                                <div class="col-4">
                                    <label for="txtCheckin" class="form-label">CheckIn</label>
                                    <input type="date" name="txtCheckin" id="txtCheckin" class="form-control">
                                </div>
                                <div class="col-4">
                                    <label for="txtCheckout" class="form-label">CheckOut</label>
                                    <input type="date" name="txtCheckout" id="txtCheckout" class="form-control">
                                </div>
                                <div class="col-4">
                                    <label for="txtCheckexpire" class="form-label">Expire</label>
                                    <input type="date" name="txtCheckexpire" id="txtCheckexpire" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <input type="hidden" value="<?php print $_GET['booking']; ?>" name="txtRoomnumber">
            <input type="hidden" value="<?php print $_GET['client']; ?>" name="txtIdClient">
            <br><br>
            <button type="submit" class="btn btn-primary">Book this room</button>
        </form>
        <?php
    }
    ?>
    <br><br><br><br>
</main>