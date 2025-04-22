<?php

namespace App\Models;

use App\Core\Database;
use PDO;

class User{
    protected $db;

    public function __construct($db = null){
        $this->db = $db ?? Database::getConnection();
    }

    public static function create($username, $email, $password){
        $db= Database::getConnection();

        $stmt = $db->prepare("INSERT INTO users (username, email, password) VALUES (:username, :email, :password)");
        return $stmt->execute([
            ':username' => $username,
            ':email' => $email,
            ':password' => password_hash($password, PASSWORD_DEFAULT), //hash the password before storing in the database
        ]);
    }

    public function findByUsernameOrEmail($login){
        $stmt = $this->db->prepare("SELECT * FROM users WHERE username = :login OR email = :login");
        $stmt->execute(['login' => $login]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}