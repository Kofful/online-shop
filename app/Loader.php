<?php
class Loader {
    public static function autoload($class) {
        $classes = include_once(__DIR__ . "/../storage/classes.php");

        if(isset($classes[$class])) {
            require_once(__DIR__ ."/.." . $classes[$class]);
        } else {
            throw new Exception("Cannot find class " . $class);
        }

        if(!class_exists($class, false)) {
            throw new Exception("Cannot find class " . $class);
        }
    }
}