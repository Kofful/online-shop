<?php
use Framework\Router\Router;

Router::get("/", "HomeController");
Router::get("/catalog", "CatalogController");
Router::get("/cart", "CartController", ["name"=>"auth", "params"=>["statement"=>true]]);
Router::get("/history", "HistoryController", ["name"=>"auth", "params"=>["statement"=>true]]);
Router::get("/product/([0-9]+)", "ProductController");
Router::get("/login", "LoginController", ["name"=>"auth","params"=>["statement"=>false]]);
Router::get("/register", "RegisterController", ["name"=>"auth","params"=>["statement"=>false]]);
Router::get("/logout", "LoginController@logout", ["name"=>"auth","params"=>["statement"=>true]]);

Router::post("/login", "LoginController@login", ["name"=>"auth","params"=>["statement"=>false]]);
Router::post("/register", "RegisterController@register", ["name"=>"auth","params"=>["statement"=>false]]);
Router::post("/buycart", "CartController@buyAll", ["name"=>"auth","params"=>["statement"=>true]]);
Router::post("/product/([0-9]+)", "ProductController@buyProduct", ["name"=>"auth","params"=>["statement"=>true]]);

Router::get("/products", "ProductController@getProducts");
Router::get("/cartproducts", "CartController@getProducts", ["name"=>"auth", "params"=>["statement"=>true]]);
