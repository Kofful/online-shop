<template>
  <div id="loader" class="lds-ring"><div></div><div></div><div></div><div></div></div>
</template>

<script>
import {init} from "/public/js/history";

export default {
  name: "History",
  mounted() {
    init();
  }
}
</script>
