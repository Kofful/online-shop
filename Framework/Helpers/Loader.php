<?php

class Loader
{
    public static function autoload($class)
    {
        $classes = include(__DIR__ . "/../../storage/classes.php");
        if (isset($classes[$class])) {
            if (!file_exists(__DIR__ . "/../.." . $classes[$class])) {
                throw new Exception("Cannot find class " . $class);
            }
            require_once(__DIR__ . "/../.." . $classes[$class]);
        } else {
            throw new Exception("Cannot find class " . $class);
        }

    }
}