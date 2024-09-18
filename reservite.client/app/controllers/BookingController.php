<?php

/* PENDIENTR DE PRUEBAS
 * @(#)BookingController.php 1.0 15/09/2024
 * 
 * El código implementado en este formulario esta protegido
 * bajo las leyes internacionales del Derecho de Autor, sin embargo
 * se entrega bajo las condiciones de la General Public License (GNU GPLv3)
 * descrita en https://www.gnu.org/licenses/gpl-3.0.html
 */

/**
 * Clase Controller para gestion de reservas
 *
 * @author eliezer.navarro
 * @version 1.0 | 15/09/2024
 * @since 1.0
 */

    class BookingController extends Controller{

        public function index(){
            $this->view('index');
        }

        public function reserve(){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $roomType = $_POST['roomType'];
                $checkInDate = $_POST['checkInDate'];
                $checkOutDate = $_POST['checkOutDate'];

                $reservation = $this->model('Booking');
                $response = $reservation->reserveRoom($roomType,$checkInDate,$checkOutDate,$_SESSION['authToken']);

                if($response && $response['status'] == 200){
                    $this->view('confirmation',['booking' => $response['data']]);
                }else{
                    $this->view('booking', ['error' => 'Reservation Failed']);
                }
            }else{
                $this->view('booking');
            }
        }

    }

?>