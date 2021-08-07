<?php

namespace Framework\Router;

use Framework\Helpers\TemplateEngine;
use App\Controllers\HomeController;
use Helpers\Exceptions\RouterException;

class Router
{
    private static $routesGet = [];
    private static $routesPost = [];

    private static function addRoute($url, $controller, $middleware, &$array) {
        $controller = explode("@", $controller);
        $class = $controller[0];
        $method = "index";
        if(isset($controller[1])) {
            $method = $controller[1];
        }
        $url = "/^" . str_replace("/", "\/", $url) . "$/";
        array_push($array, compact("class", "method", "url", "middleware"));

    }

    public static function get($url, $controller, $middleware = null) {
        self::addRoute($url, $controller, $middleware, self::$routesGet);
    }

    public static function post($url, $controller, $middleware = null) {
        self::addRoute($url, $controller, $middleware, self::$routesPost);
    }

    public static function run()
    {
        $request = explode("?", $_SERVER["REQUEST_URI"])[0];
        $routeList = self::getRouteList();
        $routeParams = null;
        foreach ($routeList as $route) {
            if (preg_match($route['url'], $request)) {//if request url matches route url
                $routeParams = $route;
                break;
            }
        }
        if(!isset($routeParams))
            throw new RouterException("Route not found: {$request}");
        return $routeParams;
    }

    private static function getRouteList() {
        $routeList = [];
        switch($_SERVER["REQUEST_METHOD"]) {
            case "GET": {
                $routeList = self::$routesGet;
                break;
            }
            case "POST": {
                $routeList = self::$routesPost;
                break;
            }
        }
        return $routeList;
    }

    public static function redirect($url) {
        TemplateEngine::render("redirect", compact("url"), "redirect.php");
    }

}