<template>
  <div v-if="!job" class="min-h-screen bg-[151126] flex justify-center items-center">
    <h1 class="font-semibold text-5xl text-white">Loading...</h1>
  </div>
  <div v-if="job" class="bg-[151126]">
    <div class="flex max-w-5xl mx-auto py-6 mb-6 rounded-xl ">
        <img :src="job.company.img" class="rounded-full inline-block lg:w-44 lg:h-44 w-52 h-52">
        <div class="text-white ml-6 mt-3">
          <h1 class="text-[32px] font-semibold">{{ job.company.name }}</h1>
          <div class="flex mb-2 py-1">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6 mr-2 text-[FF8AAF]">
              <path fill-rule="evenodd" d="m11.54 22.351.07.04.028.016a.76.76 0 0 0 .723 0l.028-.015.071-.041a16.975 16.975 0 0 0 1.144-.742 19.58 19.58 0 0 0 2.683-2.282c1.944-1.99 3.963-4.98 3.963-8.827a8.25 8.25 0 0 0-16.5 0c0 3.846 2.02 6.837 3.963 8.827a19.58 19.58 0 0 0 2.682 2.282 16.975 16.975 0 0 0 1.145.742ZM12 13.5a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" clip-rule="evenodd" />
            </svg>
            <span>{{ job.company.address }}</span>
          </div>
          <div class="flex mb-2 py-1">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 mr-2 text-[FF8AAF]">
              <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
            </svg>
            <span class="mr-4">{{ job.company.email }}</span>
            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 mr-2 text-[FF8AAF]">
              <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 0 0 2.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 0 1-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 0 0-1.091-.852H4.5A2.25 2.25 0 0 0 2.25 4.5v2.25Z" />
            </svg>
            <span>{{ job.company.email }}</span>
          </div>
        </div>
    </div>
    <div class="max-w-7xl mx-auto">
      <h1 class="mb-2 font-semibold text-white text-[28px]">About Company</h1>
      <div class="flex justify-between items-end bg-white border-4 border-[25B4C4] mb-6 rounded-xl py-8 px-8 text-[381D4F]">
        <div class="description" v-html="job.company.full_description"></div>
      </div>
      <div class="flex justify-center mb-4">
        <h1 class="text-[32px] text-white font-semibold mb-2">{{ job.profession.name }}</h1>
        <div class="flex items-center gap-x-4 ml-4">
          <div class="px-6 py-0.5 bg-[25B4C4] text-gray-100 rounded-xl inline-flex items-center font-semibold capitalize">
            <p>{{ job.is_remote=="yes" ? "Remote" : "Office"}}</p>
          </div>
          <div class="px-6 py-0.5 bg-[FF8AAF] text-gray-100 rounded-xl inline-flex items-center font-semibold capitalize">
            <p>{{ job.type }} </p>
          </div>
        </div>
      </div>
      <div class="grid grid-cols-2 gap-x-4 text-[381D4F]">
        <div class="bg-white border-4 border-[25B4C4] mb-6 rounded-xl py-8 px-8 ">
          <h1 class="text-[28px] font-semibold mb-1">Persyaratan</h1>
          <div class="description" v-html="job.requirement"></div>
        </div>
        <div class="bg-white border-4 border-[25B4C4] mb-6 rounded-xl py-8 px-8">
          <h1 class="text-[28px] font-semibold mb-1">Fasilitas Karyawan</h1>
          <div class="description" v-html="job.benefits"></div>
        </div>
      </div>
      <div class="bg-white border-4 border-[25B4C4] mb-6 rounded-xl py-8 px-8 text-[381D4F]">
        <h1 class="text-[28px] font-semibold mb-1">Deskripsi Pekerjaan</h1>
        <div class="description" v-html="job.full_description"></div>
      </div>
      <div class="flex justify-center">
        <button @click="showApplyModal= true" class="bg-[5742F5] py-3 px-6 rounded-lg text-white font-semibold"> AJUKAN LAMARAN PEKERJAAN </button>
      </div>
    </div>
  </div>

  <!-- Apply Modal -->
  <Modal :show="showApplyModal" @close="showApplyModal = false" :maxWidth="'3xl'">
    <div class="px-4 pt-12 pb-6" v-if="user">
      <div class="text-center text-[381D4F]">
        <h1 class="text-[28px] font-semibold mb-5"> Apakah anda yakin ingin mengajukan lamaran? </h1>
        <p class="text-[16px]">Pastikan profil anda telah berisi informasi terbaru tentang anda</p>
      </div>
      <div class="flex justify-center gap-x-12 my-6">
        <button @click="checkProfile()" class="bg-[5742F5] py-2 px-12 rounded-lg text-white font-semibold"> Ya </button>
        <button @click="showApplyModal= false" class="bg-[5742F5] py-3 px-12 rounded-lg text-white font-semibold"> Batal </button>
      </div>
    </div>
    <div v-else class="px-4 py-6">
      <div class="text-center text-[381D4F]">
        <h1 class="text-[28px] font-semibold mb-5"> Silakan Login untuk Mengajukan Lamaran Pekerjaan </h1>
        <p class="text-[16px]">Pastikan profil anda berisi informasi terbaru tentang anda</p>
      </div>
      <div class="flex justify-center my-6">
        <a href="/login" class="bg-[5742F5] py-2 px-12 rounded-lg text-white font-semibold"> LOGIN </a>
      </div>
    </div>
  </Modal>

  <!-- Success Modal -->
  <Modal :show="showSuccessModal" @close="showSuccessModal = false" :maxWidth="'3xl'">
    <div class="px-4 py-6">
      <div class="flex justify-center mb-1 text-[25B4C4]">
        <svg width="72" height="72" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M24 44C29.5228 44 34.5228 41.7614 38.1421 38.1421C41.7614 34.5228 44 29.5228 44 24C44 18.4772 41.7614 13.4772 38.1421 9.85786C34.5228 6.23858 29.5228 4 24 4C18.4772 4 13.4772 6.23858 9.85786 9.85786C6.23858 13.4772 4 18.4772 4 24C4 29.5228 6.23858 34.5228 9.85786 38.1421C13.4772 41.7614 18.4772 44 24 44Z" fill="#25B4C4" stroke="#25B4C4" stroke-width="4" stroke-linejoin="round"/>
          <path d="M16 24L22 30L34 18" stroke="#FFF" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
      </div>
      <div class="text-center text-[381D4F]">
        <h1 class="text-[28px] font-semibold"> Anda telah terdaftar! </h1>
        <p class="text-[16px]">Jangan lupa cek email anda untuk informasi lebih lanjut!</p>
      </div>
      <div class="flex justify-center my-6">
        <a href="/" class="bg-[5742F5] py-2 px-12 rounded-lg text-white font-semibold"> KEMBALI KE HOMEPAGE </a>
      </div>
    </div>
  </Modal>

  <!-- No Profile Modal -->
  <Modal :show="showNoProfileModal" @close="showNoProfileModal = false" :maxWidth="'3xl'">
    <div class="px-4 py-6">
      <div class="text-center text-[381D4F]">
        <h1 class="text-[28px] font-semibold mb-5"> Harap lengkapi profil anda terlebih dahulu! </h1>
        <p class="text-[16px]">Pastikan profil anda telah berisi informasi terbaru tentang anda</p>
      </div>
      <div class="flex justify-center my-6">
        <a href="/profile" class="bg-[5742F5] py-2 px-12 rounded-lg text-white font-semibold"> KEMBALI KE PROFIL </a>
      </div>
    </div>
  </Modal>

</template>

<script setup>
import { ref, onMounted, defineProps, computed} from 'vue';
import axios from 'axios';
import Modal from '../../components/Modal.vue';
import { useUserStore } from '../../stores/userStore';


const props = defineProps({
  jobId: {
    type: Number,
    required: true,
  },
});

const userStore = useUserStore();
const user = userStore.user;

const job = ref(null);
const showApplyModal = ref(false);
const showNoProfileModal = ref(false);
const showSuccessModal = ref(false);


const checkProfile = async () => {
  try {
    console.log('Checking profile...')
    const response = await axios.get(`/user`);
    user.value = response.data;
    console.log(user.value)
    showApplyModal.value = false;
    if (user.applicant.experiences.length > 0 && user.applicant.certificates.length > 0 && user.applicant.projects.length > 0) {
      showSuccessModal.value = true;
    } else {
      showNoProfileModal.value = true;
    }
  } catch (error) {
    console.error('Error fetching job details:', error);
  }
};

const fetchJobDetails = async () => {
  try {
    const response = await axios.get(`/job_offers/${props.jobId}`);
    console.log(response.data)
    job.value = response.data;
  } catch (error) {
    console.error('Error fetching job details:', error);
  }
};

onMounted(() => {
  fetchJobDetails();
});
</script>

<style scoped>

::v-deep.description ul {
  list-style-type: disc; /* or whatever style you want */
  margin-left: 20px; /* adjust as needed */
  padding: 10px; /* adjust as needed */
}

::v-deep.description ul li {
  margin-bottom: 3px; /* adjust as needed */
}
</style>