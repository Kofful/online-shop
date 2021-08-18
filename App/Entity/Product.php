<?php

namespace App\Entity;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Pagination\Paginator;

class Product extends Model
{
    private int $id;
    private string $name;
    private float $price;
    private string $photo;
    private string $shortDescription;
    private string $brand;
    private string $processor;
    private int $ram;
    private string $videocard;
    private int $hddSize;
    private int $ssdSize;
    private bool $isBought;

    protected array $fillable = ["is_bought", "name", "price", "photo", "short_description",
        "brand", "processor", "ram", "videocard", "hdd_size", "ssd_size"];

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

    public static function getProducts($params): \Illuminate\Contracts\Pagination\Paginator
    {
        $result = Product::query()->where("is_bought", "=", "false");
        //print_r($result);
        if (isset($params["query"]) && strlen($params["query"]) > 0) {
            $result = $result->where("name", "like", "%{$params["query"]}%");
        }
        if (isset($params["brand"])) {
            $result = $result->whereIn("brand", $params["brand"]);
        }
        if (isset($params["processor"])) {
            $result = $result->where("processor", "like", "%{$params["processor"][0]}%");
            for ($i = 1; $i < sizeof($params["processor"]); $i++) {
                $result = $result->orWhere("processor", "like", "%{$params["processor"][$i]}%");
            }
        }
        if (isset($params["ram"])) {
            $result = $result->whereIn("ram", $params["ram"]);
        }
        if (isset($params["video-card"])) {
            $result = $result->whereIn("videocard", $params["video-card"]);
        }
        if (isset($params["disk-type"])) {
            switch ($params["disk-type"]) {
                case "HDD":
                    $result = $result->where("ssd_size", "=", 0);
                    break;
                case "SSD":
                    $result = $result->where("hdd_size", "=", 0);
                    break;
                default:
                    $result = $result->where("hdd_size", ">", 0)
                        ->where("ssd_size", ">", 0);
            }
        }
        if (isset($params["ssd-mem"])) {
            $result = $result->whereIn("ssd_size", $params["ssd-mem"]);
        }
        if (isset($params["hdd-mem"])) {
            $result = $result->whereIn("hdd_size", $params["hdd-mem"]);
        }
        if (isset($params["min-price"]) && strlen($params["min-price"]) > 0) {
            $result = $result->where("price", ">=", $params["min-price"]);
        }
        if (isset($params["max-price"]) && strlen($params["max-price"]) > 0) {
            $result = $result->where("price", "<=", $params["max-price"]);
        }
        if (isset($params["sort"])) {
            switch ($params["sort"]) {
                case "price-asc":
                    $result = $result->orderBy("price", "ASC");
                    break;
                case "price-desc":
                    $result = $result->orderBy("price", "DESC");
            }
        }
        ob_end_flush();
        //one element on page was chosen only for testing pages
        return $result->simplePaginate(1, ["*"], "page", $params["page"] ?? 1);
    }

    public static function getProductById($id): Product
    {
        $item = Product::find($id);
        $product = new Product();
        $product->setId($item["id"]);
        $product->setName($item["name"]);
        $product->setPhoto($item["photo"]);
        $product->setPrice($item["price"]);
        $product->setShortDescription($item["short_description"]);
        $product->setIsBought($item["is_bought"]);
        $product->setBrand($item["brand"]);
        $product->setProcessor($item["processor"]);
        $product->setRam($item["ram"]);
        $product->setVideocard($item["ram"]);
        $product->setHddSize($item["hdd_size"]);
        $product->setSsdSize($item["ssd_size"]);

        return $product;
    }

    public static function buyProduct($id)
    {
        Product::find($id)->update(["is_bought" => true]);
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

    /**
     * @return string
     */
    public function getBrand(): string
    {
        return $this->brand;
    }

    /**
     * @param string $brand
     */
    public function setBrand(string $brand): void
    {
        $this->brand = $brand;
    }

    /**
     * @return string
     */
    public function getProcessor(): string
    {
        return $this->processor;
    }

    /**
     * @param string $processor
     */
    public function setProcessor(string $processor): void
    {
        $this->processor = $processor;
    }

    /**
     * @return int
     */
    public function getRam(): int
    {
        return $this->ram;
    }

    /**
     * @param int $ram
     */
    public function setRam(int $ram): void
    {
        $this->ram = $ram;
    }

    /**
     * @return string
     */
    public function getVideocard(): string
    {
        return $this->videocard;
    }

    /**
     * @param string $videocard
     */
    public function setVideocard(string $videocard): void
    {
        $this->videocard = $videocard;
    }

    /**
     * @return int
     */
    public function getHddSize(): int
    {
        return $this->hddSize;
    }

    /**
     * @param int $hddSize
     */
    public function setHddSize(int $hddSize): void
    {
        $this->hddSize = $hddSize;
    }

    /**
     * @return int
     */
    public function getSsdSize(): int
    {
        return $this->ssdSize;
    }

    /**
     * @param int $ssdSize
     */
    public function setSsdSize(int $ssdSize): void
    {
        $this->ssdSize = $ssdSize;
    }

    /**
     * @return bool
     */
    public function isBought(): bool
    {
        return $this->isBought;
    }

    /**
     * @param bool $isBought
     */
    public function setIsBought(bool $isBought): void
    {
        $this->isBought = $isBought;
    }
}
