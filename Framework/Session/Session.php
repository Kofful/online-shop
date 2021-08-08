<?php

namespace Framework\Session;

use Helpers\Exceptions\SessionException;

class Session
{
    /**
     * @throws SessionException
     */
    public static function start(): bool
    {
        if (self::sessionExists()) {
            throw new SessionException("Session is already started");
        }
        return session_start();
    }

    /**
     * @throws SessionException
     */
    public static function destroy()
    {
        if (!self::sessionExists()) {
            throw new SessionException("Session is not started yet");
        }
        session_destroy();
    }

    /**
     * @throws SessionException
     */
    public static function setName($name)
    {
        if (!self::sessionExists()) {
            throw new SessionException("Session is not started yet");
        }
        session_name($name);
    }

    /**
     * @throws SessionException
     */
    public static function getName()
    {
        if (!self::sessionExists()) {
            throw new SessionException("Session is not started yet");
        }
        return session_name();
    }

    /**
     * @throws SessionException
     */
    public static function setId($id)
    {
        if (!self::sessionExists()) {
            throw new SessionException("Session is not started yet");
        }
        session_id($id);
    }

    /**
     * @throws SessionException
     */
    public static function getId()
    {
        if (!self::sessionExists()) {
            throw new SessionException("Session is not started yet");
        }
        return session_id();
    }

    /**
     * @throws SessionException
     */
    public static function cookieExists(): bool
    {
        if (!self::sessionExists()) {
            throw new SessionException("Session is not started yet");
        }
        return !empty($_COOKIE);
    }

    public static function sessionExists(): bool
    {
        return (session_id() != "");
    }

    /**
     * @throws SessionException
     */
    public static function setSavePath($savePath)
    {
        if (!self::sessionExists()) {
            throw new SessionException("Session is not started yet");
        }
        return session_save_path($savePath);
    }

    /**
     * @throws SessionException
     */
    public static function set($key, $value)
    {
        if (!self::sessionExists()) {
            throw new SessionException("Session is not started yet");
        }
        $_SESSION[$key] = $value;
    }

    /**
     * @throws SessionException
     */
    public static function get($key)
    {
        if (!self::sessionExists()) {
            throw new SessionException("Session is not started yet");
        }
        return $_SESSION[$key];
    }

    /**
     * @throws SessionException
     */
    public static function contains($key): bool
    {
        if (!self::sessionExists()) {
            throw new SessionException("Session is not started yet");
        }
        return isset($_SESSION[$key]);
    }

    /**
     * @throws SessionException
     */
    public static function delete($key)
    {
        if (!self::sessionExists()) {
            throw new SessionException("Session is not started yet");
        }
        unset($_SESSION[$key]);
    }
}
