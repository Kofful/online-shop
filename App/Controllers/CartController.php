<?php

namespace App\Controllers;

use App\Entity\Product;
use App\Entity\UserProduct;
use Framework\Helpers\TemplateEngine;

class CartController
{
    public static function index()
    {
        $data = UserProduct::getCartProducts();
        TemplateEngine::render("cart", $data, "cart.php");
    }
}
