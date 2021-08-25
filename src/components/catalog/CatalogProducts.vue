<template>
  <div class="products-container">
    <p class="products-label">Каталог товаров</p>
    <div id="loader" class="lds-ring"><div></div><div></div><div></div><div></div></div>
  </div>
</template>

<script>
import {init} from "/public/js/catalog.js";

export default {
  name: "CatalogProducts",
  mounted() {
    init();
  }
}
</script>
