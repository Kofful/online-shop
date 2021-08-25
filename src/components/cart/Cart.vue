<template>
  <div id="loader" class="lds-ring"><div></div><div></div><div></div><div></div></div>
</template>

<script>
import {init} from "/public/js/cart";

export default {
  name: "Cart",
  mounted() {
    init();
  }
}
</script>
