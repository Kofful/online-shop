<?php

namespace App\Controllers;

use App\Entity\Product;
use Framework\Helpers\TemplateEngine;

class CatalogController
{
    public static function index()
    {
        try {
            $data["products"] = Product::getProducts($_GET);
            $data["params"] = $_GET;
            TemplateEngine::render("catalog", $data, "catalog.php");
        } catch (Exception $exception) {
            echo "Error: {$exception->getMessage()}";
            echo "Line: {$exception->getLine()}";
            echo "File: {$exception->getFile()}";
        }
    }
}
