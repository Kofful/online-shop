<?php

namespace App\Controllers;

use App\Entity\Product;
use App\Entity\UserProduct;
use Framework\Authentication\Authentication;
use Framework\Helpers\TemplateEngine;
use Illuminate\Database\Capsule\Manager as DB;

class ProductController
{
    private static function getUrlId(): int
    {
        $request = explode("?", $_SERVER["REQUEST_URI"])[0];
        return (int) last(explode("/", $request));
    }

    public static function index()
    {
        $data = Product::getProductById(self::getUrlId());
        TemplateEngine::render("product", $data, "product.php");
    }

    public static function getProducts()
    {
        $products = Product::getProducts($_GET);
        $result = [
            "data" => $products->items(),
            "currentPage" => $products->currentPage(),
            "hasMorePages" => $products->hasMorePages()
        ];
        TemplateEngine::json($result);
    }

    public static function buyProduct()
    {
        $id = self::getUrlId();
        try {
            DB::transaction(function () use ($id) {
                Product::buyProduct($id);
                UserProduct::create([
                    "user_id" => Authentication::getId(),
                    "product_id" => $id
                ]);
            });
        } catch (\Throwable $t) {
            print_r($t->getMessage());
            print_r($t->getFile());
            print_r($t->getTraceAsString());
        }
    }
}
