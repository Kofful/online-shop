<div class="company-container">
    <p class="company-name">КОМПЬЮТЕР UA</p>
    <div class="advantages-container">
        <div class="advantage">
            <img class="advan-img" src="../../../public/img/outline_today_white_48dp.png">
            <p class="advan-text">18 лет на рынке</p>
        </div>
        <div class="advantage">
            <img class="advan-img" src="../../../public/img/outline_sports_esports_white_48dp.png">
            <p class="advan-text">Выбор геймеров</p>
        </div>
        <div class="advantage">
            <img class="advan-img" src="../../../public/img/outline_price_check_white_48dp.png">
            <p class="advan-text">Дешевые предложения</p>
        </div>
        <div class="advantage">
            <img class="advan-img" src="../../../public/img/outline_question_answer_white_48dp.png">
            <p class="advan-text">Поддержка 24 / 7</p>
        </div>
    </div>
</div>
<div class="products-container">
    <p class="products-label">Новинки товаров</p>
    <div class="product-container">
        <?php
        ob_start();
        foreach ($data as $product) {
            ?>
            <div class="product-capsule">
                <div class="product">
                    <a href="/product/<?= $product->getId()?>" class="product-link">
                        <img class="product-img" alt="product image" src="../../public/img/<?= $product->getPhoto()?>">
                        <p class="product-name"><?= $product->getName()?></p>
                    </a>
                    <p class="product-price"><?= $product->getPrice()?><span class="hryvnia-sign">₴</span></p>
                    <p class="short-description"><?= $product->getShortDescription() ?></p>
                </div>
            </div>
            <?php
        }
        ob_end_flush()?>
    </div>
    <a class="btn btn-success" href="/catalog">Смотреть еще</a>
</div>