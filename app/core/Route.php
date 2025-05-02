<?php

namespace App\Core;

class Route{
    private static $routes = [];

    public static function get(string $uri, string $class, string $method = 'index')
    {
        self::$routes['GET'][$uri] = [$class, $method];
    }

    public static function post(string $uri, string $class, string $method = 'index')
    {
        self::$routes['POST'][$uri] = [$class, $method];
    }

    public static function put(string $uri, string $class, string $method = 'index')
    {
        self::$routes['PUT'][$uri] = [$class, $method];
    }

    public static function delete(string $uri, string $class, string $method = 'index')
    {
        self::$routes['DELETE'][$uri] = [$class, $method];
    }

    public static function getRoutes()
    {
        return self::$routes;
    }

}