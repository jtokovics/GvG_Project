<?php

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../app/helpers/sessions.php';

use App\Core\Router;

ini_set('display_error',1);
ini_set('display_startup_error', 1);
error_reporting(E_ALL);

$router = new Router();

$router->get('/register', 'App\Controllers\RegisterController@register');
$router->post('/register', 'App\Controllers\RegisterController@register');

$router->get('/login', 'App\Controllers\LoginController@login');
$router->post('/login', 'App\Controllers\LoginController@login');

$router->post('/dashboard', 'App\Controllers\DashboardController@index');

$router->run();