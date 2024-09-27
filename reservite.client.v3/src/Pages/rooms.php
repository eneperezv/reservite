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
        <div class="bd-example-snippet bd-code-snippet">
            <div class="bd-example m-0 border-0">
                <nav>
                    <div class="nav nav-tabs mb-3" id="nav-tab" role="tablist">
                        <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Habitacion</button>
                        <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Cliente</button>
                    </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                        <?php if (!empty($rooms)): ?>
                            <?php foreach ($rooms as $room): ?>




                                <div class="col-12">
                                    <form class="needs-validation" novalidate>
                                        <div class="row g-3">
                                            <div class="col-sm-4">
                                                <label for="txtPiso" class="form-label">Piso</label>
                                                <input type="text" class="form-control" name="txtPiso" value="<?php print $room['floor']; ?>" required>
                                            </div>
                                            <div class="col-sm-4">
                                                <label for="lastName" class="form-label">Last name</label>
                                                <input type="text" class="form-control" id="lastName" placeholder="" value="" required>
                                                <div class="invalid-feedback">
                                                    Valid last name is required.
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <label for="lastName" class="form-label">Last name</label>
                                                <input type="text" class="form-control" id="lastName" placeholder="" value="" required>
                                                <div class="invalid-feedback">
                                                    Valid last name is required.
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <label for="username" class="form-label">Username</label>
                                                <div class="input-group has-validation">
                                                    <span class="input-group-text">@</span>
                                                    <input type="text" class="form-control" id="username" placeholder="Username" required>
                                                    <div class="invalid-feedback">
                                                        Your username is required.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <label for="email" class="form-label">Email <span class="text-body-secondary">(Optional)</span></label>
                                                <input type="email" class="form-control" id="email" placeholder="you@example.com">
                                                <div class="invalid-feedback">
                                                    Please enter a valid email address for shipping updates.
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <label for="address" class="form-label">Address</label>
                                                <input type="text" class="form-control" id="address" placeholder="1234 Main St" required>
                                                <div class="invalid-feedback">
                                                    Please enter your shipping address.
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <label for="address2" class="form-label">Address 2 <span class="text-body-secondary">(Optional)</span></label>
                                                <input type="text" class="form-control" id="address2" placeholder="Apartment or suite">
                                            </div>
                                            <div class="col-md-5">
                                                <label for="country" class="form-label">Country</label>
                                                <select class="form-select" id="country" required>
                                                    <option value="">Choose...</option>
                                                    <option>United States</option>
                                                </select>
                                                <div class="invalid-feedback">
                                                    Please select a valid country.
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="state" class="form-label">State</label>
                                                <select class="form-select" id="state" required>
                                                    <option value="">Choose...</option>
                                                    <option>California</option>
                                                </select>
                                                <div class="invalid-feedback">
                                                    Please provide a valid state.
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <label for="zip" class="form-label">Zip</label>
                                                <input type="text" class="form-control" id="zip" placeholder="" required>
                                                <div class="invalid-feedback">
                                                    Zip code required.
                                                </div>
                                            </div>
                                        </div>
                                        <hr class="my-4">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="same-address">
                                            <label class="form-check-label" for="same-address">Shipping address is the same as my billing address</label>
                                        </div>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="save-info">
                                            <label class="form-check-label" for="save-info">Save this information for next time</label>
                                        </div>
                                        <hr class="my-4">
                                        <h4 class="mb-3">Payment</h4>
                                        <div class="my-3">
                                            <div class="form-check">
                                                <input id="credit" name="paymentMethod" type="radio" class="form-check-input" checked required>
                                                <label class="form-check-label" for="credit">Credit card</label>
                                            </div>
                                            <div class="form-check">
                                                <input id="debit" name="paymentMethod" type="radio" class="form-check-input" required>
                                                <label class="form-check-label" for="debit">Debit card</label>
                                            </div>
                                            <div class="form-check">
                                                <input id="paypal" name="paymentMethod" type="radio" class="form-check-input" required>
                                                <label class="form-check-label" for="paypal">PayPal</label>
                                            </div>
                                        </div>
                                        <div class="row gy-3">
                                            <div class="col-md-6">
                                                <label for="cc-name" class="form-label">Name on card</label>
                                                <input type="text" class="form-control" id="cc-name" placeholder="" required>
                                                <small class="text-body-secondary">Full name as displayed on card</small>
                                                <div class="invalid-feedback">
                                                    Name on card is required
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="cc-number" class="form-label">Credit card number</label>
                                                <input type="text" class="form-control" id="cc-number" placeholder="" required>
                                                <div class="invalid-feedback">
                                                    Credit card number is required
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <label for="cc-expiration" class="form-label">Expiration</label>
                                                <input type="text" class="form-control" id="cc-expiration" placeholder="" required>
                                                <div class="invalid-feedback">
                                                    Expiration date required
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <label for="cc-cvv" class="form-label">CVV</label>
                                                <input type="text" class="form-control" id="cc-cvv" placeholder="" required>
                                                <div class="invalid-feedback">
                                                    Security code required
                                                </div>
                                            </div>
                                        </div>
                                        <hr class="my-4">
                                        <button class="w-100 btn btn-primary btn-lg" type="submit">Continue to checkout</button>
                                    </form>
                                </div>

                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="5">No se encontraron habitaciones.</td>
                            </tr>
                        <?php endif; ?>























                        <p><?php print 'Roomnumber: '.$_GET['booking']; ?></p>
                        <p><?php echo var_dump($rooms); ?></p>
                        <p>This is some placeholder content the <strong>Home tab's</strong> associated content. Clicking another tab will toggle the visibility of this one for the next. The tab JavaScript swaps classes to control the content visibility and styling. You can use it with tabs, pills, and any other <code>.nav</code>-powered navigation.</p>
                    </div>
                    <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                        <?php /* PENDIENTE CARGAR LISTA DE CLIENTES Y POSIBLE BUSCADOR */ ?>
                        <?php /* PENDIENTE AL SELECCIONAR CLIENTE SE RECARGA LA PAGINA? O SE LEE DESDE LA SELECCION? */ ?>
                        <p><?php echo var_dump($clientes); ?></p>
                        <p>This is some placeholder content the <strong>Profile tab's</strong> associated content. Clicking another tab will toggle the visibility of this one for the next. The tab JavaScript swaps classes to control the content visibility and styling. You can use it with tabs, pills, and any other <code>.nav</code>-powered navigation.</p>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
    ?>
    <br><br><br><br>
</main>