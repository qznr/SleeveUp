<template>
  <!-- Header Section -->
  <div class="max-w bg-gradient-to-r from-gray-700 to-gray-200 flex items-center justify-center text-white text-center">
    <div class="py-14 font-light">
      <h1 class="text-5xl mb-4 tracking-wider">Explore Events.</h1>
      <p class="text-2xl text-gray-300 tracking-normal">Find, join, or save it to your collection.</p>
    </div>
  </div>

  <!-- Search and Filter Section -->
  <div class="bg-[#151126] py-8 flex flex-col md:flex-row justify-center items-center gap-4">
    <SearchInput v-model="searchQuery" class="mt-4 md:mt-0" @dblclick="resetFilters"></SearchInput>
    <div class="flex md:flex-row gap-4 md:-mt-4">
      <SelectMenu v-model="selectedEventType" :fieldClasses="'bg-[#5742F5] py-3 px-6 text-white font-semibold border-none w-32'" :dropdownClasses="'overflow-y-auto max-h-36'" :options="eventTypeOptions" placeholder="Event Type"></SelectMenu>
      <SelectMenu v-model="selectedSortBy" :fieldClasses="'bg-[#5742F5] py-3 px-6 text-white font-semibold border-none w-32'" :dropdownClasses="'overflow-y-auto max-h-36'" :options="sortByOptions" placeholder="Sort By"></SelectMenu>
    </div>
  </div>

  <!-- Loading Section -->
  <Loading :loaded="!eventLoaded"></Loading>

  <!-- Error Section -->
  <div v-if="error" class="min-h-screen bg-[#151126] flex justify-center items-center">
    <h1 class="font-semibold text-5xl text-red-500">{{ error }}</h1>
  </div>

  <!-- Empty Section -->
  <div v-if="eventLoaded && events.length === 0" class="min-h-screen bg-[#151126] flex justify-center items-center">
    <div class="flex items-center bg-white p-6 gap-x-4 rounded-lg">
      <h1 class="font-semibold text-5xl text-[381D4F]">No Events found</h1>
    </div>
  </div>

  <!-- Event Listing Section -->
  <div v-if="eventLoaded" class="bg-[#151126] pb-6">
    <ul class="max-w-7xl mx-auto px-4 md:px-0">
      <li v-for="event in events" :key="event.id" class="flex flex-col md:flex-row justify-between items-start md:items-end bg-white mb-6 rounded-xl p-4 md:p-8">
        <div class="flex flex-col md:flex-row w-full">
          <img :src="event.img" class="size-48 md:size-64">
          <div class="w-full md:w-auto md:ml-4 mt-4 md:mt-0">
            <div class="flex flex-wrap gap-2 mb-2">
              <div class="px-6 py-0.5 bg-[#25B4C4] text-gray-100 rounded-xl inline-flex items-center font-semibold capitalize">
                <p>{{ event.event_type }}</p>
              </div>
              <div class="px-6 py-0.5 bg-[#FF8AAF] text-gray-100 rounded-xl inline-flex items-center font-semibold capitalize">
                <p>{{ event.start_date }}</p>
              </div>
            </div>
            <h1 class="text-[28px] text-[#381D4F] font-semibold mb-2">{{ event.name }}</h1>
            <h2 class="text-[22px] text-[#381D4F] font-semibold mb-2"> {{ event.event_organizer }} </h2>
            <h3>Pemateri : {{ event.presenter }} </h3>
            <div>
              <p class="text-wrap break-words whitespace-pre-wrap max-w-5xl mt-2">{{ event.description }}</p>
            </div>
          </div>
        </div>
        <button @click="openEventModal(event)" class="bg-[#5742F5] py-3 px-12 rounded-lg text-white font-semibold mt-4 md:mt-0">Details</button>
      </li>
    </ul>
    <div class="max-w-7xl mx-auto px-4 md:px-0 flex justify-between items-center">
      <button @click="prevPage" :disabled="currentPage === 1" class="bg-[#5742F5] py-2 px-4 rounded-lg text-white font-semibold">Previous</button>
      <span class="text-white">Page {{ currentPage }} of {{ totalPages }}</span>
      <button @click="nextPage" :disabled="currentPage === totalPages" class="bg-[#5742F5] py-2 px-4 rounded-lg text-white font-semibold">Next</button>
    </div>
  </div>

  <!-- Event Modal -->
  <Modal :show="showEventModal" @close="showEventModal = false" :maxWidth="'5xl'">
    <template v-slot>
      <div v-if="selectedEvent" class="bg-white p-6 rounded-xl min-w-max">
        <h1 class="text-[32px] mb-3 text-[381D4F] font-semibold">EVENT DETAILS</h1>
        <div class="flex justify-start items-start mb-4">
          <div>
            <img :src="selectedEvent.img" alt="Event Image" class="object-contain h-128 w-96 rounded-xl mb-4">
            <div class="flex-col justify-between items-center">
              <div class="flex justify-center text-[22px] px-6 py-1 mt-1 mb-4 bg-[#25B4C4] text-white rounded-xl font-semibold capitalize ">
                <p>MORE INFORMATION</p>
              </div>
              <div class="text-blue-700">
                <p class="flex items-center size-8 gap-x-4 mb-2"><img src="https://skillicons.dev/icons?i=instagram"> <a :href="selectedEvent.instagram" target="_blank">@{{ selectedEvent.instagram.split('/').pop() }}</a></p>
                <p class="flex items-center gap-x-4 mb-2">
                  <svg xmlns="http://www.w3.org/2000/svg" width="2em" height="2em" viewBox="0 0 24 24">
                    <path fill="#316FF6" d="M22 12c0-5.52-4.48-10-10-10S2 6.48 2 12c0 4.84 3.44 8.87 8 9.8V15H8v-3h2V9.5C10 7.57 11.57 6 13.5 6H16v3h-2c-.55 0-1 .45-1 1v2h3v3h-3v6.95c5.05-.5 9-4.76 9-9.95" />
                  </svg>
                  <a :href="selectedEvent.facebook" target="_blank">{{ selectedEvent.facebook.split('/').pop() }}</a>
                </p>
                <p class="flex items-center gap-x-4 mb-2">
                  <svg xmlns="http://www.w3.org/2000/svg" width="2em" height="2em" viewBox="0 0 24 24">
                    <path fill="black" d="M17.751 3h3.067l-6.7 7.625L22 21h-6.172l-4.833-6.293L5.464 21h-3.07l7.167-8.155L2 3h6.328l4.37 5.752zm-1.076 16.172h1.7L7.404 4.732H5.58z" />
                  </svg>
                  <a :href="selectedEvent.twitter" target="_blank">{{ selectedEvent.twitter.split('/').pop() }}</a>
                </p>
                <p class="flex items-center gap-x-4 mb-2">
                  <svg xmlns="http://www.w3.org/2000/svg" width="2em" height="2em" viewBox="0 0 256 193">
                    <path fill="#4285f4" d="M58.182 192.05V93.14L27.507 65.077L0 49.504v125.091c0 9.658 7.825 17.455 17.455 17.455z" />
                    <path fill="#34a853" d="M197.818 192.05h40.727c9.659 0 17.455-7.826 17.455-17.455V49.505l-31.156 17.837l-27.026 25.798z" />
                    <path fill="#ea4335" d="m58.182 93.14l-4.174-38.647l4.174-36.989L128 69.868l69.818-52.364l4.669 34.992l-4.669 40.644L128 145.504z" />
                    <path fill="#fbbc04" d="M197.818 17.504V93.14L256 49.504V26.231c0-21.585-24.64-33.89-41.89-20.945z" />
                    <path fill="#c5221f" d="m0 49.504l26.759 20.07L58.182 93.14V17.504L41.89 5.286C24.61-7.66 0 4.646 0 26.23z" />
                  </svg>
                  <a :href="selectedEvent.email" target="_blank">{{ selectedEvent.email }}</a>
                </p>
                <p class="flex items-center gap-x-4 mb-2">
                  <svg xmlns="http://www.w3.org/2000/svg" width="2em" height="2em" viewBox="0 0 24 24">
                    <path fill="#5742F5" d="M16.36 14c.08-.66.14-1.32.14-2s-.06-1.34-.14-2h3.38c.16.64.26 1.31.26 2s-.1 1.36-.26 2m-5.15 5.56c.6-1.11 1.06-2.31 1.38-3.56h2.95a8.03 8.03 0 0 1-4.33 3.56M14.34 14H9.66c-.1-.66-.16-1.32-.16-2s.06-1.35.16-2h4.68c.09.65.16 1.32.16 2s-.07 1.34-.16 2M12 19.96c-.83-1.2-1.5-2.53-1.91-3.96h3.82c-.41 1.43-1.08 2.76-1.91 3.96M8 8H5.08A7.92 7.92 0 0 1 9.4 4.44C8.8 5.55 8.35 6.75 8 8m-2.92 8H8c.35 1.25.8 2.45 1.4 3.56A8 8 0 0 1 5.08 16m-.82-2C4.1 13.36 4 12.69 4 12s.1-1.36.26-2h3.38c-.08.66-.14 1.32-.14 2s.06 1.34.14 2M12 4.03c.83 1.2 1.5 2.54 1.91 3.97h-3.82c.41-1.43 1.08-2.77 1.91-3.97M18.92 8h-2.95a15.7 15.7 0 0 0-1.38-3.56c1.84.63 3.37 1.9 4.33 3.56M12 2C6.47 2 2 6.5 2 12a10 10 0 0 0 10 10a10 10 0 0 0 10-10A10 10 0 0 0 12 2" />
                  </svg>
                  <a :href="selectedEvent.link_website" target="_blank">{{ selectedEvent.link_website }}</a>
                </p>
              </div>
            </div>
          </div>
          <div class="ml-4 text-[381D4F]">
            <div class="flex min-w-[512px] max-w-[512px] items-start justify-between">
              <h2 class="text-3xl font-semibold mb-4">{{ selectedEvent.name }}</h2>
              <div class="px-6 py-0.5 mt-1 bg-[#25B4C4] text-gray-100 rounded-xl inline-flex items-center font-semibold capitalize">
                <p>{{ selectedEvent.event_type }}</p>
              </div>
            </div>
            <h3 class="text-xl font-semibold mb-4">By {{ selectedEvent.event_organizer }}</h3>
            <div class="px-8 py-0.5 mb-4 bg-[#FF8AAF] text-white rounded-full inline-flex items-center font-semibold capitalize">
              <p>DATE</p>
            </div>
            <p class="text-xl mb-4"> {{ selectedEvent.start_date }} {{ selectedEvent.start_date != selectedEvent.end_date ? ` - ${selectedEvent.end_date}` : '' }}</p>
            <div class="px-8 py-0.5 mb-4 bg-[#FF8AAF] text-white rounded-full inline-flex items-center font-semibold capitalize">
              <p>TIME</p>
            </div>
            <p class="text-xl mb-4"> {{ selectedEvent.time }}</p>
            <div class="px-8 py-0.5 mb-4 bg-[#FF8AAF] text-white rounded-full inline-flex items-center font-semibold capitalize">
              <p>LOCATION</p>
            </div>
            <p class="text-xl mb-4"> {{ selectedEvent.location }}</p>
            <div class="px-4 py-2 mb-4 bg-[#FF8AAF] text-white rounded-xl flex-col items-center font-semibold capitalize">
              <p>Pemateri : {{ selectedEvent.presenter }}</p>
              <div class="description" v-html="selectedEvent.materials"></div>
            </div>
            <div class="flex justify-between">
              <div class="flex flex-col items-center">
                <p class="text-[381D4F] text-[22px]">Scan Me!</p>
                <canvas ref="qrCanvas" width="256" height="256"></canvas>
              </div>
              <div class="flex place-items-end pb-5">
                <a :href="selectedEvent.link_register" class="bg-[#5742F5] p-5 rounded-lg text-white font-semibold md:mt-0">REGISTER NOW</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </template>
  </Modal>
</template>


<script setup>
import { ref, onMounted, watch, nextTick } from 'vue';
import axios from 'axios';
import SearchInput from '../../components/SearchInput.vue';
import SelectMenu from '../../components/SelectMenu.vue';
import debounce from 'lodash/debounce';
import Modal from '../../components/Modal.vue';
import Loading from '../../components/Loading.vue';

import QRCode from 'qrcode';

const events = ref([]);
const eventLoaded = ref(false);
const currentPage = ref(1);
const totalPages = ref(0);
const isLoading = ref(false);
const error = ref(null);

const eventTypeOptions = ref([]);
const sortByOptions = ref([
  { value: 'date', label: 'Date' },
  { value: 'name', label: 'Name' }
]);

// Options for the SelectMenu component
const fetchUniqueEventTypes = async () => {
  try {
    const response = await axios.get('/event/unique_types');
    eventTypeOptions.value = response.data.map(item => {
      return { value: item.event_type, label: item.event_type };
    });
  } catch (error) {
    console.error('Error fetching unique event types:', error);
  }
};

const generateQRCode = async () => {
  if (selectedEvent.value && selectedEvent.value.link_register) {
    console.log('Generating QR Code for:', selectedEvent.value.link_register);
    await nextTick();
    if (qrCanvas.value) {
      QRCode.toCanvas(qrCanvas.value, selectedEvent.value.link_register, { errorCorrectionLevel: 'L', scale : 6}, (error) => {
        if (error) console.error(error);
      });
    } else {
      console.log('qrCanvas is still not available.');
    }
  } else {
    console.log('QR Code generation skipped. selectedEvent or link_register is missing.');
  }
};

const qrCanvas = ref(null);

// Search and filter state
const searchQuery = ref('');
const selectedEventType = ref('');
const selectedSortBy = ref('date'); // Default sort by date

const showEventModal = ref(false);
const selectedEvent = ref(null);

// Watchers for search input and filters
watch([searchQuery, selectedEventType, selectedSortBy], () => {
  debouncedFetchEvents();
});

const fetchEvents = async (page = 1) => {
  try {
    eventLoaded.value = false;
    isLoading.value = true;
    error.value = null;
    const response = await axios.get('/events', {
      params: {
        page,
        search: searchQuery.value,
        event_type: selectedEventType.value,
        sort_by: selectedSortBy.value,
      },
    });
    events.value = response.data.data;
    currentPage.value = response.data.current_page;
    totalPages.value = response.data.last_page;
  } catch (error) {
    console.error('Error fetching events. Please try again later.');
  } finally {
    eventLoaded.value = true;
    isLoading.value = false;
  }
};

const nextPage = () => {
  if (currentPage.value < totalPages.value) {
    fetchEvents(currentPage.value + 1);
  }
};

const prevPage = () => {
  if (currentPage.value > 1) {
    fetchEvents(currentPage.value - 1);
  }
};

const debouncedFetchEvents = debounce(fetchEvents, 300);

const resetFilters = () => {
  searchQuery.value = '';
  selectedEventType.value = '';
  selectedSortBy.value = 'date';
  fetchEvents();
};

const openEventModal = (event) => {
  selectedEvent.value = event;
  showEventModal.value = true;
  generateQRCode();
};

onMounted(() => {
  fetchEvents();
  fetchUniqueEventTypes();
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