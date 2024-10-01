<?php
/*
 * @(#)main.php 1.0 22/09/2024
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
$apiService = new App\Services\ApiService($config['api_url'], $token, $logger);
$response = $apiService->get($config['endpoints']['get_dashboard_data']);
if (isset($response['error'])) {
    $logger->error("Error al obtener los clientes: " . json_encode($response),$_SESSION['username']);
    die('Error al obtener los datos de clientes.');
}
$dashdata = $response;

$totalClientes = $dashdata['clientsCount'];
$habitacionesDisponibles = $dashdata['availableRoomsCount'];
$totalReservas = $dashdata['bookingsCount'];

$apiService = new App\Services\ApiService($config['api_url'], $token, $logger);
$response = $apiService->get($config['endpoints']['get_notifications']);
if (isset($response['error'])) {
    $logger->error("Error al obtener los clientes: " . json_encode($response),$_SESSION['username']);
    die('Error al obtener los datos de clientes.');
}
$notifications = $response;
?>
<?php /* PENDIENTE ELIMINAR DATOS QUE SE MUESTRAN Y CARGAR WIDGETS CON DATOS (CLIENTES,HABITACIONES DISPONIBLES,RESERVAS, ETC) */ ?>
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Dashboard</h1>
                </div>
                <div class="row g-3">
                    <div class="col-8">
                        <div class="row">
                            <div class="col-6">
                                <div class="card mb-4 bg-secondary bg-gradient">
                                    <div class="card-body icon-clients">
                                        <div class="lead">Clients</div>
                                        <h2 class="card-title"><?php echo $totalClientes; ?></h2>
                                        <?php 
                                        /*
                                        <p class="small text-muted">Oct 1 - Dec 31,<i class="fa fa-globe"></i> Worldwide</p>
                                        */ ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="card mb-4 bg-secondary bg-gradient">
                                    <div class="card-body icon-rooms">
                                        <div class="lead">Available Rooms</div>
                                        <h2 class="card-title"><?php echo $habitacionesDisponibles; ?></h2>
                                        <?php 
                                        /*
                                        <p class="small text-muted">Oct 1 - Dec 31,<i class="fa fa-globe"></i> Worldwide</p>
                                        */ ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="card mb-4 bg-success bg-gradient">
                                    <div class="card-body icon-bookings">
                                        <div class="lead">Bookings</div>
                                        <h2 class="card-title"><?php echo $totalReservas; ?></h2>
                                        <?php 
                                        /*
                                        <p class="small text-muted">Oct 1 - Dec 31,<i class="fa fa-globe"></i> Worldwide</p>
                                        */ ?>
                                    </div>
                                </div>
                            </div>
                            <?php /*
                            <div class="col-6">
                                <div class="card mb-4">
                                    <div class="card-body">
                                        <div class="lead">Total Downloads 4</div>
                                        <h2 class="card-title">1,057,891</h2>
                                        <p class="small text-muted">Oct 1 - Dec 31,<i class="fa fa-globe"></i> Worldwide</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="card mb-4 bg-success bg-gradient">
                                    <div class="card-body imagenback">
                                        <div class="lead">Total Downloads 5</div>
                                        <h2 class="card-title">1,057,891</h2>
                                        <p class="small text-muted">Oct 1 - Dec 31,<i class="fa fa-globe"></i> Worldwide</p>
                                    </div>
                                </div>
                            </div>
                            */ ?>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="card">
                            <h2 class="card-title lead p-4 border-bottom" style="font-weight: 600">Notifications</h2>
                            <?php if (!empty($notifications)): ?>
                                <?php foreach ($notifications as $notif): ?>
                                    <div class="pane border-bottom p-3">
                                        <?php /*
                                        <i class="bi bi-people-fill"></i>
                                        */ ?>
                                        <div class="ms-3">
                                            <?php /*
                                            <h2 class="card-title mb-1 lead" style="font-weight: 600">Newmarket Nights</h2>
                                            */ ?>
                                            <p class="card-text mb-2"><?php echo $notif['value']; ?></p>
                                            <p class="card-text mb-0 small text-muted">
                                                <i class="bi bi-calendar"></i> <?php echo $notif['date_notification']; ?>
                                            </p>
                                            <?php /*
                                            <p class="card-text mb-0 small text-muted">
                                                Place: Cambridge Boat Club, Cambridge
                                            </p>
                                            */ ?>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <?php /*
                <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas>
                <h2>Section title</h2>
                <div class="table-responsive small">
                    <table class="table table-striped table-sm">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Header</th>
                                <th scope="col">Header</th>
                                <th scope="col">Header</th>
                                <th scope="col">Header</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1,001</td>
                                <td>random</td>
                                <td>data</td>
                                <td>placeholder</td>
                                <td>text</td>
                            </tr>
                            <tr>
                                <td>1,002</td>
                                <td>placeholder</td>
                                <td>irrelevant</td>
                                <td>visual</td>
                                <td>layout</td>
                            </tr>
                            <tr>
                                <td>1,003</td>
                                <td>data</td>
                                <td>rich</td>
                                <td>dashboard</td>
                                <td>tabular</td>
                            </tr>
                            <tr>
                                <td>1,003</td>
                                <td>information</td>
                                <td>placeholder</td>
                                <td>illustrative</td>
                                <td>data</td>
                            </tr>
                            <tr>
                                <td>1,004</td>
                                <td>text</td>
                                <td>random</td>
                                <td>layout</td>
                                <td>dashboard</td>
                            </tr>
                            <tr>
                                <td>1,005</td>
                                <td>dashboard</td>
                                <td>irrelevant</td>
                                <td>text</td>
                                <td>placeholder</td>
                            </tr>
                            <tr>
                                <td>1,006</td>
                                <td>dashboard</td>
                                <td>illustrative</td>
                                <td>rich</td>
                                <td>data</td>
                            </tr>
                            <tr>
                                <td>1,007</td>
                                <td>placeholder</td>
                                <td>tabular</td>
                                <td>information</td>
                                <td>irrelevant</td>
                            </tr>
                            <tr>
                                <td>1,008</td>
                                <td>random</td>
                                <td>data</td>
                                <td>placeholder</td>
                                <td>text</td>
                            </tr>
                            <tr>
                                <td>1,009</td>
                                <td>placeholder</td>
                                <td>irrelevant</td>
                                <td>visual</td>
                                <td>layout</td>
                            </tr>
                            <tr>
                                <td>1,010</td>
                                <td>data</td>
                                <td>rich</td>
                                <td>dashboard</td>
                                <td>tabular</td>
                            </tr>
                            <tr>
                                <td>1,011</td>
                                <td>information</td>
                                <td>placeholder</td>
                                <td>illustrative</td>
                                <td>data</td>
                            </tr>
                            <tr>
                                <td>1,012</td>
                                <td>text</td>
                                <td>placeholder</td>
                                <td>layout</td>
                                <td>dashboard</td>
                            </tr>
                            <tr>
                                <td>1,013</td>
                                <td>dashboard</td>
                                <td>irrelevant</td>
                                <td>text</td>
                                <td>visual</td>
                            </tr>
                            <tr>
                                <td>1,014</td>
                                <td>dashboard</td>
                                <td>illustrative</td>
                                <td>rich</td>
                                <td>data</td>
                            </tr>
                            <tr>
                                <td>1,015</td>
                                <td>random</td>
                                <td>tabular</td>
                                <td>information</td>
                                <td>text</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                */ ?>
            </main>