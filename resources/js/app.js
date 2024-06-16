import './bootstrap';

import { createApp } from "vue";
import { createPinia } from 'pinia';


import Navbar from "./layout/Navbar.vue";
import Footer from "./layout/Footer.vue";

import Register from "./pages/Register.vue";
import Login from "./pages/Login.vue";
import Company from "./pages/company/Company.vue";
import CompanyDetails from "./pages/company/CompanyDetails.vue"
import Job from "./pages/job/Job.vue";
import JobDetails from "./pages/job/JobDetails.vue";


import ApplicantProfile from "./pages/applicant/Profile.vue";


import Hero from "./partials/Hero.vue";
import LogoGrid from "./partials/LogoGrid.vue";
import FeaturesSection from "./partials/FeaturesSection.vue";
import Steps from "./partials/Steps.vue";
import Contact from "./partials/Contact.vue";

const app = createApp({});

app.component("v-footer", Footer);
app.component("navbar", Navbar);

app.component("login", Login);
app.component("register", Register);
app.component("company", Company);
app.component("company-details", CompanyDetails);
app.component("job", Job);
app.component("job-details", JobDetails);
app.component("applicant-profile", ApplicantProfile);

app.component("hero", Hero);
app.component("logogrid", LogoGrid);
app.component("features", FeaturesSection);
app.component("steps", Steps);
app.component("contact", Contact);

const pinia = createPinia();

app.use(pinia);
app.config.globalProperties.$axios = axios;

app.mount("#app");