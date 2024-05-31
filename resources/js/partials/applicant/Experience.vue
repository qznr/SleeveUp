<template>
  <div class="bg-white max-w-screen-xl mx-auto p-8 rounded-xl shadow-xl relative">
    <div class="flex mb-3 items-center justify-between">
      <h1 class="text-3xl text-[381D4F] font-semibold">Pengalaman</h1>
      <button class="col-span-12 lg:col-span-1 flex text-[5742F5]" @click="showAddModal = true">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
          <path fill-rule="evenodd" d="M5.625 1.5H9a3.75 3.75 0 0 1 3.75 3.75v1.875c0 1.036.84 1.875 1.875 1.875H16.5a3.75 3.75 0 0 1 3.75 3.75v7.875c0 1.035-.84 1.875-1.875 1.875H5.625a1.875 1.875 0 0 1-1.875-1.875V3.375c0-1.036.84-1.875 1.875-1.875ZM12.75 12a.75.75 0 0 0-1.5 0v2.25H9a.75.75 0 0 0 0 1.5h2.25V18a.75.75 0 0 0 1.5 0v-2.25H15a.75.75 0 0 0 0-1.5h-2.25V12Z" clip-rule="evenodd" />
          <path d="M14.25 5.25a5.23 5.23 0 0 0-1.279-3.434 9.768 9.768 0 0 1 6.963 6.963A5.23 5.23 0 0 0 16.5 7.5h-1.875a.375.375 0 0 1-.375-.375V5.25Z" />
        </svg>

      </button>
    </div>
    <p class="text-wrap break-words whitespace-pre-wrap"> {{user.applicant.about_me}} </p>
  </div>

  <Modal :show="showAddModal" @close="showAddModal = false" :maxWidth="'5xl'">
    <template v-slot>
      <div class="px-12 py-6">
        <h2 class="text-2xl mb-3 text-[381D4F]">TULISKAN PENGALAMANMU</h2>
        <form @submit.prevent="updateApplicant">
          <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-[381D4F]">Pengalaman</label>
            <TextInput id="name" v-model="form.name" type="text" class="mt-1 block w-full" :placeholder="'Anda pernah Bekerja sebagai apa? Di perusahaan mana? (Ex: Intern di PT Mencari Cinta Sejati)'"></TextInput>
          </div>
          <div class="mb-4">
            <label for="location" class="block text-sm font-medium text-[381D4F]">Lokasi</label>
            <TextInput id="location" v-model="form.location" type="text" class="mt-1 block w-full" :placeholder="'Dimana lokasi perusahaan anda? (Ex: Malang, Jawa Timur)'"></TextInput>
          </div>
          <div class="mb-4">
            <label for="startYear" class="block text-sm font-medium text-[381D4F]">Lama Jenjang Karir</label>
            <div class="flex gap-x-12">
              <TextInput id="startYear" v-model="form.start_year" type="number" class="mt-1 block w-36" :placeholder="'Tahun Mulai'"></TextInput>

              <TextInput id="endYear" v-model="form.end_year" type="number" class="mt-1 block w-36" :placeholder="'Tahun Selesai'"></TextInput>

            </div>
          </div>
          <div class="mb-4">
            <label for="role" class="block text-sm font-medium text-[381D4F]">Pilih Profesi</label>
            <SelectMenu id="role" class="mt-1 block w-full" v-model="form.role" :options="roleOptions" :dropdownClasses="'overflow-y-auto max-h-36'" placeholder="Pilih salah satu profesi"></SelectMenu>
          </div>
          <div class="mb-4">
            <label for="description" class="block text-sm font-medium text-[381D4F]">Deskripsi Pengalaman</label>
            <TextArea id="description" v-model="form.description" class="mt-2 block w-full" :rows="3" :placeholder="'Jelaskan pengalaman yang anda miliki secara singkat'"></TextArea>
          </div>
          <div class="mb-4">
            <label for="skillsAndTools" class="block text-sm font-medium text-[381D4F]">Skills dan Tools</label>
            <TextInput id="skillsAndTools" v-model="form.skills_and_tools" type="text" class="mt-1 block w-full" :placeholder="'Sebutkan jenis pengalaman dan alat yang kamu miliki (Ex: Leadership, Time Management, Excel, Microsoft Word, etc)'"></TextInput>
          </div>
          <div class="flex justify-end">
            <button type="submit" class="px-4 py-2 bg-[5742F5] text-white rounded-md">Tambah</button>
          </div>
        </form>
      </div>
    </template>
  </Modal>
</template>

<script setup>
import { ref, watch } from 'vue';
import { useUserStore } from '../../stores/userStore';
import Modal from '../../components/Modal.vue';
import TextArea from '../../components/TextArea.vue'
import TextInput from '../../components/TextInput.vue'
import SelectMenu from '../../components/SelectMenu.vue'

const userStore = useUserStore();
const user = ref(userStore.user);

const roleOptions = ref([
  { value: 'Data Scientist', label: 'Data Scientist' },
  { value: 'Data Engineer', label: 'Data Engineer' },
  { value: 'ML Engineer', label: 'ML Engineer' },
  { value: 'Fullstack Developer', label: 'Fullstack Developer' },
  { value: 'Frontend Developer', label: 'Frontend Developer' },
  { value: 'Backend Developer', label: 'Backend Developer' },

]);

watch(() => userStore.user, (newUser) => {
  user.value = newUser;
});

const form = ref({
  about_me: user.value.applicant.about_me
});

const showAddModal = ref(false);

// const updateApplicant = async () => {
//   try {
//     const userData = {
//       applicant: {
//         about_me: form.value.about_me
//       }
//     };

//     const response = await userStore.updateUser(userData);
//     if (response.success) {
//       showModal.value = false;
//     } else {
//       alert('Failed to update profile');
//     }
//   } catch (error) {
//     console.error('Error updating profile:', error);
//     alert('An error occurred while updating the profile');
//   }
// };
</script>