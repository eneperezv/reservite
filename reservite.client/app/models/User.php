<?php

    class User{

        public function authenticate($username,$password){
            $url = 'http://localhost:8080/api/v1/reservite/auth';
            $data = ['username'=>$username,'password'=>$password];

            $options = [
                'http' => [
                    'header' => "Content-type: application/json\r\n",
                    'method' => 'POST',
                    'contend' => json_encode($data),
                ],
            ];

            $context = stream_context_create($options);
            $result = file_get_contents($url,false,$context);

            if($result == FALSE){
                return null;
            }

            $response = json_decode($result,true);
            return $response['token'] ?? null;
        }

    }

?>