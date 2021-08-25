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
        TemplateEngine::render("cart", null, "cart.php");
    }

    public static function buyAll()
    {
        $userId = Authentication::getId();
        $count = UserProduct::buyAll($userId);
        TemplateEngine::json(["count"=> $count]);
    }

    public static function getProducts()
    {
        $data = UserProduct::getCartProducts();
        TemplateEngine::json($data);
    }
}
