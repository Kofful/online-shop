<?php
Router::get("/", "HomeController");
Router::get("/catalog", "CatalogController");
Router::get("/cart", "CartController");
Router::get("/product/([0-9]+)", "ProductController");
Router::get("/login", "LoginController");
Router::get("/register", "RegisterController");
