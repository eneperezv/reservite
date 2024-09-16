<?php

    class Booking{

        public function reserveRoom($roomType,$checkInDate,$checkOutDate){
            $url = 'URL_DE_LA_API';
            $data = [
                'roomType' => $roomType,
                'checkInDate' => $checkInDate,
                'checkOutDate' => $checkOutDate
            ];

            $options = [
                'http' => [
                    'header' => "Content-type: application/json\r\nAuthorization: Bearer $token\r\n",
                    'method' => 'POST',
                    'content' => json_encode($data),
                ],
            ];

            $context = stream_context_create($options);
            $result = file_get_contents($url,false,$context);

            if($result === FALSE){
                return null;
            }

            $response = json_decode($result,true);
            return [
                'status' => http_response_code(),
                'data' => $response
            ];
        }

    }

?>