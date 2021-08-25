<?php

namespace App\Entity;

use Framework\Authentication\Authentication;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserProduct extends Model
{
    protected array $fillable = ["user_id", "is_bought", "product_id"];

    public static function getProductArray($array): array
    {
        $products = [];
        foreach ($array as $item) {
            $item = $item->product;
            array_push($products, $item);
        }
        return $products;
    }

    public static function getCartProducts(): array
    {
        $result = UserProduct::where("user_id", "=", Authentication::getId())
            ->where("user_products.is_bought", "=", false)
            ->get();
        return self::getProductArray($result);
    }
    public static function getBoughtProducts(): array
    {
        $result = UserProduct::where("user_id", "=", Authentication::getId())
            ->where("user_products.is_bought", "=", true)
            ->get();
        return self::getProductArray($result);
    }

    public function buyAll($userId): int
    {
        return UserProduct::where("user_id", "=", $userId)->update(["is_bought"=>true]);
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
