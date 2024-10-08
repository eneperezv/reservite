<?php
/*
 * @(#)main_menu.php 1.0 22/09/2024
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
$aMain = ''; 
$aClient = ''; 
$aHotel = ''; 
$aRoom = ''; 
$aBooking = ''; 
if($_GET['page']=='main'){
    $aMain = 'active';
}elseif($_GET['page']=='clients'){
    $aClient = 'active';
}elseif($_GET['page']=='hotels'){
    $aHotel = 'active';
}elseif($_GET['page']=='rooms'){
    $aRoom = 'active';
}elseif($_GET['page']=='bookings'){
    $aBooking = 'active';
}
?>
<div class="sidebar border border-right col-md-3 col-lg-2 p-0 bg-body-tertiary">
                <div class="offcanvas-md offcanvas-end bg-body-tertiary" tabindex="-1" id="sidebarMenu" aria-labelledby="sidebarMenuLabel">
                    <div class="offcanvas-header">
                        <h5 class="offcanvas-title" id="sidebarMenuLabel">reservite.v3</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#sidebarMenu" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body d-md-flex flex-column p-0 pt-lg-3 overflow-y-auto">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link d-flex align-items-center gap-2 <?php print $aMain; ?>" aria-current="page" href="dash.php?page=main">
                                    <i class="bi bi-speedometer"></i>
                                    Dashboard
                                </a>
                            </li>
                        </ul>
                        <hr class="my-3">
                        <ul class="nav flex-column mb-auto">
                            <li class="nav-item">
                                <a class="nav-link d-flex align-items-center gap-2 <?php print $aClient; ?>" href="dash.php?page=clients">
                                    <i class="bi bi-people-fill"></i>
                                    Clients
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link d-flex align-items-center gap-2 <?php print $aHotel; ?>" href="dash.php?page=hotels">
                                    <i class="bi bi-houses"></i>
                                    Hotels
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link d-flex align-items-center gap-2 <?php print $aRoom; ?>" href="dash.php?page=rooms">
                                    <i class="bi bi-door-closed-fill"></i>
                                    Rooms
                                </a>
                            </li>
                        </ul>
                        <hr class="my-3">
                        <ul class="nav flex-column mb-auto">
                            <li class="nav-item">
                                <a class="nav-link d-flex align-items-center gap-2 <?php print $aBooking; ?>" href="#">
                                    <i class="bi bi-journal-bookmark-fill"></i>
                                    Booking
                                </a>
                            </li>
                        </ul>
                        <?php /*
                        <ul class="nav flex-column mb-auto">
                            <li class="nav-item">
                                <a class="nav-link d-flex align-items-center gap-2" href="#">
                                    <svg class="bi"><use xlink:href="#cart"/></svg>
                                    Products
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link d-flex align-items-center gap-2" href="#">
                                    <svg class="bi"><use xlink:href="#people"/></svg>
                                    Customers
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link d-flex align-items-center gap-2" href="#">
                                    <svg class="bi"><use xlink:href="#graph-up"/></svg>
                                    Reports
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link d-flex align-items-center gap-2" href="#">
                                    <svg class="bi"><use xlink:href="#puzzle"/></svg>
                                    Integrations
                                </a>
                            </li>
                        </ul>
                        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-body-secondary text-uppercase">
                            <span>Saved reports</span>
                            <a class="link-secondary" href="#" aria-label="Add a new report">
                                <svg class="bi"><use xlink:href="#plus-circle"/></svg>
                            </a>
                        </h6>
                        <ul class="nav flex-column mb-auto">
                            <li class="nav-item">
                                <a class="nav-link d-flex align-items-center gap-2" href="#">
                                    <svg class="bi"><use xlink:href="#file-earmark-text"/></svg>
                                    Current month
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link d-flex align-items-center gap-2" href="#">
                                    <svg class="bi"><use xlink:href="#file-earmark-text"/></svg>
                                    Last quarter
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link d-flex align-items-center gap-2" href="#">
                                    <svg class="bi"><use xlink:href="#file-earmark-text"/></svg>
                                    Social engagement
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link d-flex align-items-center gap-2" href="#">
                                    <svg class="bi"><use xlink:href="#file-earmark-text"/></svg>
                                    Year-end sale
                                </a>
                            </li>
                        </ul>
                        */ ?>
                        <hr class="my-3">
                        <ul class="nav flex-column mb-auto">
                            <li class="nav-item">
                                <a class="nav-link d-flex align-items-center gap-2" href="#">
                                    <svg class="bi"><use xlink:href="#gear-wide-connected"/></svg>
                                    Settings
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link d-flex align-items-center gap-2" href="logout.php">
                                    <i class="bi bi-x-circle-fill"></i>
                                    Sign out
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>