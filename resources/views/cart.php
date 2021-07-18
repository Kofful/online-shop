<div class="cart-container">
    <?php
    ob_start();
    foreach ($data as $product) {
        extract($product);
        ?>
        <div class="cart-product">
            <div class="d-flex">
                <img class="cart-img" src="../../public/img/<?= $photo ?>" alt="Computer">
                <a href="/?page=product&id=<?= $id ?>"><?= $name ?></a>
            </div>
            <p class="cart-product-price"><?= $price ?><span class="hryvnia-sign">₴</span></p>
        </div>
        <?php
    }
    ob_end_flush() ?>

    <button class="btn btn-success btn-order">Заказать</button>
</div>
