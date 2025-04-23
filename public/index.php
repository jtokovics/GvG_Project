<?php

require_once __DIR__ . '/../vendor/autoload.php';

use App\Core\Router;

$router = new Router();

$router->get('/register', 'App\Controllers\RegisterController@register');
$router->post('/register', 'App\Controllers\RegisterController@register');

$router->get('/login', 'App\Controllers\LoginController@login');
$router->post('/login', 'App\Controllers\LoginController@login');

$router->run();