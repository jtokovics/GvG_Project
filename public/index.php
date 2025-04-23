<?php

require_once __DIR__ . '/../vendor/autoload.php';

use App\Core\Router;

$router = new Router();

$router->get('/register', 'App\Controllers\RegisterController@load');
$router->post('/register', 'App\Controllers\RegisterController@load');

$router->get('/login', 'App\Controllers\LoginController@load');
$router->post('/login', 'App\Controllers\LoginController@load');

$router->run();