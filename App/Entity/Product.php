<?php

namespace App\Entity;

class Product
{
    private $id;
    private $name;
    private $price;
    private $photo;
    private $shortDescription;

    public static function getProducts() {
        $result = require(__DIR__ . "/../../storage/products.php");
        $products = [];
        foreach ($result as $item) {
            $product = new Product();
            $product->setId($item["id"]);
            $product->setName($item["name"]);
            $product->setPhoto($item["photo"]);
            $product->setPrice($item["price"]);
            $product->setShortDescription($item["shortDescription"]);
            array_push($products, $product);
        }
        return $products;
    }

    public static function getCartProducts() {
        $result = require(__DIR__ . "/../../storage/cart-products.php");
        $products = [];
        foreach ($result as $item) {
            $product = new Product();
            $product->setId($item["id"]);
            $product->setName($item["name"]);
            $product->setPhoto($item["photo"]);
            $product->setPrice($item["price"]);
            array_push($products, $product);
        }
        return $products;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id): void
    {
        $this->id = $id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name): void
    {
        $this->name = $name;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function setPrice($price): void
    {
        $this->price = $price;
    }

    public function getShortDescription()
    {
        return $this->shortDescription;
    }

    public function setShortDescription($shortDescription): void
    {
        $this->shortDescription = $shortDescription;
    }

    public function getPhoto()
    {
        return $this->photo;
    }

    public function setPhoto($photo): void
    {
        $this->photo = $photo;
    }
}