<?php

namespace Framework\Helpers;

class TemplateEngine
{
    public static function render($template, $params, $layout)
    {
        ob_start();
        $data = $params;
        if (!file_exists(__DIR__ . "/../../App/View/Templates/" . $layout)) {
            throw new Exception("File does not exist");
        }
        require(__DIR__ . "/../../App/View/Templates/" . $layout);
        ob_end_flush();
    }
}
