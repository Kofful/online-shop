<?php


class CatalogController
{
    public static function index() {
        try {
            $data = Product::getProducts();
            TemplateEngine::render("catalog", $data, "catalog.php");
        } catch (Exception $exception) {
            echo "Error: {$exception->getMessage()}";
            echo "Line: {$exception->getLine()}";
            echo "File: {$exception->getFile()}";
        }
    }
}