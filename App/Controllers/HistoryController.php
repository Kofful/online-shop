<?php

namespace App\Controllers;

use App\Entity\UserProduct;
use Framework\Helpers\TemplateEngine;

class HistoryController
{
    public static function index()
    {
        TemplateEngine::render("history", null, "history.php");
    }

    public static function getProducts()
    {
        $data = UserProduct::getBoughtProducts();
        TemplateEngine::json($data);
    }
}
