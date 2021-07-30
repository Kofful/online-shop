<?php

namespace App\Service;

use Framework\Authentication\Authentication;

class Middleware
{
    public static function auth() {
        return Authentication::isAuth();
    }

    public static function unauth() {
        return !Authentication::isAuth();
    }
}