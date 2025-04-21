<?php

namespace App\Controllers;

use App\Core\Database;
use App\Models\User;

class LoginController{
    public function login(){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $login = $_POST['login'];
            $password = $_POST['password'];

            $db = Database::getConnection();
            $userModel = new User($db);
            $user = $userModel->findByUsernameOrEmail($login);

            if($user && password_verify($password, $user['password'])){
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