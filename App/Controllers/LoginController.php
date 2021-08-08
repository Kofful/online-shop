<?php

namespace App\Controllers;

use Framework\Helpers\TemplateEngine;
use Framework\Router\Router;
use Framework\Authentication\Authentication;

class LoginController
{
    public static function index()
    {
        TemplateEngine::render("login", null, "login.php");
    }

    public static function login($data)
    {
        if (Authentication::auth($data["phone"], $data["password"])) {
            Router::redirect("/");
        }
        Router::redirect("/login");
    }

    public static function logout()
    {
        Authentication::logOut();
        Router::redirect("/");
    }
}
