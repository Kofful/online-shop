<div class="body-container">
    <form class="sidebar" method="get" action="/catalog">
        <div class="sidebar-group">
            <label class="me-3" for="sorting">Сортировка</label>
            <select id="sorting" class="form-select" name="sort">
                <option value="standard"
                    <?= $data["params"]["sort"] === "standard" ? "selected" : ""?>>Стандартная</option>
                <option value="price-asc"
                    <?= $data["params"]["sort"] === "price-asc" ? "selected" : ""?>>Мин. цена</option>
                <option value="price-desc"
                    <?= $data["params"]["sort"] === "price-desc" ? "selected" : ""?>>Макс. цена</option>
            </select>
        </div>
        <input aria-label="Search" placeholder="Название" class="form-control" type="search" autocomplete="off"
               name="query" value="<?= $data["params"]["query"] ?? "" ?>">
        <label class="sidebar-label">Цена</label>
        <div class="sidebar-group">
            <span class="sidebar-span">От</span><input id="min-price-input" name="min-price" class="form-control"
                                                       type="number" value="<?= $data["params"]["min-price"] ?? "" ?>">
            <span class="sidebar-span">До</span><input id="max-price-input" name="max-price" class="form-control"
                                                       type="number" value="<?= $data["params"]["max-price"] ?? "" ?>">
        </div>
        <ul class="list">
            <li class="list-item">
                <span>Бренд</span>
                <ul class="param-list">
                    <li>
                        <input name="brand[]" type="checkbox" aria-label="Brand" class="form-check-input" value="Asus"
                               <?= in_array("Asus", $data["params"]["brand"]) ? "checked" : "" ?>>
                        Asus
                    </li>
                    <li>
                        <input name="brand[]" type="checkbox" aria-label="Brand" class="form-check-input" value="HP"
                            <?= in_array("HP", $data["params"]["brand"]) ? "checked" : "" ?>>
                        HP
                    </li>
                    <li>
                        <input name="brand[]" type="checkbox" aria-label="Brand" class="form-check-input"
                               value="Lenovo" <?= in_array("Lenovo", $data["params"]["brand"]) ? "checked" : "" ?>>
                        Lenovo
                    </li>
                </ul>
            </li>
            <li class="list-item">
                <span>Процессор</span>
                <ul class="param-list">
                    <li>
                        <input name="processor[]" type="checkbox" aria-label="Processor" class="form-check-input"
                               value="AMD Ryzen 3"
                            <?= in_array("AMD Ryzen 3", $data["params"]["processor"]) ? "checked" : "" ?>>
                        AMD Ryzen 3
                    </li>
                    <li>
                        <input name="processor[]" type="checkbox" aria-label="Processor" class="form-check-input"
                               value="Intel Core i3"
                            <?= in_array("Intel Core i3", $data["params"]["processor"]) ? "checked" : "" ?>>
                        Intel Core i3
                    </li>
                    <li>
                        <input name="processor[]" type="checkbox" aria-label="Processor" class="form-check-input"
                               value="Intel Core i8"
                            <?= in_array("Intel Core i8", $data["params"]["processor"]) ? "checked" : "" ?>>
                        Intel Core i8
                    </li>
                </ul>
            </li>
            <li class="list-item">
                <span>Объем оперативной памяти</span>
                <ul class="param-list">
                    <li>
                        <input name="ram[]" type="checkbox" aria-label="Ram" class="form-check-input" value="8"
                            <?= isset($data["params"]["ram"])
                                && in_array("8", $data["params"]["ram"]) ? "checked" : ""?>>
                        8 ГБ
                    </li>
                    <li>
                        <input name="ram[]" type="checkbox" aria-label="Ram" class="form-check-input" value="16"
                            <?= isset($data["params"]["ram"])
                            && in_array("16", $data["params"]["ram"]) ? "checked" : "" ?>>
                        16 ГБ
                    </li>
                    <li>
                        <input name="ram[]" type="checkbox" aria-label="Ram" class="form-check-input" value="24"
                            <?= isset($data["params"]["ram"])
                            && in_array("24", $data["params"]["ram"]) ? "checked" : "" ?>>
                        24 ГБ
                    </li>
                </ul>
            </li>
            <li class="list-item">
                <span>Видеокарта</span>
                <ul class="param-list">
                    <li>
                        <input name="video-card[]" type="checkbox" aria-label="Video card" class="form-check-input"
                               value="GeForce GTX 1050 Ti"
                            <?= isset($data["params"]["video-card"])
                            && in_array("GeForce GTX 1050 Ti", $data["params"]["video-card"]) ? "checked" : "" ?>>
                        GeForce GTX 1050 Ti
                    </li>
                    <li>
                        <input name="video-card[]" type="checkbox" aria-label="Video card" class="form-check-input"
                               value="GeForce GTX 1060"
                            <?= isset($data["params"]["video-card"])
                            && in_array("GeForce GTX 1060", $data["params"]["video-card"]) ? "checked" : "" ?>>
                        GeForce GTX 1060
                    </li>
                    <li>
                        <input name="video-card[]" type="checkbox" aria-label="Video card" class="form-check-input"
                               value="Radeon RX 580"
                            <?= isset($data["params"]["video-card"])
                            && in_array("Radeon RX 580", $data["params"]["video-card"]) ? "checked" : "" ?>>
                        Radeon RX 580
                    </li>
                </ul>
            </li>
            <li class="list-item">
                <span>Тип накопителя</span>
                <ul class="param-list">
                    <li>
                        <input name="disk-type" type="radio" aria-label="Disk type" class="form-check-input"
                               value="HDD"
                            <?= ($data["params"]["disk-type"] ?? "") === "HDD" ? "checked" : "" ?>>
                        HDD
                    </li>
                    <li>
                        <input name="disk-type" type="radio" aria-label="Disk type" class="form-check-input"
                               value="SSD"
                            <?= ($data["params"]["disk-type"] ?? "") === "SSD" ? "checked" : "" ?>>
                        SSD
                    </li>
                    <li>
                        <input name="disk-type" type="radio" aria-label="Disk type" class="form-check-input"
                               value="HDD-SSD"
                            <?= ($data["params"]["disk-type"] ?? "") === "HDD-SSD" ? "checked" : "" ?>>
                        HDD + SSD
                    </li>
                </ul>
            </li>
            <li class="list-item">
                <span>Объем SSD</span>
                <ul class="param-list">
                    <li>
                        <input name="ssd-mem[]" type="checkbox" aria-label="SSD memory" class="form-check-input"
                               value="240"
                            <?= isset($data["params"]["ssd-mem"])
                            && in_array(240, $data["params"]["ssd-mem"]) ? "checked" : "" ?>>
                        240 ГБ
                    </li>
                    <li>
                        <input name="ssd-mem[]" type="checkbox" aria-label="SSD memory" class="form-check-input"
                               value="512"
                            <?= isset($data["params"]["ssd-mem"])
                            && in_array(512, $data["params"]["ssd-mem"]) ? "checked" : "" ?>>
                        512 ГБ
                    </li>
                    <li>
                        <input name="ssd-mem[]" type="checkbox" aria-label="SSD memory" class="form-check-input"
                               value="1024"
                            <?= isset($data["params"]["ssd-mem"])
                            && in_array(1024, $data["params"]["ssd-mem"]) ? "checked" : "" ?>>
                        1 ТБ
                    </li>
                </ul>
            </li>
            <li class="list-item">
                <span>Объем HDD</span>
                <ul class="param-list">
                    <li>
                        <input name="hdd-mem[]" type="checkbox" aria-label="HDD memory" class="form-check-input"
                               value="240"
                            <?= isset($data["params"]["hdd-mem"])
                            && in_array(240, $data["params"]["hdd-mem"]) ? "checked" : "" ?>>
                        240 ГБ
                    </li>
                    <li>
                        <input name="hdd-mem[]" type="checkbox" aria-label="HDD memory" class="form-check-input"
                               value="512"
                            <?= isset($data["params"]["hdd-mem"])
                            && in_array(512, $data["params"]["hdd-mem"]) ? "checked" : "" ?>>
                        512 ГБ
                    </li>
                    <li>
                        <input name="hdd-mem[]" type="checkbox" aria-label="HDD memory" class="form-check-input"
                               value="1024"
                            <?= isset($data["params"]["hdd-mem"])
                            && in_array(1024, $data["params"]["hdd-mem"]) ? "checked" : "" ?>>
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