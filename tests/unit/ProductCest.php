<?php

use App\Entity\Product;

class ProductCest
{
    public function _before(UnitTester $I)
    {
    }

    // tests
    public function tryToTestGetProducts(UnitTester $I)
    {
        $products = Product::getProducts();
        $I->assertNotNull($products);
    }

    public function tryToTestGetCartProducts(UnitTester $I)
    {
        $products = Product::getCartProducts();
        $I->assertNotNull($products);
    }
}
