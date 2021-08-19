<?php

namespace App\Controllers;

use App\Entity\Product;
use Framework\Helpers\TemplateEngine;

class HomeController
{
    public static function index()
    {
        $data = Product::getMainProducts();
        TemplateEngine::render(null, $data, "home.php");
    }
}
