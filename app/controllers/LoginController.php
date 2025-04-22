<?php

namespace App\Controllers;

use App\Models\User;

class LoginController{
    public function login(){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $login = $_POST['login'];
            $password = $_POST['password'];

            $user = (new User())->findByUsernameOrEmail($login);

            if($user && password_verify($password, $user['password'])){
                session_start();
                $_SESSION['user_id'] = $user['id'];
                header("Location: /dashboard");
                exit;
            }else{
                $error = "Invalid login credentials.";
                require_once __DIR__ . '/../views/auth/login.php';
            }
        } else{
            require_once "../views/auth/login.php";
        }
    }
}