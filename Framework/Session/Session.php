<?php

namespace Framework\Session;

class Session
{
    public static function start() {
        return session_start();
    }

    public static function destroy() {
        session_destroy();
    }

    public static function setName($name) {
        session_name($name);
    }

    public static function getName() {
        return session_name();
    }

    public static function setId($id) {
        session_id($id);
    }

    public static function getId() {
        return session_id();
    }

    public static function cookieExists() {
        return !empty($_COOKIE);
    }

    public static function sessionExists() {
        return (session_id() != "");
    }

    public static function setSavePath($savePath) {
        return session_save_path($savePath);
    }

    public static function set($key, $value) {
        $_SESSION[$key] = $value;
    }

    public static function get($key) {
        return $_SESSION[$key];
    }

    public static function contains($key) {
        return isset($_SESSION[$key]);
    }

    public static function delete($key) {
        unset($_SESSION[$key]);
    }
}