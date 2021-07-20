<?php


class RegisterController
{
    public static function index() {
        TemplateEngine::render("register", null, "register.php");
    }
}