import {createApp} from "vue";
import VueCookies from 'vue3-cookies'
import "bootstrap/dist/js/bootstrap.bundle.min";

import HeaderNav from "./components/HeaderNav";
import FooterNav from "./components/FooterNav";
import Home from "./components/home/Home";
import Catalog from "./components/catalog/Catalog";

const app = createApp({});

app.use(VueCookies);

app.component("header-nav", HeaderNav);
app.component("footer-nav", FooterNav);
app.component("home", Home);
app.component("catalog", Catalog);

app.mount("#app");