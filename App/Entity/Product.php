<?php

namespace App\Entity;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    private int $id;
    private string $name;
    private float $price;
    private string $photo;
    private string $shortDescription;

    public static function getProducts(): array
    {
        $result = Product::all();
        $products = [];
        foreach ($result as $item) {
            $product = new Product();
            $product->setId($item["id"]);
            $product->setName($item["name"]);
            $product->setPhoto($item["photo"]);
            $product->setPrice($item["price"]);
            $product->setShortDescription($item["short_description"]);
            array_push($products, $product);
        }
        return $products;
    }

    public static function getCartProducts(): array
    {
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

    public function getId(): int
    {
        return $this->id;
    }

    public function setId($id): void
    {
        $this->id = $id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName($name): void
    {
        $this->name = $name;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function setPrice($price): void
    {
        $this->price = $price;
    }

    public function getShortDescription(): string
    {
        return $this->shortDescription;
    }

    public function setShortDescription($shortDescription): void
    {
        $this->shortDescription = $shortDescription;
    }

    public function getPhoto(): string
    {
        return $this->photo;
    }

    public function setPhoto($photo): void
    {
        $this->photo = $photo;
    }
}
