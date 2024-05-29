import './bootstrap';

import { createApp } from "vue";
import Navbar from "./layout/Navbar.vue";
import Footer from "./layout/Footer.vue";

import Register from "./pages/Register.vue";
import Login from "./pages/Login.vue";
import Hero from "./partials/Hero.vue";
import LogoGrid from "./partials/LogoGrid.vue";
import FeaturesSection from "./partials/FeaturesSection.vue";
import Steps from "./partials/Steps.vue";
import Contact from "./partials/Contact.vue";


const app = createApp({});

app.component("v-footer", Footer);
app.component("contact", Contact);
app.component("steps", Steps);
app.component("logogrid", LogoGrid);
app.component("features", FeaturesSection);
app.component("hero", Hero);
app.component("login", Login);
app.component("register", Register);
app.component("navbar", Navbar);

app.mount("#app");