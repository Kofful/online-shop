<?php

namespace Framework\Authentication;

use Framework\Session\Session;
use Helpers\Exceptions\SessionException;

class Authentication
{

    /**
     * @throws SessionException
     */
    public static function isAuth(): bool
    {
        return Session::cookieExists();
    }

    /**
     * @throws SessionException
     */
    public static function auth($login, $password): bool
    {
        $users = include(__DIR__ . "/../../storage/users.php");
        foreach ($users as $user) {
            if ($user["login"] == $login) {
                if ($user["password"] == $password) {
                    Session::start();
                    Session::set("login", $login);
                    return true;
                }
                return false;
            }
        }
        return false;
    }

    public static function getLogin()
    {
        return Session::get("login");
    }

    /**
     * @throws SessionException
     */
    public static function logOut()
    {
        setcookie(Session::getName(), "", time() - 3600);
        Session::destroy();
    }
}
