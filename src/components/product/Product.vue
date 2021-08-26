<template>
  <div class="container">
    <p class="product-caption">{{ name }}</p>
    <div class="body-container">
      <div id="product-img-carousel" class="carousel slide">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img class="product-img-big" :src="`/public/img/${photo}`" alt="First slide">
          </div>
          <div class="carousel-item">
            <img class="product-img-big" :src="`/public/img/${photo}`" alt="Second slide">
          </div>
          <div class="carousel-item">
            <img class="product-img-big" :src="`/public/img/${photo}`" alt="Third slide">
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
        <p class="product-price-big">{{price}}<span class="hryvnia-sign">₴</span></p>
        <div class="btn-container">
          <button v-if="isBought"
                  class="btn btn-secondary btn-add-to-cart"
                  disabled>Нет в наличии
          </button>
          <button v-else
                  class="btn btn-success btn-add-to-cart"
                  @click="buy(id)">Добавить в корзину
          </button>
        </div>
        <p class="product-caption">Характеристики</p>
        <div class="div-table">
          <div class="table-row">
            <div class="characteristic-name">
              Название
            </div>
            <div class="characteristic-value">
              {{ name }}
            </div>
          </div>
          <div class="table-row">
            <div class="characteristic-name">
              Бренд
            </div>
            <div class="characteristic-value">
              {{ brand }}
            </div>
          </div>
          <div class="table-row">
            <div class="characteristic-name">
              Процессор
            </div>
            <div class="characteristic-value">
              {{ processor }}
            </div>
          </div>
          <div class="table-row">
            <div class="characteristic-name">
              Видеокарта
            </div>
            <div class="characteristic-value">
              {{ videoCard }}
            </div>
          </div>
          <div class="table-row">
            <div class="characteristic-name">
              Объем ОЗУ
            </div>
            <div class="characteristic-value">
              {{ ram }} ГБ
            </div>
          </div>
          <div class="table-row">
            <div class="characteristic-name">
              Объем SSD
            </div>
            <div class="characteristic-value">
              {{ !!ssdSize ? `${ssdSize} ГБ` : "Нет" }}
            </div>
          </div>
          <div class="table-row">
            <div class="characteristic-name">
              Объем HDD
            </div>
            <div class="characteristic-value">
              {{ !!ssdSize ? `${ssdSize} ГБ` : "Нет" }}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import {buyProduct, getProductInfo} from "/public/js/product";

export default {
  name: "Product",
  data: () => ({
    id: null,
    name: "",
    isBought: true,
    photo: "",
    price: 0,
    processor: "",
    ram: 0,
    videoCard: "",
    ssdSize: 0,
    hddSize: 0,
    brand: ""
  }),
  mounted() {
    getProductInfo().then(product => {
      this.id = product.id;
      this.name = product.name;
      this.isBought = product.is_bought;
      this.photo = product.photo;
      this.price = product.price;
      this.processor = product.processor;
      this.ram = product.ram;
      this.videoCard = product.videocard;
      this.ssdSize = product.ssd_size;
      this.hddSize = product.hdd_size;
      this.brand = product.brand;
    });
  },
  methods: {
    buy(id) {
      buyProduct(id);
    }
  }
}
</script>
