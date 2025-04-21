<?php

namespace App\Core;

use PDO;
use PDOException;

class Database{
    private static ?PDO $instance = null;

    public static function getConnection(): PDO{
        if(self::$instance === null){
            $dotenv = \Dotenv\Dotenv::createImmutable(__DIR__ . '/../../');
            $dotenv->load();
            
            $host = $_ENV['DB_HOST'];
            $port = $_ENV['DB_PORT'];
            $dbname = $_ENV['DB_NAME'];
            $user = $_ENV['DB_USER'];
            $pass = $_ENV['DB_PASS'];

            try{
                self::$instance = new PDO(
                    "pgsql:host=$host;port=$port;dbname=$dbname",
                    $user,
                    $pass,
                    [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
                );
            }catch(PDOException $e){
                die("Database connection error: " . $e->getMessage());
            }
        }
        return self::$instance;
    }
}