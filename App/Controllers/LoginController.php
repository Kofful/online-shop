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
            TemplateEngine::redirect("/");
        }
        TemplateEngine::redirect("/login");
    }

    public static function logout()
    {
        Authentication::logOut();
        TemplateEngine::redirect("/");
    }
}
