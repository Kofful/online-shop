<div class="body-container">
    <form class="sidebar" method="get" action="/catalog">
        <input aria-label="Search" placeholder="Название" class="form-control" type="search" autocomplete="off"
               name="query">
        <label class="sidebar-label">Цена</label>
        <div class="sidebar-group">
            <span class="sidebar-span">От</span><input id="min-price-input" name="min-price" class="form-control"
                                                       type="number">
            <span class="sidebar-span">До</span><input id="max-price-input" name="max-price" class="form-control"
                                                       type="number">
        </div>
        <ul class="list">
            <li class="list-item">
                <span>Бренд</span>
                <ul class="param-list">
                    <li>
                        <input name="brand[]" type="checkbox" aria-label="Brand" class="form-check-input" value="Asus">
                        Asus
                    </li>
                    <li>
                        <input name="brand[]" type="checkbox" aria-label="Brand" class="form-check-input" value="HP">
                        HP
                    </li>
                    <li>
                        <input name="brand[]" type="checkbox" aria-label="Brand" class="form-check-input"
                               value="Lenovo">
                        Lenovo
                    </li>
                </ul>
            </li>
            <li class="list-item">
                <span>Процессор</span>
                <ul class="param-list">
                    <li>
                        <input name="processor[]" type="checkbox" aria-label="Processor" class="form-check-input"
                               value="AMD Ryzen 3">
                        AMD Ryzen 3
                    </li>
                    <li>
                        <input name="processor[]" type="checkbox" aria-label="Processor" class="form-check-input"
                               value="Intel Core i3">
                        Intel Core i3
                    </li>
                    <li>
                        <input name="processor[]" type="checkbox" aria-label="Processor" class="form-check-input"
                               value="Intel Core i8">
                        Intel Core i8
                    </li>
                </ul>
            </li>
            <li class="list-item">
                <span>Объем оперативной памяти</span>
                <ul class="param-list">
                    <li>
                        <input name="ram[]" type="checkbox" aria-label="Ram" class="form-check-input" value="8">
                        8 ГБ
                    </li>
                    <li>
                        <input name="ram[]" type="checkbox" aria-label="Ram" class="form-check-input" value="16">
                        16 ГБ
                    </li>
                    <li>
                        <input name="ram[]" type="checkbox" aria-label="Ram" class="form-check-input" value="24">
                        24 ГБ
                    </li>
                </ul>
            </li>
            <li class="list-item">
                <span>Видеокарта</span>
                <ul class="param-list">
                    <li>
                        <input name="video-card[]" type="checkbox" aria-label="Video card" class="form-check-input"
                               value="GeForce GTX 1050 Ti">
                        GeForce GTX 1050 Ti
                    </li>
                    <li>
                        <input name="video-card[]" type="checkbox" aria-label="Video card" class="form-check-input"
                               value="GeForce GTX 1060">
                        GeForce GTX 1060
                    </li>
                    <li>
                        <input name="video-card[]" type="checkbox" aria-label="Video card" class="form-check-input"
                               value="Radeon RX 580">
                        Radeon RX 580
                    </li>
                </ul>
            </li>
            <li class="list-item">
                <span>Тип накопителя</span>
                <ul class="param-list">
                    <li>
                        <input name="disk-type" type="radio" aria-label="Disk type" class="form-check-input"
                               value="HDD">
                        HDD
                    </li>
                    <li>
                        <input name="disk-type" type="radio" aria-label="Disk type" class="form-check-input"
                               value="SSD">
                        SSD
                    </li>
                    <li>
                        <input name="disk-type" type="radio" aria-label="Disk type" class="form-check-input"
                               value="HDD-SSD">
                        HDD + SSD
                    </li>
                </ul>
            </li>
            <li class="list-item">
                <span>Объем SSD</span>
                <ul class="param-list">
                    <li>
                        <input name="ssd-mem[]" type="checkbox" aria-label="SSD memory" class="form-check-input"
                               value="240">
                        240 ГБ
                    </li>
                    <li>
                        <input name="ssd-mem[]" type="checkbox" aria-label="SSD memory" class="form-check-input"
                               value="512">
                        512 ГБ
                    </li>
                    <li>
                        <input name="ssd-mem[]" type="checkbox" aria-label="SSD memory" class="form-check-input"
                               value="1024">
                        1 ТБ
                    </li>
                </ul>
            </li>
            <li class="list-item">
                <span>Объем HDD</span>
                <ul class="param-list">
                    <li>
                        <input name="hdd-mem[]" type="checkbox" aria-label="HDD memory" class="form-check-input"
                               value="240">
                        240 ГБ
                    </li>
                    <li>
                        <input name="hdd-mem[]" type="checkbox" aria-label="HDD memory" class="form-check-input"
                               value="512">
                        512 ГБ
                    </li>
                    <li>
                        <input name="hdd-mem[]" type="checkbox" aria-label="HDD memory" class="form-check-input"
                               value="1024">
                        1 ТБ
                    </li>
                </ul>
            </li>
        </ul>
        <button class="btn btn-success sidebar-btn" type="submit">Поиск</button>
    </form>
    <div class="products-container">
        <p class="products-label">Каталог товаров</p>
        <div class="product-container">
            <?php
            ob_start();
            foreach ($data["products"] as $product) {
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
        <div class="load-more-container">
            <button class="btn btn-success btn-load-more">Смотреть еще</button>
        </div>
    </div>
</div>