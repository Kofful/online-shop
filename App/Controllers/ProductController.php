<?php

namespace App\Controllers;

use App\Entity\Product;
use Framework\Helpers\TemplateEngine;

class ProductController
{
    public static function index()
    {
        $request = explode("?", $_SERVER["REQUEST_URI"])[0];
        $id = last(explode("/", $request));
        $data = Product::getProductById($id);
        TemplateEngine::render("product", $data, "product.php");
    }
}
