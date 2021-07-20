<?php


class HomeController
{
    public static function index() {
        TemplateEngine::render(null, null, "home.php");
    }
}