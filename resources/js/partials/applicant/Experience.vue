<template>
  <div class="bg-white max-w-screen-xl mx-auto p-8 rounded-xl shadow-xl relative mb-6" id="#experience">
    <div class="flex mb-3 items-center justify-between">
      <h1 class="text-3xl text-[381D4F] font-semibold">Pengalaman</h1>
      <button class="col-span-12 lg:col-span-1 flex text-[5742F5]" @click="showAddModal = true">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
          <path fill-rule="evenodd" d="M5.625 1.5H9a3.75 3.75 0 0 1 3.75 3.75v1.875c0 1.036.84 1.875 1.875 1.875H16.5a3.75 3.75 0 0 1 3.75 3.75v7.875c0 1.035-.84 1.875-1.875 1.875H5.625a1.875 1.875 0 0 1-1.875-1.875V3.375c0-1.036.84-1.875 1.875-1.875ZM12.75 12a.75.75 0 0 0-1.5 0v2.25H9a.75.75 0 0 0 0 1.5h2.25V18a.75.75 0 0 0 1.5 0v-2.25H15a.75.75 0 0 0 0-1.5h-2.25V12Z" clip-rule="evenodd" />
          <path d="M14.25 5.25a5.23 5.23 0 0 0-1.279-3.434 9.768 9.768 0 0 1 6.963 6.963A5.23 5.23 0 0 0 16.5 7.5h-1.875a.375.375 0 0 1-.375-.375V5.25Z" />
        </svg>
      </button>
    </div>

    <!-- Experiences -->
    <div v-if="user.applicant.experiences">
        <div v-for="(experience, index) in displayedExperiences" :key="index" class="flex py-4 border-t border-gray-400">
          <div class="text-[381D4F] px-8">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960" fill="currentColor" class="size-8">
              <path d="M160-120q-33 0-56.5-23.5T80-200v-440q0-33 23.5-56.5T160-720h160v-80q0-33 23.5-56.5T400-880h160q33 0 56.5 23.5T640-800v80h160q33 0 56.5 23.5T880-640v440q0 33-23.5 56.5T800-120H160Zm240-600h160v-80H400v80Z"/>
            </svg>
          </div>
          <div class="justify-between w-full">
            <h2 class="text-[381D4F] text-xl font-semibold"> {{ experience.name }}</h2>
            <div class="flex py-2 max-w-sm justify-between items-center">
              <div class="flex">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6 mr-2 text-[FF8AAF]">
                  <path fill-rule="evenodd" d="m11.54 22.351.07.04.028.016a.76.76 0 0 0 .723 0l.028-.015.071-.041a16.975 16.975 0 0 0 1.144-.742 19.58 19.58 0 0 0 2.683-2.282c1.944-1.99 3.963-4.98 3.963-8.827a8.25 8.25 0 0 0-16.5 0c0 3.846 2.02 6.837 3.963 8.827a19.58 19.58 0 0 0 2.682 2.282 16.975 16.975 0 0 0 1.145.742ZM12 13.5a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" clip-rule="evenodd" />
                </svg>
                <span>{{ experience.location }}</span>
              </div>
              <div class="group px-3 py-1 bg-[25B4C4] text-gray-100 rounded-2xl inline-flex items-center font-semibold capitalize">
                <p>{{ experience.role }}</p>
              </div>
            </div>
            <h2 class="text-[381D4F] text-base font-semibold py-2"> {{ experience.start_year }} - {{ experience.end_year }}</h2>
            <p class="text-[381D4F] text-wrap break-words whitespace-pre-wrap py-2">{{ experience.description }}</p>
            <div class="flex mb-2">
              <p class="text-[381D4F] font-semibold mr-1">Skills and Tools:</p>
              <p class="text-[381D4F] text-wrap break-words whitespace-pre-wrap"> {{ experience.skills_and_tools }}</p>
            </div>
          </div>

          <!-- Buttons -->
          <div class="flex flex-col">
            <button class="col-span-12 lg:col-span-1 flex justify-end text-[5742F5]" @click="openEditModal(experience)">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                <path d="M21.731 2.269a2.625 2.625 0 0 0-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 0 0 0-3.712ZM19.513 8.199l-3.712-3.712-8.4 8.4a5.25 5.25 0 0 0-1.32 2.214l-.8 2.685a.75.75 0 0 0 .933.933l2.685-.8a5.25 5.25 0 0 0 2.214-1.32l8.4-8.4Z" />
                <path d="M5.25 5.25a3 3 0 0 0-3 3v10.5a3 3 0 0 0 3 3h10.5a3 3 0 0 0 3-3V13.5a.75.75 0 0 0-1.5 0v5.25a1.5 1.5 0 0 1-1.5 1.5H5.25a1.5 1.5 0 0 1-1.5-1.5V8.25a1.5 1.5 0 0 1 1.5-1.5h5.25a.75.75 0 0 0 0-1.5H5.25Z" />
              </svg>
            </button>
            <button class="mt-3 col-span-12 lg:col-span-1 flex justify-end text-[5742F5]" @click="confirmDelete(experience)">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                <path fill-rule="evenodd" d="M16.5 4.478v.227a48.816 48.816 0 0 1 3.878.512.75.75 0 1 1-.256 1.478l-.209-.035-1.005 13.07a3 3 0 0 1-2.991 2.77H8.084a3 3 0 0 1-2.991-2.77L4.087 6.66l-.209.035a.75.75 0 0 1-.256-1.478A48.567 48.567 0 0 1 7.5 4.705v-.227c0-1.564 1.213-2.9 2.816-2.951a52.662 52.662 0 0 1 3.369 0c1.603.051 2.815 1.387 2.815 2.951Zm-6.136-1.452a51.196 51.196 0 0 1 3.273 0C14.39 3.05 15 3.684 15 4.478v.113a49.488 49.488 0 0 0-6 0v-.113c0-.794.609-1.428 1.364-1.452Zm-.355 5.945a.75.75 0 1 0-1.5.058l.347 9a.75.75 0 1 0 1.499-.058l-.346-9Zm5.48.058a.75.75 0 1 0-1.498-.058l-.347 9a.75.75 0 0 0 1.5.058l.345-9Z" clip-rule="evenodd" />
              </svg>
            </button>
          </div>
        </div>
      <div class="flex border-t border-gray-400 justify-center pt-8" v-if="experienceCount > 1">
        <button @click="toggleShowMore" class="group px-3 py-1 bg-[#5742F5] text-gray-100 rounded-md inline-flex items-center font-semibold capitalize">
          <p class='pr-1'>{{ showAllExperiences ? 'Tampilkan Lebih Sedikit' : 'Lihat Selengkapnya' }}</p>
        </button>
      </div>
    </div>

    <div class="flex justify-center p-16" v-if="!user.applicant.experiences[0]">
      Pengalaman kamu masih kosong, segera diisi yuk!
    </div>

  </div>


  <!-- Add Modal -->
  <Modal :show="showAddModal" @close="showAddModal = false" :maxWidth="'5xl'">
    <template v-slot>
      <div class="px-12 py-6">
        <h2 class="text-2xl mb-3 text-[381D4F]">TULISKAN PENGALAMANMU</h2>
        <form @submit.prevent="addApplicantExperience">
          <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-[381D4F]">Pengalaman</label>
            <TextInput id="name" v-model="addForm.name" type="text" class="mt-1 block w-full" :placeholder="'Anda pernah Bekerja sebagai apa? Di perusahaan mana? (Ex: Intern di PT Mencari Cinta Sejati)'" required></TextInput>
          </div>
          <div class="mb-4">
            <label for="location" class="block text-sm font-medium text-[381D4F]">Lokasi</label>
            <TextInput id="location" v-model="addForm.location" type="text" class="mt-1 block w-full" :placeholder="'Dimana lokasi perusahaan anda? (Ex: Malang, Jawa Timur)'" required></TextInput>
          </div>
          <div class="mb-4">
            <label for="startYear" class="block text-sm font-medium text-[381D4F]">Lama Jenjang Karir</label>
            <div class="flex gap-x-12">
              <TextInput id="startYear" v-model="addForm.start_year" type="text" class="mt-1 block w-36" :placeholder="'Tahun Mulai'" required></TextInput>
              <TextInput id="endYear" v-model="addForm.end_year" type="text" class="mt-1 block w-36" :placeholder="'Tahun Selesai'"> required</TextInput>
            </div>
          </div>
          <div class="mb-4">
            <label for="role" class="block text-sm font-medium text-[381D4F]">Pilih Profesi</label>
            <SelectMenu id="role" class="mt-1 block w-full" v-model="addForm.role" :options="roleOptions" :dropdownClasses="'overflow-y-auto max-h-36'" placeholder="Pilih salah satu profesi" required></SelectMenu>
          </div>
          <div class="mb-4">
            <label for="description" class="block text-sm font-medium text-[381D4F]">Deskripsi Pengalaman</label>
            <TextArea id="description" v-model="addForm.description" class="mt-2 block w-full" :rows="3" :placeholder="'Jelaskan pengalaman yang anda miliki secara singkat'" required></TextArea>
          </div>
          <div class="mb-4">
            <label for="skillsAndTools" class="block text-sm font-medium text-[381D4F]">Skills dan Tools</label>
            <TextInput id="skillsAndTools" v-model="addForm.skills_and_tools" type="text" class="mt-1 block w-full" :placeholder="'Sebutkan jenis pengalaman dan alat yang kamu miliki (Ex: Leadership, Time Management, Excel, Microsoft Word, etc)'"></TextInput>
          </div>
          <div class="flex justify-end">
            <button type="submit" class="px-4 py-2 bg-[5742F5] text-white rounded-md">Tambah</button>
          </div>
        </form>
      </div>
    </template>
  </Modal>

  <!-- Edit Modal -->
  <Modal :show="showEditModal" @close="showEditModal = false" :maxWidth="'5xl'">
    <template v-slot>
      <div class="px-12 py-6">
        <h2 class="text-2xl mb-3 text-[381D4F]">TULISKAN PENGALAMANMU</h2>
        <form @submit.prevent="editApplicantExperience">
          <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-[381D4F]">Pengalaman</label>
            <TextInput id="name" v-model="editForm.name" type="text" class="mt-1 block w-full" :placeholder="'Anda pernah Bekerja sebagai apa? Di perusahaan mana? (Ex: Intern di PT Mencari Cinta Sejati)'" required></TextInput>
          </div>
          <div class="mb-4">
            <label for="location" class="block text-sm font-medium text-[381D4F]">Lokasi</label>
            <TextInput id="location" v-model="editForm.location" type="text" class="mt-1 block w-full" :placeholder="'Dimana lokasi perusahaan anda? (Ex: Malang, Jawa Timur)'" required></TextInput>
          </div>
          <div class="mb-4">
            <label for="startYear" class="block text-sm font-medium text-[381D4F]">Lama Jenjang Karir</label>
            <div class="flex gap-x-12">
              <TextInput id="startYear" v-model="editForm.start_year" type="text" class="mt-1 block w-36" :placeholder="'Tahun Mulai'" required></TextInput>
              <TextInput id="endYear" v-model="editForm.end_year" type="text" class="mt-1 block w-36" :placeholder="'Tahun Selesai'"> required</TextInput>
            </div>
          </div>
          <div class="mb-4">
            <label for="role" class="block text-sm font-medium text-[381D4F]">Pilih Profesi</label>
            <SelectMenu id="role" class="mt-1 block w-full" v-model="editForm.role" :options="roleOptions" :dropdownClasses="'overflow-y-auto max-h-36'" placeholder="Pilih salah satu profesi" required></SelectMenu>
          </div>
          <div class="mb-4">
            <label for="description" class="block text-sm font-medium text-[381D4F]">Deskripsi Pengalaman</label>
            <TextArea id="description" v-model="editForm.description" class="mt-2 block w-full" :rows="3" :placeholder="'Jelaskan pengalaman yang anda miliki secara singkat'" required></TextArea>
          </div>
          <div class="mb-4">
            <label for="skillsAndTools" class="block text-sm font-medium text-[381D4F]">Skills dan Tools</label>
            <TextInput id="skillsAndTools" v-model="editForm.skills_and_tools" type="text" class="mt-1 block w-full" :placeholder="'Sebutkan jenis pengalaman dan alat yang kamu miliki (Ex: Leadership, Time Management, Excel, Microsoft Word, etc)'"></TextInput>
          </div>
          <div class="flex justify-end">
            <button type="submit" class="px-4 py-2 bg-[5742F5] text-white rounded-md">Simpan</button>
          </div>
        </form>
      </div>
    </template>
  </Modal>


  <Modal :show="showDeleteModal" @close="showDeleteModal = false" :maxWidth="'lg'">
    <template v-slot>
      <div class="px-12 py-6">
        <h2 class="text-2xl mb-3 text-[#381D4F]">Hapus Pengalaman</h2>
        <p>Apakah Anda yakin ingin menghapus pengalaman ini?</p>
        <div class="flex justify-end mt-4">
          <button @click="deleteApplicantExperience" class="px-4 py-2 bg-[#5742F5] text-white rounded-md">Hapus</button>
        </div>
      </div>
    </template>
  </Modal>
</template>

<script setup>
import { ref, watch, computed } from 'vue';
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

const showAddModal = ref(false);
const showEditModal = ref(false);
const showAllExperiences = ref(false);
const showDeleteModal = ref(false);

const addForm = ref({
  name: '',
  location: '',
  start_year: '',
  end_year: '',
  role: '',
  description: '',
  skills_and_tools: '',
});

const editForm = ref({
  name: '',
  location: '',
  start_year: '',
  end_year: '',
  role: '',
  description: '',
  skills_and_tools: '',
});

const experienceCount = computed(() => user.value.applicant.experiences.length);

const displayedExperiences = computed(() => {
  if (showAllExperiences.value) {
    return user.value.applicant.experiences;
  }
  return user.value.applicant.experiences.slice(0, 1);
});

const experienceToDelete = ref(null);

const confirmDelete = (experience) => {
  experienceToDelete.value = experience;
  showDeleteModal.value = true;
};

const toggleShowMore = () => {
  showAllExperiences.value = !showAllExperiences.value;
};

const openEditModal = (experience) => {
  editForm.value = { ...experience };
  showEditModal.value = true;
};

// Methods
const addApplicantExperience = async () => {
  try {
    const response = await userStore.addExperience(addForm.value);
    if (response.success) {
      addForm.value = {
        name: '',
        location: '',
        start_year: '',
        end_year: '',
        role: '',
        description: '',
        skills_and_tools: '',
      };
      showAddModal.value = false;
    } else {
      alert(response.message);
    }
  } catch (error) {
    console.error('Error adding applicant experience', error);
    alert('Failed to add experience. Please try again.');
  }
};

const editApplicantExperience = async () => {
  try {
    const response = await userStore.updateExperience(editForm.value.id ,editForm.value);
    if (response.success) {
      showEditModal.value = false;
    } else {
      alert(response.message);
    }
  } catch (error) {
    console.error('Error updating applicant experience', error);
    alert('Failed to update experience. Please try again.');
  }
};

const deleteApplicantExperience = async () => {
  try {
    const response = await userStore.deleteExperience(experienceToDelete.value.id);
    if (response.success) {
      showDeleteModal.value = false;
      experienceToDelete.value = null;
    } else {
      alert(response.message);
    }
  } catch (error) {
    console.error('Error deleting applicant experience', error);
    alert('Failed to delete experience. Please try again.');
  }
};
</script>