<?php

namespace Framework\Authentication;

use Framework\Session\Session;
use Helpers\Exceptions\SessionException;

class Authentication
{
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
        $response = false;
        foreach ($users as $user) {
            if ($user["login"] == $login) {
                if ($user["password"] == $password) {
                    Session::start();
                    Session::set("login", $login);
                    $response = true;
                    break;
                }
                //response is already false, so just go out from foreach
                break;
            }
        }
        return $response;
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
