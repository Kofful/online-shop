<?php

namespace App\Controllers;

use Framework\Helpers\TemplateEngine;
use Framework\Router\Router;
use Framework\Authentication\Authentication;

class RegisterController
{
    public static function index()
    {
        TemplateEngine::render("register", null, "register.php");
    }


    public static function register($data)
    {
        if (!isset($data["phone"]) || $data["phone"] == "" || !isset($data["password"]) || $data["password"] == "") {
            Router::redirect("/register");
        }
        //Store to db when it's possible. Now just logging in using data from file
        if (Authentication::auth($data["phone"], $data["password"])) {
            Router::redirect("/");
        }
        Router::redirect("/register");
    }
}
