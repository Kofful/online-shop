<?php

namespace Framework\Authentication;
use Framework\Session\Session;

class Authentication
{

    public static function isAuth()
    {
        return Session::cookieExists();
    }

    public static function auth($login, $password) {
        $users = include(__DIR__ . "/../../storage/users.php");
        foreach($users as $user) {
            if($user["login"] == $login) {
                if($user["password"] == $password) {
                    Session::start();
                    Session::set("login", $login);
                    return true;
                }
                return false;
            }
        }
        return false;
    }

    public static function getLogin() {
        return Session::get("login");
    }

    public static function logOut() {
        setcookie(Session::getName(), "", time() - 3600);
        Session::destroy();
    }
}