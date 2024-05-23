import './bootstrap';

import { createApp } from "vue";
import Navbar from "./components/Navbar.vue";
import Hero from "./components/Hero.vue";

const app = createApp({});

app.component("Hero", Hero)
app.component("Navbar", Navbar)
app.mount("#app");