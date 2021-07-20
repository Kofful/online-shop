<?php


class ProductController
{
    public static function index() {
        $data = [];
        TemplateEngine::render("product", $data, "product.php");
    }
}