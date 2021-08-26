import {createApp} from "vue";
import VueCookies from 'vue3-cookies'

import HeaderNav from "./components/HeaderNav";
import FooterNav from "./components/FooterNav";
import Home from "./components/home/Home";
import Catalog from "./components/catalog/Catalog";
import Cart from "./components/cart/Cart";
import History from "./components/history/History";
import Login from "./components/login/Login";
import Register from "./components/register/Register";
import Product from "./components/product/Product";

const app = createApp({});

app.use(VueCookies);

app.component("header-nav", HeaderNav);
app.component("footer-nav", FooterNav);
app.component("home", Home);
app.component("catalog", Catalog);
app.component("cart", Cart);
app.component("history", History);
app.component("login", Login);
app.component("register", Register);
app.component("product", Product);

app.mount("#app");
