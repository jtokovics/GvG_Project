<?php

namespace App\Core;

class Router{
    private $routes = [];

    public function get($uri, $controllerAction){
        $this->addRoute('GET', $uri, $controllerAction);
    }

    public function post($uri, $controllerAction){
        $this->addRoute('POST', $uri, $controllerAction);
    }

    private function addRoute($method, $uri, $controllerAction){
        $this->routes[$method][$uri] = $controllerAction;
    }

    public function run(){
        $method = $_SERVER['REQUEST_METHOD'];
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

        $action = $this->routes[$method][$uri] ?? null;

        if(!$action){
            http_response_code(404);
            echo '404 - Not Found';
            return;
        }

        [$controller, $method] = explode('@', $action);
        if(class_exists($controller)){
            $controllerInstance = new $controller();
            if(method_exists($controllerInstance, $method)){
                $controllerInstance->$method();
                return;
            }
        }

        http_response_code(500);
        echo '500 - Controller or method not found';
    }
}

