<?php


class Middleware
{
    public static function auth() {
        return Authentication::isAuth();
    }

    public static function unauth() {
        return !Authentication::isAuth();
    }
}