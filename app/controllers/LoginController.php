<?php

class LoginController
{
    public function login()
    {
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $login = $_POST['login'];
            $password = $_POST['password'];

            $userModel = new User();
            $user = $userModel->findByUsernameOrEmail($login);

            if($user && password_verity($password, $user['password'])){
                session_start();
                $_SESSION['user'] = $user['id'];

                header("Location: /dashboard");
                exit;
            }else{
                echo "Invalid login credentials.";
            }
        }

        require_once "../views/auth/login.php";
    }
}