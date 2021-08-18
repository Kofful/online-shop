<div class="cart-container">
    <?php
    ob_start();
    if (sizeof($data) === 0) :
        ?>
        <div class="no-products">
            Пока нет покупок
        </div>
        <?php
    else :
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
    <?php endif;?>
</div>
