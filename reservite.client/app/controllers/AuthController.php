<?php

    class AuthController extends Controller{
        
        public function login(){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $username = $_POST['username'];
                $password = $_POST['password'];
                $user = $this->model('User');
                $token = $user->authenticate($username,$password);
                if($token){
                    $_SESSION['authToken'] = $token;
                    header('Location: /index');
                }else{
                    header('Location: /login?error=true');
                }
            }else{
                $this->view('login');
            }
        }

    }

?>