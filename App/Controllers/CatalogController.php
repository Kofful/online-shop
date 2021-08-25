<?php

namespace App\Controllers;

use App\Entity\Product;
use Framework\Helpers\TemplateEngine;

class CatalogController
{
    public static function index()
    {
        TemplateEngine::render("catalog", null, "catalog.php");
    }
}
