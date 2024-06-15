<template>
  <div class="max-w bg-gradient-to-r from-gray-700 to-gray-200 flex items-center justify-center text-white text-center">
    <div class="py-14 font-light">
      <h1 class="text-5xl mb-4 tracking-wider">Explore your options.</h1>
      <p class="text-2xl text-gray-300 tracking-normal">Find, apply or save it to your collection.</p>
    </div>
  </div>
  <div class="bg-[151126] py-8 flex justify-center items-center gap-x-4">
    <SearchInput class="mt-4"></SearchInput>
    <div class="flex gap-x-4">
      <SelectMenu :fieldClasses="'bg-[5742F5] py-3 px-6 text-white font-semibold border-none w-32'" :options="genderOptions" placeholder="Filter"></SelectMenu>
      <SelectMenu :fieldClasses="'bg-[5742F5] py-3 px-6 text-white font-semibold border-none w-32'" :options="genderOptions" placeholder="Filter"></SelectMenu>
      <button class="bg-[5742F5] py-3 px-6 rounded-lg text-white font-semibold"> Search </button>
    </div>
  </div>
  <div v-if="!jobsLoaded" class="min-h-screen bg-[151126] flex justify-center items-center">
    <h1 class="font-semibold text-5xl text-white">Loading...</h1>
  </div>
  <div v-if="jobsLoaded" class="bg-[151126] pb-6">
    <ul>
      <li v-for="job in jobs" :key="job.id" class="flex justify-between items-end bg-white max-w-7xl mx-auto mb-6 rounded-xl py-8 px-8">
        <div class="flex">
          <img :src="job.company.img" class="size-64">
          <div class="w-max ml-4">
            <div class="flex justify-start gap-x-4 mb-2">
              <div class="group px-6 py-0.5 bg-[25B4C4] text-gray-100 rounded-xl inline-flex items-center font-semibold capitalize">
                <p>{{ job.is_remote=="yes" ? "Remote" : "Office"}}</p>
              </div>
              <div class="group px-6 py-0.5 bg-[FF8AAF] text-gray-100 rounded-xl inline-flex items-center font-semibold capitalize">
                <p>{{ job.type }} </p>
              </div>
            </div>
            <h1 class="text-[28px] text-[381D4F] font-semibold mb-2">{{ job.profession.name }}</h1>
            <h1 class="text-[22px] text-[381D4F] font-semibold mb-2">{{ job.company.name }}</h1>
            <div class="flex mb-2">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6 mr-2 text-[FF8AAF]">
                <path fill-rule="evenodd" d="m11.54 22.351.07.04.028.016a.76.76 0 0 0 .723 0l.028-.015.071-.041a16.975 16.975 0 0 0 1.144-.742 19.58 19.58 0 0 0 2.683-2.282c1.944-1.99 3.963-4.98 3.963-8.827a8.25 8.25 0 0 0-16.5 0c0 3.846 2.02 6.837 3.963 8.827a19.58 19.58 0 0 0 2.682 2.282 16.975 16.975 0 0 0 1.145.742ZM12 13.5a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" clip-rule="evenodd" />
              </svg>
              <span>{{ job.company.address }}</span>
            </div>
            <div>
              <p>Deskripsi Singkat Pekerjaan</p>
              <p class="text-wrap break-words whitespace-pre-wrap">{{ job.description }}</p>
            </div>
          </div>
        </div>
        <a :href="`/explore-jobs/${job.id}`" class="bg-[#5742F5] py-3 px-12 rounded-lg text-white font-semibold"> Details </a>
      </li>
    </ul>
  </div>
</template>

<script setup>
import { ref, onMounted } from 'vue';
import axios from 'axios';
import SearchInput from '../components/SearchInput.vue';
import SelectMenu from '../components/SelectMenu.vue';

const jobs = ref([]);
const jobsLoaded = ref();

const genderOptions = ref([
  { value: 'female', label: 'Female' },
  { value: 'male', label: 'Male' },
]);

const fetchJobs = async () => {
  try {
    const response = await axios.get('/job_offers');
    jobs.value = response.data;
    jobsLoaded.value = true;
  } catch (error) {
    console.error('Error fetching jobs:', error);
  }
};

onMounted(() => {
  fetchJobs();
});


</script>