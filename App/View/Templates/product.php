<script src="/public/js/product.js"></script>
<div class="container">
    <p class="product-caption"><?= $data->getName()?></p>
    <div class="body-container">
        <div id="product-img-carousel" class="carousel slide">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="product-img-big" src="../../../public/img/183047178.jpg" alt="First slide">
                </div>
                <div class="carousel-item">
                    <img class="product-img-big" src="../../../public/img/183047178.jpg" alt="Second slide">
                </div>
                <div class="carousel-item">
                    <img class="product-img-big" src="../../../public/img/183047178.jpg" alt="Third slide">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#product-img-carousel"
                    data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#product-img-carousel"
                    data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
        <div class="characteristics-container">
            <p class="product-caption">Цена</p>
            <p class="product-price-big"><?= $data->getPrice()?><span class="hryvnia-sign">₴</span></p>
            <div class="btn-container">
                <button
                        class="btn <?= $data->isBought() ? "btn-secondary" : "btn-success"?> btn-add-to-cart"
                    <?= $data->isBought() ? "disabled" : ""?> onclick="buyProduct(<?= $data->getId()?>)">Добавить в корзину</button>
            </div>
            <p class="product-caption">Характеристики</p>
            <div class="div-table">
                <div class="table-row">
                    <div class="characteristic-name">
                        Название
                    </div>
                    <div class="characteristic-value">
                        <?= $data->getName()?>
                    </div>
                </div>
                <div class="table-row">
                    <div class="characteristic-name">
                        Бренд
                    </div>
                    <div class="characteristic-value">
                        <?= $data->getBrand()?>
                    </div>
                </div>
                <div class="table-row">
                    <div class="characteristic-name">
                        Процессор
                    </div>
                    <div class="characteristic-value">
                        <?= $data->getProcessor()?>
                    </div>
                </div>
                <div class="table-row">
                    <div class="characteristic-name">
                        Видеокарта
                    </div>
                    <div class="characteristic-value">
                        <?= $data->getVideocard()?>
                    </div>
                </div>
                <div class="table-row">
                    <div class="characteristic-name">
                        Объем ОЗУ
                    </div>
                    <div class="characteristic-value">
                        <?= $data->getRam()?> ГБ
                    </div>
                </div>
                <div class="table-row">
                    <div class="characteristic-name">
                        Объем SSD
                    </div>
                    <div class="characteristic-value">
                        <?= $data->getSsdSize() ? "{$data->getSsdSize()} ГБ" : "Нет" ?>
                    </div>
                </div>
                <div class="table-row">
                    <div class="characteristic-name">
                        Объем HDD
                    </div>
                    <div class="characteristic-value">
                        <?= $data->getHddSize() ? "{$data->getHddSize()} ГБ" : "Нет" ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
