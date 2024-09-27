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
?>
<?php /* PENDIENTE ELIMINAR DATOS QUE SE MUESTRAN Y CARGAR WIDGETS CON DATOS (CLIENTES,HABITACIONES DISPONIBLES,RESERVAS, ETC) */ ?>
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Dashboard</h1>
                    <?php /*
                    <div class="btn-toolbar mb-2 mb-md-0">
                        <div class="btn-group me-2">
                            <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
                            <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
                        </div>
                        <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle d-flex align-items-center gap-1">
                            <svg class="bi"><use xlink:href="#calendar3"/></svg>
                            This week
                        </button>
                    </div>
                    */ ?>
                </div>
                <div class="row g-3">
                    <div class="col-8">
                        <div class="row">
                            <div class="col-6">
                                <div class="card mb-4">
                                    <div class="card-body">
                                        <div class="lead">Total Downloads 1</div>
                                        <h2 class="card-title">1,057,891</h2>
                                        <p class="small text-muted">Oct 1 - Dec 31,<i class="fa fa-globe"></i> Worldwide</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="card mb-4">
                                    <div class="card-body">
                                        <div class="lead">Total Downloads 2</div>
                                        <h2 class="card-title">1,057,891</h2>
                                        <p class="small text-muted">Oct 1 - Dec 31,<i class="fa fa-globe"></i> Worldwide</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="card mb-4">
                                    <div class="card-body">
                                        <div class="lead">Total Downloads 3</div>
                                        <h2 class="card-title">1,057,891</h2>
                                        <p class="small text-muted">Oct 1 - Dec 31,<i class="fa fa-globe"></i> Worldwide</p>
                                    </div>
                                </div>
                            </div>
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
                                <div class="card mb-4">
                                    <div class="card-body">
                                        <div class="lead">Total Downloads 5</div>
                                        <h2 class="card-title">1,057,891</h2>
                                        <p class="small text-muted">Oct 1 - Dec 31,<i class="fa fa-globe"></i> Worldwide</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="card">
                            <h2 class="card-title lead p-4 border-bottom" style="font-weight: 600">Events</h2>
                            <div class="pane border-bottom p-3">
                                <i class="far fa-3x fa-calendar-alt text-danger ms-2" aria-hidden="true"></i>
                                <div class="ms-3">
                                    <h2 class="card-title mb-1 lead" style="font-weight: 600">Newmarket Nights</h2>
                                    <p class="card-text mb-2">Organized by University of Oxford</p>
                                    <p class="card-text mb-0 small text-muted">Time: 6:00AM</p>
                                    <p class="card-text mb-0 small text-muted">
                                        Place: Cambridge Boat Club, Cambridge
                                    </p>
                                </div>
                            </div>
                            <div class="pane border-bottom p-3">
                                <i class="far fa-3x fa-calendar-alt text-danger" aria-hidden="true"></i>
                                <div class="ms-3">
                                    <h2 class="card-title mb-1 lead" style="font-weight: 600">
                                        Noco Hemp Expo
                                    </h2>
                                    <p class="card-text mb-2">Organized by University of Oxford</p>
                                    <p class="card-text mb-0 small text-muted">
                                        Thu, 12 Sep - Sat, 18 Sep 2020
                                    </p>
                                    <p class="card-text mb-0 small text-muted">
                                        Place: Denver Expo Club, USA
                                    </p>
                                </div>
                            </div>
                            <div class="pane border-bottom p-3">
                                <i class="far fa-3x fa-calendar-alt text-danger ms-2" aria-hidden="true"></i>
                                <div class="ms-3">
                                    <h2 class="card-title mb-1 lead" style="font-weight: 600">
                                        Canadian National Exhibition (CNE)
                                    </h2>
                                    <p class="card-text mb-2">Organized by University of Oxford</p>
                                    <p class="card-text mb-0 small text-muted">
                                        Fri, 20 Sep - Mon, 07 Oct 2020
                                    </p>
                                    <p class="card-text mb-0 small text-muted">
                                        Place: Toronto , Canada
                                    </p>
                                </div>
                            </div>
                            <p class="card-text p-4 text-center pointer border-top">See All</p>
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