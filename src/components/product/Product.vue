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
    product: {}
  }),
  mounted() {
    let self = this;
    getProductInfo().then(product => {
      self.product.id = product.id;
      self.product.name = product.name;
      self.product.isBought = product.is_bought;
      self.product.photo = product.photo;
      self.product.price = product.price;
      self.product.processor = product.processor;
      self.product.ram = product.ram;
      self.product.videoCard = product.videocard;
      self.product.ssdSize = product.ssd_size;
      self.product.hddSize = product.hdd_size;
      self.product.brand = product.brand;
    });
  },
  methods: {
    buy(id) {
      buyProduct(id);
    }
  },
  computed: {
    id() {
      return this.product.id;
    },
    name() {
      return this.product.name;
    },
    isBought() {
      return this.product.isBought;
    },
    photo() {
      return this.product.photo;
    },
    price() {
      return this.product.price;
    },
    processor() {
      return this.product.processor;
    },
    videoCard() {
      return this.product.videoCard;
    },
    ram() {
      return this.product.ram;
    },
    ssdSize() {
      return this.product.ssdSize;
    },
    hddSize() {
      return this.product.hddSize;
    },
    brand() {
      return this.product.brand;
    }
  }
}
</script>
