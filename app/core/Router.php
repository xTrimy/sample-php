<?php

namespace App\Core;

use App\Bootstrap\App;
use App\Routes;

class Router{
    public static function route(string $base_path){
        $base_path = str_replace('\\', '/', $base_path);
        $base_path = rtrim($base_path, '/');
        $base_path = str_replace($_SERVER['DOCUMENT_ROOT'], '', $base_path);
        Routes::init();
        $uri = $_SERVER['REQUEST_URI'];
        $uri = str_replace($base_path, '', $uri);
        $method = $_SERVER['REQUEST_METHOD'];
        $routes = Route::getRoutes();
        $route = $routes[$method][$uri] ?? null;
        if ($route) {
            list($class, $method) = $route;
            if (class_exists($class) && method_exists($class, $method)) {
                $controller = new $class();
                $response = call_user_func([$controller, $method]);
                if ($response) {
                    echo $response;
                } else {
                    http_response_code(200);
                    echo "200 OK";
                }
            } else {
                http_response_code(404);
                echo "404 Not Found";
            }
        } else {
            http_response_code(404);
            echo "404 Not Found";
        }

    }
}