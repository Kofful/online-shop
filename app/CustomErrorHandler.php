<?php


class CustomErrorHandler
{
    public function handle($errno, $errstr, $errfile, $errline)
    {
        $errstr = htmlspecialchars($errstr);
        echo "Error: [$errno] $errstr";

        return true;
    }
}