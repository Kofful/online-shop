<?php


class LoginController
{
    public static function index() {
        TemplateEngine::render("login", null, "login.php");
    }

    public static function login($data) {
        if(Authentication::auth($data["phone"], $data["password"])) {
            Router::redirect("/");
        }
        Router::redirect("/login");
    }

    public static function logout() {
        Authentication::logOut();
        Router::redirect("/");
    }

}