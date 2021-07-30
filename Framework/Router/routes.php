<?php
use Framework\Router\Router;

Router::get("/", "HomeController");
Router::get("/catalog", "CatalogController");
Router::get("/cart", "CartController");
Router::get("/product/([0-9]+)", "ProductController");
Router::get("/login", "LoginController", "unauth");
Router::get("/register", "RegisterController", "unauth");
Router::get("/logout", "LoginController@logout", "auth");

Router::post("/login", "LoginController@login", "unauth");
Router::post("/register", "RegisterController@register", "unauth");
