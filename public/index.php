<?php

require_once __DIR__ . '/../vendor/autoload.php';

use App\Controllers\RegisterController;

$uri = $_SERVER['REQUEST_URI'];

if($uri === '/register'){
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        (new RegisterController)->register();
    } else{
        (new RegisterController)->index();
    }
} else{
    echo "404 - Nincs ilyen oldal.";
}