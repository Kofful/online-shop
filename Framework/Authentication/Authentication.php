<?php

namespace Framework\Authentication;

use App\Entity\User;
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
        $response = false;
        if ($user = User::all()
            ->where("phone", "=", $login)
            ->where("password", "=", $password)->first()) {
            Session::start();
            Session::set("login", $login);
            Session::set("id", $user["id"]);
            $response = true;
        }
        return $response;
    }

    public static function getLogin()
    {
        return Session::get("login");
    }

    public static function getId()
    {
        return Session::get("id");
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
