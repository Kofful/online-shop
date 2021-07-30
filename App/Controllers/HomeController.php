<?php

namespace App\Controllers;

use Framework\Helpers\TemplateEngine;

class HomeController
{
    public static function index() {
        TemplateEngine::render(null, null, "home.php");
    }
}