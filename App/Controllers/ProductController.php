<?php

namespace App\Controllers;

use Framework\Helpers\TemplateEngine;

class ProductController
{
    public static function index()
    {
        $data = [];
        TemplateEngine::render("product", $data, "product.php");
    }
}
