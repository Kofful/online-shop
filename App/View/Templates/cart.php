<div class="cart-container">
    <?php
    ob_start();
    foreach ($data as $product) {
        ?>
        <div class="cart-product">
            <div class="d-flex">
                <img class="cart-img" src="../../public/img/<?= $product->getPhoto() ?>" alt="Computer">
                <a href="/product/<?= $product->getId() ?>"><?= $product->getName() ?></a>
            </div>
            <p class="cart-product-price"><?= $product->getPrice() ?><span class="hryvnia-sign">₴</span></p>
        </div>
        <?php
    }
    ob_end_flush() ?>

    <button class="btn btn-success btn-order">Заказать</button>
</div>
