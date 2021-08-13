<?php

namespace Framework\Helpers;

class CustomErrorHandler
{
    public static function handle($errno, $errstr, $errfile, $errline): bool
    {
        $errstr = htmlspecialchars($errstr);
        echo "Error: [$errno] $errstr <br/>";
        echo "File: $errfile<br/>";
        echo "Line: $errline<br/><br/>";

        return true;
    }
}