<?php

namespace Framework\Router;

use Framework\Helpers\TemplateEngine;
use App\Controllers\HomeController;

class Router
{
    private static array $routesGet = [];
    private static array $routesPost = [];

    private static function addRoute($url, $controller, $middleware, &$array)
    {
        $controller = explode("@", $controller);
        $class = $controller[0];
        $method = "index";
        if (isset($controller[1])) {
            $method = $controller[1];
        }
        $url = "/^" . str_replace("/", "\/", $url) . "$/";
        array_push($array, compact("class", "method", "url", "middleware"));
    }

    public static function get($url, $controller, $middleware = null)
    {
        self::addRoute($url, $controller, $middleware, self::$routesGet);
    }

    public static function post($url, $controller, $middleware = null)
    {
        self::addRoute($url, $controller, $middleware, self::$routesPost);
    }

    public static function run()
    {
        $request = explode("?", $_SERVER["REQUEST_URI"])[0];
        switch ($_SERVER["REQUEST_METHOD"]) {
            case "GET":
                foreach (self::$routesGet as $route) {
                    if (self::acceptRoute($route, $request)) {
                        return;
                    }
                }
                break;
            case "POST":
                foreach (self::$routesPost as $route) {
                    if (self::acceptRoute($route, $request)) {
                        return;
                    }
                }
                break;
        }
        throw new Exception("Route not found");
    }

    private static function callMiddleware($middleware)
    {
        try {
            return call_user_func(["App\\Service\\Middleware", $middleware]);
        } catch (Exception $ex) {
            return false;
        }
    }

    private static function acceptRoute($route, $request): bool
    {
        extract($route);
        if (preg_match($url, $request)) {
            if (!isset($middleware) || self::callMiddleware($middleware)) {
                call_user_func(["App\\Controllers\\" . $class, $method], $_POST);
            } else {
                call_user_func(["App\\Controllers\\HomeController", "index"]);
            }
            return true;
        }
        return false;
    }

    public static function redirect($url)
    {
        TemplateEngine::render("redirect", compact("url"), "redirect.php");
    }
}
