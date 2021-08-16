<?php

namespace App\Entity;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    private int $id;
    private string $name;
    private float $price;
    private string $photo;
    private string $shortDescription;

    public static function arraysToObjects($array): array
    {
        $products = [];
        foreach ($array as $item) {
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

    public static function getProducts(): array
    {
        $result = Product::all();
        return self::arraysToObjects($result);
    }

    public static function getMainProducts(): array
    {
        $result = Product::inRandomOrder()->limit(4)->get();
        return self::arraysToObjects($result);
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

    public function listing(): HasMany
    {
        return $this->hasMany(UserProduct::class);
    }
}
