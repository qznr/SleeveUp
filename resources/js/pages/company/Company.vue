<template>
  <!-- Header Section -->
  <div class="max-w bg-gradient-to-r from-gray-700 to-gray-200 flex items-center justify-center text-white text-center">
    <div class="py-14 font-light">
      <h1 class="text-5xl mb-4 tracking-wider">Explore your options.</h1>
      <p class="text-2xl text-gray-300 tracking-normal">Find, apply or save it to your collection.</p>
    </div>
  </div>

  <!-- Search and Filter Section -->
  <div class="bg-[#151126] py-8 flex flex-col md:flex-row justify-center items-center gap-4">
    <SearchInput class="mt-4 md:mt-0"></SearchInput>
    <div class="flex flex-col md:flex-row gap-4 md:-mt-4">
      <SelectMenu :fieldClasses="'bg-[#5742F5] py-3 px-6 text-white font-semibold border-none w-32'" :options="genderOptions" placeholder="Filter"></SelectMenu>
      <SelectMenu :fieldClasses="'bg-[#5742F5] py-3 px-6 text-white font-semibold border-none w-32'" :options="genderOptions" placeholder="Filter"></SelectMenu>
      <button class="bg-[#5742F5] py-3 px-6 rounded-lg text-white font-semibold">Search</button>
    </div>
  </div>

  <!-- Loading Section -->
  <div v-if="!companyLoaded" class="min-h-screen bg-[#151126] flex justify-center items-center">
    <h1 class="font-semibold text-5xl text-white">Loading...</h1>
  </div>

  <!-- Company Listing Section -->
  <div v-if="companyLoaded" class="bg-[#151126] pb-6">
    <ul class="max-w-7xl mx-auto">
      <li v-for="company in companies" :key="company.id" class="flex flex-col md:flex-row justify-between items-start md:items-end bg-white xl:mx-auto mx-12 mb-6 rounded-xl py-8 px-8">
        <div class="flex flex-col md:flex-row w-full">
          <img :src="company.img" class="size-48 md:size-64">
          <div class="w-full md:w-auto md:ml-4 mt-4 md:mt-0">
            <h1 class="text-[28px] text-[#381D4F] font-semibold mb-2">{{ company.name }}</h1>
            <div class="flex items-center mb-2">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 mr-2 text-[#FF8AAF]">
                <path fill-rule="evenodd" d="m11.54 22.351.07.04.028.016a.76.76 0 0 0 .723 0l.028-.015.071-.041a16.975 16.975 0 0 0 1.144-.742 19.58 19.58 0 0 0 2.683-2.282c1.944-1.99 3.963-4.98 3.963-8.827a8.25 8.25 0 0 0-16.5 0c0 3.846 2.02 6.837 3.963 8.827a19.58 19.58 0 0 0 2.682 2.282 16.975 16.975 0 0 0 1.145.742ZM12 13.5a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" clip-rule="evenodd" />
              </svg>
              <span>{{ company.address }}</span>
            </div>
            <div>
              <p>Deskripsi Singkat Perusahaan</p>
              <p class="text-wrap break-words whitespace-pre-wrap max-w-5xl">{{ company.description }}</p>
            </div>
          </div>
        </div>
        <a :href="`/explore-companies/${company.id}`" class="bg-[#5742F5] py-3 px-12 rounded-lg text-white font-semibold mt-4 md:mt-0">Details</a>
      </li>
    </ul>
    <div class="max-w-7xl mx-auto flex justify-between items-center">
      <button @click="prevPage" :disabled="currentPage === 1" class="bg-[#5742F5] py-2 px-4 rounded-lg text-white font-semibold">Previous</button>
      <span class="text-white">Page {{ currentPage }} of {{ totalPages }}</span>
      <button @click="nextPage" :disabled="currentPage === totalPages" class="bg-[#5742F5] py-2 px-4 rounded-lg text-white font-semibold">Next</button>
    </div>
  </div>
</template>


<script setup>
import { ref, onMounted } from 'vue';
import axios from 'axios';
import SearchInput from '../../components/SearchInput.vue';
import SelectMenu from '../../components/SelectMenu.vue';

const companies = ref([]);
const companyLoaded = ref(false);
const currentPage = ref(1);
const totalPages = ref(0);

const genderOptions = ref([
  { value: 'female', label: 'Female' },
  { value: 'male', label: 'Male' },
]);

const fetchCompanies = async (page = 1) => {
  try {
    const response = await axios.get(`/companies?page=${page}`);
    companies.value = response.data.data;
    currentPage.value = response.data.current_page;
    totalPages.value = response.data.last_page;
    companyLoaded.value = true;
  } catch (error) {
    console.error('Error fetching companies:', error);
  }
};

const nextPage = () => {
  if (currentPage.value < totalPages.value) {
    fetchCompanies(currentPage.value + 1);
  }
};

const prevPage = () => {
  if (currentPage.value > 1) {
    fetchCompanies(currentPage.value - 1);
  }
};

onMounted(() => {
  fetchCompanies();
});
</script>
