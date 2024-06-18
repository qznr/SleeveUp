<template>
  <div>
    <!-- Header Section -->
    <div class="max-w bg-gradient-to-r from-gray-700 to-gray-200 flex items-center justify-center text-white text-center">
      <div class="py-14 font-light">
        <h1 class="text-3xl md:text-5xl mb-4 tracking-wider">Explore your options.</h1>
        <p class="text-xl md:text-2xl text-gray-300 tracking-normal">Find, apply, or save it to your collection.</p>
      </div>
    </div>

    <!-- Search and Filter Section -->
    <div class="bg-[#151126] py-8 flex flex-col md:flex-row justify-center items-center gap-4">
      <SearchInput  v-model="searchQuery" class="mt-4 md:mt-0" @dblclick="resetFilters"></SearchInput>
      <div class="flex md:flex-row gap-4 -mt-4">
        <SelectMenu v-model="selectedRemote" :fieldClasses="'bg-[#5742F5] py-3 px-3 text-white font-semibold border-none w-full md:w-32 capitalize'" :options="isRemoteOptions" placeholder="From"></SelectMenu>
        <SelectMenu v-model="selectedType" :fieldClasses="'bg-[#5742F5] py-3 px-3 text-white font-semibold border-none w-full md:w-32 capitalize'" :options="typeOptions" placeholder="Type"></SelectMenu>
        <!-- <button @click="fetchJobs" class="bg-[#5742F5] py-3 px-6 rounded-lg text-white font-semibold w-full md:w-auto">Search</button> -->
      </div>
    </div>

    <!-- Loading Section -->
    <Loading :loaded="!jobsLoaded"></Loading>

    <!-- Error Section -->
    <div v-if="error" class="min-h-screen bg-[#151126] flex justify-center items-center">
      <h1 class="font-semibold text-5xl text-red-500">{{ error }}</h1>
    </div>

    <!-- Empty Section -->
    <div v-if="jobsLoaded && jobs.length === 0" class="min-h-screen bg-[#151126] flex justify-center items-center">
      <div class="flex items-center bg-white p-6 gap-x-4 rounded-lg">
        <h1 class="font-semibold text-5xl text-[381D4F]">No Jobs found</h1>
      </div>
    </div>


    <!-- Job Listings Section -->
    <div v-if="jobsLoaded" class="bg-[#151126] pb-6">
      <ul class="max-w-7xl mx-auto px-4 md:px-0">
        <li v-for="job in jobs" :key="job.id" class="flex flex-col md:flex-row justify-between items-start md:items-end bg-white mb-6 rounded-xl p-4 md:p-8">
          <div class="flex flex-col md:flex-row w-full">
            <img :src="job.company.img" class="size-48 md:size-64">
            <div class="w-full md:w-auto md:ml-4 mt-4 md:mt-0">
              <div class="flex flex-wrap gap-2 mb-2">
                <div class="group px-6 py-0.5 bg-[#25B4C4] text-gray-100 rounded-xl inline-flex items-center font-semibold capitalize">
                  <p>{{ job.is_remote == "yes" ? "Remote" : "Office" }}</p>
                </div>
                <div class="group px-6 py-0.5 bg-[#FF8AAF] text-gray-100 rounded-xl inline-flex items-center font-semibold capitalize">
                  <p>{{ job.type }}</p>
                </div>
              </div>
              <h1 class="text-xl md:text-2xl text-[#381D4F] font-semibold mb-2">{{ job.profession.name }}</h1>
              <h1 class="text-lg md:text-xl text-[#381D4F] font-semibold mb-2">{{ job.company.name }}</h1>
              <div class="flex mb-2">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 mr-2 text-[#FF8AAF]">
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
          <a :href="`/explore-jobs/${job.id}`" class="bg-[#5742F5] py-3 px-12 rounded-lg text-white font-semibold mt-4 md:mt-0">Details</a>
        </li>
      </ul>
      <div class="max-w-7xl mx-auto px-4 md:px-0 flex justify-between items-center">
        <button @click="prevPage" :disabled="currentPage === 1 || isLoading" class="bg-[#5742F5] py-2 px-4 rounded-lg text-white font-semibold">Previous</button>
        <span class="text-white">Page {{ currentPage }} of {{ totalPages }}</span>
        <button @click="nextPage" :disabled="currentPage === totalPages || isLoading" class="bg-[#5742F5] py-2 px-4 rounded-lg text-white font-semibold">Next</button>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref, onMounted, watch } from 'vue';
import axios from 'axios';
import SearchInput from '../../components/SearchInput.vue';
import SelectMenu from '../../components/SelectMenu.vue';
import debounce from 'lodash/debounce';
import Loading from '../../components/Loading.vue';

// Reactive references to hold the jobs data, loading state, and pagination details
const jobs = ref([]);
const jobsLoaded = ref(false);
const currentPage = ref(1);
const totalPages = ref(0);
const isLoading = ref(false);
const error = ref(null);

// Search and filter state
const searchQuery = ref('');
const selectedRemote = ref('');
const selectedType = ref('');

// Options for the SelectMenu component
const fetchUniqueValues = async (endpoint, targetArray, transformFunc = null) => {
  try {
    const response = await axios.get(endpoint);
    targetArray.value = response.data.map(item => {
      let value = item.type || item.is_remote;
      let label = transformFunc ? transformFunc(value) : value;
      return { value, label };
    });
  } catch (error) {
    console.error('Error fetching unique values:', error);
  }
};

const transformIsRemote = (value) => value === 'yes' ? 'Remote' : 'Office';

const isRemoteOptions = ref([]);
const typeOptions = ref([]);

// Function to fetch jobs from the API
const fetchJobs = async (page = 1) => {
  try {
    jobsLoaded.value = false;
    isLoading.value = true;
    error.value = null;
    console.log(searchQuery.value)
    const response = await axios.get('/job_offers', {
      params: {
        page,
        search: searchQuery.value,
        remote: selectedRemote.value,
        type: selectedType.value,
      },
    });
    console.log(response.data)
    jobs.value = response.data.data;
    currentPage.value = response.data.current_page;
    totalPages.value = response.data.last_page;
  } catch (err) {
    error.value = 'Error fetching jobs. Please try again later.';
  } finally {
    jobsLoaded.value = true;
    isLoading.value = false;
  }
};

const debouncedFetchJobs = debounce(fetchJobs, 300);

// Function to fetch the next page of jobs
const nextPage = () => {
  if (currentPage.value < totalPages.value) {
    fetchJobs(currentPage.value + 1);
  }
};

// Function to fetch the previous page of jobs
const prevPage = () => {
  if (currentPage.value > 1) {
    fetchJobs(currentPage.value - 1);
  }
};

// Watchers for search input and filters
watch([searchQuery, selectedRemote, selectedType], () => {
  debouncedFetchJobs();
});

const resetFilters = () => {
  searchQuery.value = '';
  selectedType.value = '';
  selectedRemote.value = '';
  fetchJobs();
};


// Fetch jobs on component mount
onMounted(() => {
  fetchJobs();
  fetchUniqueValues('/job/unique_is_remote', isRemoteOptions, transformIsRemote);
  fetchUniqueValues('/job/unique_types', typeOptions);
});
</script>
