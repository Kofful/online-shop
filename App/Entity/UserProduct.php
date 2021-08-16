<?php

namespace App\Entity;

use Framework\Authentication\Authentication;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserProduct extends Model
{

    public static function getCartProducts(): array
    {
        $result = UserProduct::where("user_id", "=", Authentication::getId())->get();
        $products = [];
        foreach ($result as $item) {
            $item = $item->product;
            $product = new Product();
            $product->setId($item["id"]);
            $product->setName($item["name"]);
            $product->setPhoto($item["photo"]);
            $product->setPrice($item["price"]);
            array_push($products, $product);
        }
        return $products;
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
