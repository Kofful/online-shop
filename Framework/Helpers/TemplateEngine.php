<?php

namespace Framework\Helpers;

use Helpers\Exceptions\LayoutNotFoundException;

class TemplateEngine
{
    /**
     * @throws LayoutNotFoundException
     */
    public static function render($template, $params, $layout)
    {
        ob_start();
        $data = $params;
        $fileSource = __DIR__ . "/../../App/View/Templates/" . $layout;
        if (!file_exists($fileSource)) {
            throw new LayoutNotFoundException("File does not exist: {$fileSource}");
        }
        include_once(__DIR__ . "/../../App/View/Layouts/header.php");
        require($fileSource);
        include_once(__DIR__ . "/../../App/View/Layouts/footer.php");
        ob_end_flush();
    }

    public static function redirect($url)
    {
        ob_end_clean();
        ob_start();
        header("Location: {$url}");
        ob_end_flush();
    }

    public static function json($data)
    {
        ob_end_clean();
        echo json_encode($data);
        ob_end_flush();
    }
}
