<?php

namespace App\Controllers;

use App\Entity\Product;
use Framework\Helpers\TemplateEngine;

class HomeController
{
    public static function index()
    {
        TemplateEngine::render(null, null, "home.php");
    }

    public static function getProducts()
    {
        $data = Product::getMainProducts();
        TemplateEngine::json($data);
    }
}
