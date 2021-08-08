<?php

namespace App\Service;

use Framework\Authentication\Authentication;

class Middleware
{
    public static function auth(): bool
    {
        return Authentication::isAuth();
    }

    public static function unauth(): bool
    {
        return !Authentication::isAuth();
    }
}