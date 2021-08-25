<template>
  <div class="products-container">
    <p class="products-label">Новинки товаров</p>
    <div id="loader" class="lds-ring"><div></div><div></div><div></div><div></div></div>
    <a class="btn btn-success" href="/catalog">Смотреть еще</a>
  </div>
</template>

<script>
import {init} from "/public/js/home";

export default {
  name: "BrandNewProducts",
  mounted() {
    init();
  }
}
</script>