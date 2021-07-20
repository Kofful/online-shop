<?php


class CartController
{
    public static function index() {
        $data = Product::getCartProducts();
        TemplateEngine::render("cart", $data, "cart.php");
    }
}