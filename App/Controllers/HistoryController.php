<?php

namespace App\Controllers;

use App\Entity\UserProduct;
use Framework\Helpers\TemplateEngine;

class HistoryController
{
    public static function index()
    {
        $data = UserProduct::getBoughtProducts();
        TemplateEngine::render("history", $data, "history.php");
    }
}
