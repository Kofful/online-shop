<?php

namespace App\Controllers;

use App\Entity\User;
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
        if (!isset($data["phone"]) || $data["phone"] == "" ||
            !isset($data["password"]) || $data["password"] == "") {
            TemplateEngine::redirect("/register");
        }
        $password = hash("sha256", $data["password"]);
        if (!User::all()->where("phone", "=", $data["phone"])->first()) {
            User::create([
                "phone" => $data["phone"],
                "password" => $password
            ]);
            if (Authentication::auth($data["phone"], $password)) {
                TemplateEngine::redirect("/");
            }
        }
        TemplateEngine::redirect("/register");
    }
}
