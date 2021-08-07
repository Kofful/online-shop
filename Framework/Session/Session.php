<?php

namespace Framework\Session;

use Helpers\Exceptions\SessionException;

class Session
{
    public static function start() {
        if(self::sessionExists()) {
            throw new SessionException("Session is already started");
        }
        return session_start();
    }

    public static function destroy() {
        if(!self::sessionExists()) {
            throw new SessionException("Session is not started yet");
        }
        session_destroy();
    }

    public static function setName($name) {
        if(!self::sessionExists()) {
            throw new SessionException("Session is not started yet");
        }
        session_name($name);
    }

    public static function getName() {
        if(!self::sessionExists()) {
            throw new SessionException("Session is not started yet");
        }
        return session_name();
    }

    public static function setId($id) {
        if(!self::sessionExists()) {
            throw new SessionException("Session is not started yet");
        }
        session_id($id);
    }

    public static function getId() {
        if(!self::sessionExists()) {
            throw new SessionException("Session is not started yet");
        }
        return session_id();
    }

    public static function cookieExists() {
        return !empty($_COOKIE);
    }

    public static function sessionExists() {
        return (session_id() != "");
    }

    public static function setSavePath($savePath) {
        if(!self::sessionExists()) {
            throw new SessionException("Session is not started yet");
        }
        return session_save_path($savePath);
    }

    public static function set($key, $value) {
        if(!self::sessionExists()) {
            throw new SessionException("Session is not started yet");
        }
        $_SESSION[$key] = $value;
    }

    public static function get($key) {
        if(!self::sessionExists()) {
            throw new SessionException("Session is not started yet");
        }
        return $_SESSION[$key];
    }

    public static function contains($key) {
        if(!self::sessionExists()) {
            throw new SessionException("Session is not started yet");
        }
        return isset($_SESSION[$key]);
    }

    public static function delete($key) {
        if(!self::sessionExists()) {
            throw new SessionException("Session is not started yet");
        }
        unset($_SESSION[$key]);
    }
}