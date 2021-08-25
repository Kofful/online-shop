<template>
  <form class="sidebar" method="get" action="/catalog">
    <div class="sidebar-group">
      <label class="me-3" for="sorting">Сортировка</label>
      <select id="sorting" class="form-select" name="sort">
        <option value="standard" :selected="sort === 'standard'">Стандартная</option>
        <option value="price-asc" :selected="sort === 'price-asc'">Мин. цена</option>
        <option value="price-desc" :selected="sort === 'price-desc'">Макс. цена</option>
      </select>
    </div>
    <input aria-label="Search" placeholder="Название" class="form-control" type="search" autocomplete="off"
           name="query" :value="query">
    <label class="sidebar-label">Цена</label>
    <div class="sidebar-group">
      <span class="sidebar-span">От</span><input id="min-price-input" name="min-price" class="form-control"
                                                 type="number" :value="minPrice">
      <span class="sidebar-span">До</span><input id="max-price-input" name="max-price" class="form-control"
                                                 type="number" :value="maxPrice">
    </div>
    <ul class="list">
      <li class="list-item">
        <span>Бренд</span>
        <ul class="param-list">
          <li>
            <input name="brand[]" type="checkbox" aria-label="Brand" class="form-check-input" value="Asus"
            :checked="!!brand.find(item => item === 'Asus')">
            Asus
          </li>
          <li>
            <input name="brand[]" type="checkbox" aria-label="Brand" class="form-check-input" value="HP"
                   :checked="!!brand.find(item => item === 'HP')">
            HP
          </li>
          <li>
            <input name="brand[]" type="checkbox" aria-label="Brand" class="form-check-input" value="Lenovo"
                   :checked="!!brand.find(item => item === 'Lenovo')">
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
                   :checked="!!processor.find(item => item === 'AMD Ryzen 3')">
            AMD Ryzen 3
          </li>
          <li>
            <input name="processor[]" type="checkbox" aria-label="Processor" class="form-check-input"
                   value="Intel Core i3"
                   :checked="!!processor.find(item => item === 'Intel Core i3')">
            Intel Core i3
          </li>
          <li>
            <input name="processor[]" type="checkbox" aria-label="Processor" class="form-check-input"
                   value="Intel Core i8"
                   :checked="!!processor.find(item => item === 'Intel Core i8')">
            Intel Core i8
          </li>
        </ul>
      </li>
      <li class="list-item">
        <span>Объем оперативной памяти</span>
        <ul class="param-list">
          <li>
            <input name="ram[]" type="checkbox" aria-label="Ram" class="form-check-input" value="8"
                   :checked="!!ram.find(item => item === '8')">
            8 ГБ
          </li>
          <li>
            <input name="ram[]" type="checkbox" aria-label="Ram" class="form-check-input" value="16"
                   :checked="!!ram.find(item => item === '16')">
            16 ГБ
          </li>
          <li>
            <input name="ram[]" type="checkbox" aria-label="Ram" class="form-check-input" value="24"
                   :checked="!!ram.find(item => item === '24')">
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
                   :checked="!!videoCard.find(item => item === 'GeForce GTX 1050 Ti')">
            GeForce GTX 1050 Ti
          </li>
          <li>
            <input name="video-card[]" type="checkbox" aria-label="Video card" class="form-check-input"
                   value="GeForce GTX 1060"
                   :checked="!!videoCard.find(item => item === 'GeForce GTX 1060')">
            GeForce GTX 1060
          </li>
          <li>
            <input name="video-card[]" type="checkbox" aria-label="Video card" class="form-check-input"
                   value="Radeon RX 580"
                   :checked="!!videoCard.find(item => item === 'Radeon RX 580')">
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
                   :checked="diskType === 'HDD'">
            HDD
          </li>
          <li>
            <input name="disk-type" type="radio" aria-label="Disk type" class="form-check-input"
                   value="SSD"
                   :checked="diskType === 'SSD'">
            SSD
          </li>
          <li>
            <input name="disk-type" type="radio" aria-label="Disk type" class="form-check-input"
                   value="HDD-SSD"
                   :checked="diskType === 'HDD-SSD'">
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
                   :checked="!!ssdMem.find(item => item === '240')">
            240 ГБ
          </li>
          <li>
            <input name="ssd-mem[]" type="checkbox" aria-label="SSD memory" class="form-check-input"
                   value="512"
                   :checked="!!ssdMem.find(item => item === '512')">
            512 ГБ
          </li>
          <li>
            <input name="ssd-mem[]" type="checkbox" aria-label="SSD memory" class="form-check-input"
                   value="1024"
                   :checked="!!ssdMem.find(item => item === '1024')">
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
                   :checked="!!hddMem.find(item => item === '240')">
            240 ГБ
          </li>
          <li>
            <input name="hdd-mem[]" type="checkbox" aria-label="HDD memory" class="form-check-input"
                   value="512"
                   :checked="!!hddMem.find(item => item === '512')">
            512 ГБ
          </li>
          <li>
            <input name="hdd-mem[]" type="checkbox" aria-label="HDD memory" class="form-check-input"
                   value="1024"
                   :checked="!!hddMem.find(item => item === '1024')">
            1 ТБ
          </li>
        </ul>
      </li>
    </ul>
    <button class="btn btn-success sidebar-btn" type="submit">Поиск</button>
  </form>
</template>

<script>
export default {
  name: "CatalogSearch",
  beforeMount() {
    const query = new URLSearchParams(window.location.search);
    this.sort = query.get("sort");
    this.query = query.get("query");
    this.minPrice = query.get("min-price");
    this.maxPrice = query.get("max-price");
    this.brand = query.getAll("brand[]");
    this.processor = query.getAll("processor[]");
    this.ram = query.getAll("ram[]");
    this.videoCard = query.getAll("video-card[]");
    this.diskType = query.get("disk-type");
    this.ssdMem = query.getAll("ssd-mem[]");
    this.hddMem = query.getAll("hdd-mem[]");
  },
  computed: {}
}
</script>
