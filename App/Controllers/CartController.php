<?php

namespace App\Controllers;

use App\Entity\Product;
use Framework\Helpers\TemplateEngine;

class CartController
{
    public static function index()
    {
        $data = Product::getCartProducts();
        TemplateEngine::render("cart", $data, "cart.php");
    }
}
