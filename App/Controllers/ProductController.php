<?php

namespace App\Controllers;

use App\Entity\Product;
use Framework\Helpers\TemplateEngine;

class ProductController
{
    public static function index()
    {
        $data = [];
        TemplateEngine::render("product", $data, "product.php");
    }

    public static function getProducts()
    {
        $products = Product::getProducts();
        $result = [];
        foreach ($products as $product) {
            $productArray = [];
            $productArray["id"] = $product->getId();
            $productArray["name"] = $product->getName();
            $productArray["price"] = $product->getPrice();
            $productArray["photo"] = $product->getPhoto();
            $productArray["shortDescription"] = $product->getShortDescription();
            array_push($result, $productArray);
        }
        TemplateEngine::json($result);
    }
}
