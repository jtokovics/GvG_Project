<?php

namespace App\Controllers;

use App\Models\User;

class RegisterController{
    public function register(){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $username = $_POST['username'] ?? '';
            $email = $_POST['email'] ?? '';
            $password = $_POST['password'] ?? '';

            if(User::create($username, $email, $password)){
                echo "Sikeres regisztráció!";
            } else{
                echo "Hiba történt a regisztráció során!";
            }
        
            require_once __DIR__ . '/../views/auth/register.php';
        }
    }
}