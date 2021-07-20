<?php


class Router
{
    private static $arr_get = [];

    public static function get($url, $controller) {
        $controller = explode("@", $controller);
        $class = $controller[0];
        $method = "index";
        if(isset($controller[1])) {
            $method = $controller[1];
        }
        $url = "/^" . str_replace("/", "\/", $url) . "$/";
        array_push(self::$arr_get, compact("class", "method", "url"));
    }

    public static function run()
    {
        $request = explode("?", $_SERVER["REQUEST_URI"])[0];
        foreach (self::$arr_get as $pattern) {
            if(preg_match($pattern["url"], $request)) {
                extract($pattern);
                call_user_func([$class, $method]);
                return;
            }
        }
        throw new Exception("Route not found");
//        if (empty($request[1])) {
//            TemplateEngine::render(null, null, "home.php");
//        } else {
//            try {
//                TemplateEngine::render($request[1], $_GET, $request[1] . ".php");
//            } catch (Throwable $t) {
//                TemplateEngine::render(null, null, "home.php");
//            }
//        }
    }
}