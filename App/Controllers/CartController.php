<?php

namespace App\Controllers;

use App\Entity\Product;
use App\Entity\UserProduct;
use Framework\Authentication\Authentication;
use Framework\Helpers\TemplateEngine;

class CartController
{
    public static function index()
    {
        $data = UserProduct::getCartProducts();
        TemplateEngine::render("cart", $data, "cart.php");
    }

    public static function buyAll()
    {
        $userId = Authentication::getId();
        $count = UserProduct::buyAll($userId);
        TemplateEngine::json(["count"=> $count]);
    }
}
