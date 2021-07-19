<?php


class CustomErrorHandler
{
    public static function handle($errno, $errstr, $errfile, $errline)
    {
        $errstr = htmlspecialchars($errstr);
        echo "Error: [$errno] $errstr";

        return true;
    }
}