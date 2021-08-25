<template>
  <div class="body-container">
    <catalog-search></catalog-search>
    <catalog-products></catalog-products>
  </div>
</template>

<script>
import CatalogProducts from "./CatalogProducts";
import CatalogSearch from "./CatalogSearch";

export default {
  name: "Catalog",
  components: {CatalogSearch, CatalogProducts},
}
</script>
