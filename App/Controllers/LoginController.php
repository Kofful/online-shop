<?php


class LoginController
{
    public static function index() {
        TemplateEngine::render("login", null, "login.php");
    }
}