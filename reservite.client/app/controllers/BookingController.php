<?php

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