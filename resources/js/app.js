import './bootstrap';

import { createApp } from "vue";
import Navbar from "./components/Navbar.vue";
import Hero from "./components/Hero.vue";
import LogoGrid from "./components/LogoGrid.vue";
import FeaturesSection from "./components/FeaturesSection.vue";
import Steps from "./components/Steps.vue";
import Contact from "./components/Contact.vue";
import Footer from "./components/Footer.vue";

const app = createApp({});

app.component("v-footer", Footer);
app.component("contact", Contact);
app.component("steps", Steps);
app.component("logogrid", LogoGrid);
app.component("features", FeaturesSection);
app.component("hero", Hero);
app.component("navbar", Navbar);

app.mount("#app");