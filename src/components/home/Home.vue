<template>
  <about-us></about-us>
  <brand-new-products></brand-new-products>
</template>

<script>
import AboutUs from "./AboutUs";
import BrandNewProducts from "./BrandNewProducts";

export default {
  name: "Home",
  components: {AboutUs, BrandNewProducts}
}
</script>