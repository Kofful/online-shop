<?php


class TemplateEngine
{
    public static function render($template, $params, $layout) {
        ob_start();
        $data = [];
        switch ($template) {
            case "catalog":
            {
                $data = require(__DIR__ . "/../storage/products.php");
                break;
            }
            case "cart": {
                $data = require(__DIR__ . "/../storage/cart-products.php");
                break;
            }
        }
        require_once(__DIR__ . "/../App/View/Templates/" . $layout);
        ob_end_flush();
    }
}