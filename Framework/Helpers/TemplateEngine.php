<?php

namespace Framework\Helpers;

use Helpers\Exceptions\LayoutNotFoundException;

class TemplateEngine
{
    public static function render($template, $params, $layout)
    {
        ob_start();
        $data = $params;
        $fileSource = __DIR__ . "/../../App/View/Templates/" . $layout;
        if(!file_exists($fileSource)) {
            throw new LayoutNotFoundException("File does not exist: {$fileSource}");
        }
        require($fileSource);
        ob_end_flush();
    }

    public static function redirect($url) {
        ob_start();
        if(!file_exists(__DIR__ . "/../../App/View/Templates/redirect.php")) {
            throw new LayoutNotFoundException("File does not exist: App/View/Templates/redirect.php");
        }
        require(__DIR__ . "/../../App/View/Templates/redirect.php");
        ob_end_flush();
    }
}