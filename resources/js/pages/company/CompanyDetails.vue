<template>
  <div v-if="!company" class="min-h-screen bg-[151126] flex justify-center items-center">
    <h1 class="font-semibold text-5xl text-white">Loading...</h1>
  </div>
  <div v-if="company" class="bg-[151126]">
    <div class="flex max-w-5xl mx-auto py-6 mb-6 rounded-xl ">
        <img :src="company.img" class="rounded-full inline-block lg:w-44 lg:h-44 w-52 h-52">
        <div class="text-white ml-6 mt-3">
          <h1 class="text-[32px] font-semibold">{{ company.name }}</h1>
          <div class="flex mb-2 py-1">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6 mr-2 text-[FF8AAF]">
              <path fill-rule="evenodd" d="m11.54 22.351.07.04.028.016a.76.76 0 0 0 .723 0l.028-.015.071-.041a16.975 16.975 0 0 0 1.144-.742 19.58 19.58 0 0 0 2.683-2.282c1.944-1.99 3.963-4.98 3.963-8.827a8.25 8.25 0 0 0-16.5 0c0 3.846 2.02 6.837 3.963 8.827a19.58 19.58 0 0 0 2.682 2.282 16.975 16.975 0 0 0 1.145.742ZM12 13.5a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" clip-rule="evenodd" />
            </svg>
            <span>{{ company.address }}</span>
          </div>
          <div class="flex mb-2 py-1">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 mr-2 text-[FF8AAF]">
              <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
            </svg>
            <span class="mr-4">{{ company.email }}</span>
            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 mr-2 text-[FF8AAF]">
              <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 0 0 2.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 0 1-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 0 0-1.091-.852H4.5A2.25 2.25 0 0 0 2.25 4.5v2.25Z" />
            </svg>
            <span>{{ company.number }}</span>
          </div>
        </div>
    </div>
    <div class="max-w-7xl mx-6 xl:mx-auto pb-6">
      <h1 class="mb-2 font-semibold text-white text-[28px]">About Company</h1>
      <div class="flex justify-between items-end bg-white border-4 border-[25B4C4] mb-6 rounded-xl py-8 px-8 text-[381D4F]">
        <div class="description" v-html="company.full_description"></div>
      </div>
      <h1 class="font-semibold text-white text-[28px]">Jobs</h1>
      <h2 class="text-white text-[22px] mb-2">There {{ company.job_offers.length <= 1 ? "is"  : "are" }} {{ company.job_offers.length }} {{ company.job_offers.length <= 1 ? "Job"  : "Jobs" }} Available at {{ company.name }}</h2>
      <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-4 mb-6">
        <div v-for="job in company.job_offers" :key="job.id" class="border-4 border-[25B4C4] rounded-xl p-4 bg-white">
          <div class="flex flex-wrap gap-x-2 mb-2 justify-between">
            <div class="group px-6 py-0.5 bg-[#25B4C4] text-gray-100 rounded-xl inline-flex items-center font-semibold capitalize">
              <p>{{ job.is_remote == "yes" ? "Remote" : "Office" }}</p>
            </div>
            <div class="group px-6 py-0.5 bg-[#FF8AAF] text-gray-100 rounded-xl inline-flex items-center font-semibold capitalize">
              <p>{{ job.type }}</p>
            </div>

          </div>
          <h3 class="text-xl text-[381D4F] font-semibold mb-1">{{ getProfessionTitle(job.profession_id) }}</h3>
          <!-- <p class="text-sm text-gray-600 mb-4" v-html="job.description"></p> -->
          <p class="text-[16px] text-[381D4F]  mb-4">{{ new Intl.NumberFormat("id-ID", {style: "currency", currency: "idr"}).format(job.salary) }} / Bulan</p>
          <div class="flex">
            <a :href="`/explore-jobs/${job.id}`" class="bg-[5742F5] text-white font-semibold px-8 py-2 rounded-full ml-auto">View Job</a>
          </div>
        </div>
      </div>
      <button v-if="showMoreButton" class="bg-[5742F5] text-white px-4 py-2 rounded-full">Lihat Selengkapnya</button>
    </div>
  </div>
</template>

<script setup>
import { ref, onMounted, computed } from 'vue';
import axios from 'axios';

const company = ref(null);
const professions = ref({});

const props = defineProps({
  companyId: {
    type: Number,
    required: true,
  },
});


const fetchCompanyDetails = async () => {
  try {
    const response = await axios.get(`/companies/${props.companyId}`);
    company.value = response.data;
    console.log(company.value)
    await fetchProfessions();
  } catch (error) {
    console.error('Error fetching company details:', error);
  }
};

const fetchProfessions = async () => {
  try {
    const professionIds = company.value.job_offers.map(job => job.profession_id);
    const responses = await Promise.all(professionIds.map(id => axios.get(`/professions/${id}`)));
    responses.forEach(response => {
      console.log(response.data)
      professions.value[response.data.id] = response.data.name;
    });
  } catch (error) {
    console.error('Error fetching professions:', error);
  }
};

const getProfessionTitle = (id) => {
  return professions.value[id] || 'Loading..';
};

const showMoreButton = computed(() => {
  return company.value && company.value.job_offers.length > 4;
});

onMounted(() => {
  fetchCompanyDetails();
});
</script>

<style scoped>
::v-deep.description ul {
  list-style-type: disc;
  margin-left: 20px;
  padding: 10px;
}
::v-deep.description ul li {
  margin-bottom: 3px;
}
</style>
