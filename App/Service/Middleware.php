<?php

namespace App\Service;

use Framework\Authentication\Authentication;

class Middleware
{
    public static function auth($params = []) {
        $response = Authentication::isAuth();
        if(isset($params["statement"]) && !$params["statement"]) {
            //if user has to be unauthorized, we reverse response
            $response = !$response;
        }
        return $response;
    }
}