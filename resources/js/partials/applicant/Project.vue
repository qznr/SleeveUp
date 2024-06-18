<template>
  <div class="bg-white max-w-screen-xl mx-6 xl:mx-auto p-8 rounded-xl shadow-xl relative" id="#project">
    <div class="flex mb-3 items-center justify-between">
      <h1 class="text-3xl text-[381D4F] font-semibold">Project</h1>
      <button class="col-span-12 lg:col-span-1 flex text-[5742F5]" @click="showAddModal = true">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
          <path fill-rule="evenodd" d="M5.625 1.5H9a3.75 3.75 0 0 1 3.75 3.75v1.875c0 1.036.84 1.875 1.875 1.875H16.5a3.75 3.75 0 0 1 3.75 3.75v7.875c0 1.035-.84 1.875-1.875 1.875H5.625a1.875 1.875 0 0 1-1.875-1.875V3.375c0-1.036.84-1.875 1.875-1.875ZM12.75 12a.75.75 0 0 0-1.5 0v2.25H9a.75.75 0 0 0 0 1.5h2.25V18a.75.75 0 0 0 1.5 0v-2.25H15a.75.75 0 0 0 0-1.5h-2.25V12Z" clip-rule="evenodd" />
          <path d="M14.25 5.25a5.23 5.23 0 0 0-1.279-3.434 9.768 9.768 0 0 1 6.963 6.963A5.23 5.23 0 0 0 16.5 7.5h-1.875a.375.375 0 0 1-.375-.375V5.25Z" />
        </svg>
      </button>
    </div>

    <!-- Projects -->
    <div v-if="user.applicant.projects">
        <div v-for="(project, index) in displayedProjects" :key="index" class="flex py-4 border-t border-gray-400">
          <div class="text-[381D4F] px-8">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" fill="none" class="size-8">
              <path d="M23 40H7C5.34315 40 4 38.6569 4 37V11C4 9.34315 5.34315 8 7 8H41C42.6569 8 44 9.34315 44 11V25.8824" stroke="#381D4F" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/>
              <path d="M4 11C4 9.34315 5.34315 8 7 8H41C42.6569 8 44 9.34315 44 11V20H4V11Z" fill="#381D4F" stroke="#381D4F" stroke-width="4"/>
              <path d="M34 33L30 37L34 41" stroke="#381D4F" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/>
              <path d="M40 33L44 37L40 41" stroke="#381D4F" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/>
              <circle r="2" transform="matrix(-1.31134e-07 -1 -1 1.31134e-07 10 14)" fill="#FFF"/>
              <circle r="2" transform="matrix(-1.31134e-07 -1 -1 1.31134e-07 16 14)" fill="#FFF"/>
            </svg>
          </div>
          <div class="justify-between w-full">
            <h2 class="text-[381D4F] text-xl font-semibold"> {{ project.name }}</h2>
            <div class="flex py-2 max-w-md justify-between items-center">
              <div class="flex">
                <div class="group px-3 py-1 bg-[25B4C4] text-gray-100 rounded-2xl inline-flex items-center font-semibold capitalize">
                  <p>{{ project.type }}</p>
                </div>
              </div>
              <div class="group px-3 py-1 bg-[FF8AAF] text-gray-100 rounded-2xl inline-flex items-center font-semibold capitalize">
                <p>{{ project.start_month }} {{ project.start_year }} - {{ project.end_month }} {{ project.end_year }}</p>
              </div>
            </div>
            <p class="text-[381D4F] text-wrap break-words whitespace-pre-wrap py-2 mb-2">{{ project.description }}</p>
            <a :href="project.link">
              <div class="flex text-[5742F5] gap-x-2">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                  <path fill-rule="evenodd" d="M15.75 2.25H21a.75.75 0 0 1 .75.75v5.25a.75.75 0 0 1-1.5 0V4.81L8.03 17.03a.75.75 0 0 1-1.06-1.06L19.19 3.75h-3.44a.75.75 0 0 1 0-1.5Zm-10.5 4.5a1.5 1.5 0 0 0-1.5 1.5v10.5a1.5 1.5 0 0 0 1.5 1.5h10.5a1.5 1.5 0 0 0 1.5-1.5V10.5a.75.75 0 0 1 1.5 0v8.25a3 3 0 0 1-3 3H5.25a3 3 0 0 1-3-3V8.25a3 3 0 0 1 3-3h8.25a.75.75 0 0 1 0 1.5H5.25Z" clip-rule="evenodd" />
                </svg>
                <p class="font-light">Link Project</p>
              </div>
            </a>
          </div>

          <!-- Buttons -->
          <div class="flex flex-col">
            <button class="col-span-12 lg:col-span-1 flex justify-end text-[5742F5]" @click="openEditModal(project)">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                <path d="M21.731 2.269a2.625 2.625 0 0 0-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 0 0 0-3.712ZM19.513 8.199l-3.712-3.712-8.4 8.4a5.25 5.25 0 0 0-1.32 2.214l-.8 2.685a.75.75 0 0 0 .933.933l2.685-.8a5.25 5.25 0 0 0 2.214-1.32l8.4-8.4Z" />
                <path d="M5.25 5.25a3 3 0 0 0-3 3v10.5a3 3 0 0 0 3 3h10.5a3 3 0 0 0 3-3V13.5a.75.75 0 0 0-1.5 0v5.25a1.5 1.5 0 0 1-1.5 1.5H5.25a1.5 1.5 0 0 1-1.5-1.5V8.25a1.5 1.5 0 0 1 1.5-1.5h5.25a.75.75 0 0 0 0-1.5H5.25Z" />
              </svg>
            </button>
            <button class="mt-3 col-span-12 lg:col-span-1 flex justify-end text-[5742F5]" @click="confirmDelete(project)">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                <path fill-rule="evenodd" d="M16.5 4.478v.227a48.816 48.816 0 0 1 3.878.512.75.75 0 1 1-.256 1.478l-.209-.035-1.005 13.07a3 3 0 0 1-2.991 2.77H8.084a3 3 0 0 1-2.991-2.77L4.087 6.66l-.209.035a.75.75 0 0 1-.256-1.478A48.567 48.567 0 0 1 7.5 4.705v-.227c0-1.564 1.213-2.9 2.816-2.951a52.662 52.662 0 0 1 3.369 0c1.603.051 2.815 1.387 2.815 2.951Zm-6.136-1.452a51.196 51.196 0 0 1 3.273 0C14.39 3.05 15 3.684 15 4.478v.113a49.488 49.488 0 0 0-6 0v-.113c0-.794.609-1.428 1.364-1.452Zm-.355 5.945a.75.75 0 1 0-1.5.058l.347 9a.75.75 0 1 0 1.499-.058l-.346-9Zm5.48.058a.75.75 0 1 0-1.498-.058l-.347 9a.75.75 0 0 0 1.5.058l.345-9Z" clip-rule="evenodd" />
              </svg>
            </button>
          </div>
        </div>
      <div class="flex border-t border-gray-400 justify-center pt-8" v-if="projectCount > 1">
        <button @click="toggleShowMore" class="group px-3 py-1 bg-[#5742F5] text-gray-100 rounded-md inline-flex items-center font-semibold capitalize">
          <p class='pr-1'>{{ showAllProjects ? 'Tampilkan Lebih Sedikit' : 'Lihat Selengkapnya' }}</p>
        </button>
      </div>
    </div>

    <div class="flex justify-center p-16" v-if="!user.applicant.projects[0]">
      Project kamu masih kosong, segera diisi yuk!
    </div>

  </div>


  <!-- Add Modal -->
  <Modal :show="showAddModal" @close="showAddModal = false" :maxWidth="'5xl'">
    <template v-slot>
      <div class="px-12 py-6">
        <h2 class="text-2xl mb-3 text-[381D4F]">PORTOFOLIO</h2>
        <form @submit.prevent="addApplicantProject">
          <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-[381D4F]">Nama Project</label>
            <TextInput id="name" v-model="addForm.name" type="text" class="mt-1 block w-full" :placeholder="'Tuliskan nama project yang anda kerjakan)'" required></TextInput>
          </div>
          <div class="mb-4">
            <label for="type" class="block text-sm font-medium text-[381D4F]">Pilih Jenis Project</label>
            <SelectMenu id="type" class="mt-1 block w-full" v-model="addForm.type" :options="typeOptions" :dropdownClasses="'overflow-y-auto max-h-36'" placeholder="Pilih salah satu jenis project yang anda kerjakan" required></SelectMenu>
          </div>
          <div class="mb-4">
            <label for="Durasi" class="block text-sm font-medium text-[381D4F]">Durasi Pengerjaan Project</label>
            <div class="flex flex-wrap sm:flex-nowrap gap-4 sm:gap-x-12">
              <TextInput id="startMonth" v-model="addForm.start_month" type="text" class="mt-1 block" :placeholder="'Bulan'" required></TextInput>
              <TextInput id="startYear" v-model="addForm.start_year" type="text" class="mt-1 block" :placeholder="'Tahun'" required> </TextInput>
              <TextInput id="endMonth" v-model="addForm.end_month" type="text" class="mt-1 block" :placeholder="'Bulan'" required></TextInput>
              <TextInput id="endYear" v-model="addForm.end_year" type="text" class="mt-1 block" :placeholder="'Tahun'" required> </TextInput>
            </div>
          </div>
          <div class="mb-4">
            <label for="description" class="block text-sm font-medium text-[381D4F]">Deskripsi Project</label>
            <TextArea id="description" v-model="addForm.description" class="mt-2 block w-full" :rows="3" :placeholder="'Jelaskan tentang project yang anda kerjakan secara singkat, mulai dari alat maupun bahasa yang digunakan, hingga tujuan project tersebut.'" required></TextArea>
          </div>
          <div class="mb-4">
            <label for="link" class="block text-sm font-medium text-[381D4F]">Link Project atau Github</label>
            <TextInput id="link" v-model="addForm.link" type="text" class="mt-1 block w-full" :placeholder="'Isi link dari project atau github anda'"></TextInput>
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
        <h2 class="text-2xl mb-3 text-[381D4F]">PORTOFOLIO</h2>
        <form @submit.prevent="editApplicantProject">
          <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-[381D4F]">Nama Project</label>
            <TextInput id="name" v-model="editForm.name" type="text" class="mt-1 block w-full" :placeholder="'Tuliskan nama project yang anda kerjakan)'" required></TextInput>
          </div>
          <div class="mb-4">
            <label for="type" class="block text-sm font-medium text-[381D4F]">Pilih Jenis Project</label>
            <SelectMenu id="type" class="mt-1 block w-full" v-model="editForm.type" :options="typeOptions" :dropdownClasses="'overflow-y-auto max-h-36'" placeholder="Pilih salah satu jenis project yang anda kerjakan" required></SelectMenu>
          </div>
          <div class="mb-4">
            <label for="Durasi" class="block text-sm font-medium text-[381D4F]">Durasi Pengerjaan Project</label>
            <div class="flex flex-wrap sm:flex-nowrap gap-4 sm:gap-x-12">
              <TextInput id="startMonth" v-model="editForm.start_month" type="text" class="mt-1 block w-full sm:w-auto" :placeholder="'Bulan'" required></TextInput>
              <TextInput id="startYear" v-model="editForm.start_year" type="text" class="mt-1 block w-full sm:w-auto" :placeholder="'Tahun'" required></TextInput>
              <TextInput id="endMonth" v-model="editForm.end_month" type="text" class="mt-1 block w-full sm:w-auto" :placeholder="'Bulan'" required></TextInput>
              <TextInput id="endYear" v-model="editForm.end_year" type="text" class="mt-1 block w-full sm:w-auto" :placeholder="'Tahun'" required></TextInput>
            </div>
          </div>
          <div class="mb-4">
            <label for="description" class="block text-sm font-medium text-[381D4F]">Deskripsi Project</label>
            <TextArea id="description" v-model="editForm.description" class="mt-2 block w-full" :rows="3" :placeholder="'Jelaskan tentang project yang anda kerjakan secara singkat, mulai dari alat maupun bahasa yang digunakan, hingga tujuan project tersebut.'" required></TextArea>
          </div>
          <div class="mb-4">
            <label for="link" class="block text-sm font-medium text-[381D4F]">Link Project atau Github</label>
            <TextInput id="link" v-model="editForm.link" type="text" class="mt-1 block w-full" :placeholder="'Isi link dari project atau github anda'"></TextInput>
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
      <div class="px-4 py-6 flex">
        <div class="flex items-center justify-center w-12 h-12 mx-auto flex-none bg-red-100 rounded-full">
          <svg xmlns="http://www.w3.org/2000/svg" class=" size-6 text-red-600" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
          </svg>
        </div>
        <div class="w-full mt-2 ml-5 text-gray-800">
          <h2 class="text-xl mb-3 font-semibold ">Hapus Project</h2>
          <p>Apakah Anda yakin ingin menghapus project ini?</p>
          <div class="flex justify-end mt-4">
            <button @click="deleteApplicantProject" class="px-4 py-2 bg-red-600 text-white rounded-md ring-offset-2 ring-red-600">Hapus</button>
          </div>
        </div>
      </div>
    </template>
  </Modal>
</template>

<script setup>
import { ref, watch, computed } from 'vue';
import { useUserStore } from '../../stores/userStore';
import Modal from '../../components/Modal.vue';
import TextInput from '../../components/TextInput.vue'
import SelectMenu from '../../components/SelectMenu.vue'
import TextArea from '../../components/TextArea.vue'

const userStore = useUserStore();
const user = ref(userStore.user);

const typeOptions = ref([
  { value: 'Website', label: 'Website' },
  { value: 'Mobile Application', label: 'Mobile Application' },
  { value: 'Data Analysis', label: 'Data Analysis' },
  { value: 'Machine Learning Model', label: 'Machine Learning Model' },
  { value: 'API Development', label: 'API Development' },
  { value: 'Open Source Contribution', label: 'Open Source Contribution' },
  { value: 'Game Development', label: 'Game Development' },
  { value: 'Research Project', label: 'Research Project' },
  { value: 'Automation Script', label: 'Automation Script' },
  { value: 'DevOps Pipeline', label: 'DevOps Pipeline' },
  { value: 'IoT Project', label: 'IoT Project' },
  { value: 'Cloud Deployment', label: 'Cloud Deployment' },
  { value: 'Blockchain Development', label: 'Blockchain Development' },
  { value: 'Cybersecurity Implementation', label: 'Cybersecurity Implementation' },
  { value: 'AR/VR Application', label: 'AR/VR Application' },
]);

watch(() => userStore.user, (newUser) => {
  user.value = newUser;
});

const showAddModal = ref(false);
const showEditModal = ref(false);
const showAllProjects = ref(false);
const showDeleteModal = ref(false);

const addForm = ref({
  name: '',
  description: '',
  type: '',
  start_month: '',
  start_year: '',
  end_month: '',
  end_year: '',
  link: ''
});

const editForm = ref({
  name: '',
  description: '',
  type: '',
  start_month: '',
  start_year: '',
  end_month: '',
  end_year: '',
  link: ''
});

const projectCount = computed(() => user.value.applicant.projects.length);

const displayedProjects = computed(() => {
  if (showAllProjects.value) {
    return user.value.applicant.projects;
  }
  return user.value.applicant.projects.slice(0, 1);
});

const projectToDelete = ref(null);

const confirmDelete = (project) => {
  projectToDelete.value = project;
  showDeleteModal.value = true;
};

const toggleShowMore = () => {
  showAllProjects.value = !showAllProjects.value;
};

const openEditModal = (project) => {
  editForm.value = { ...project };
  showEditModal.value = true;
};

// Methods
const addApplicantProject = async () => {
  try {
    console.log(addForm.value)
    const response = await userStore.addProject(addForm.value);
    if (response.success) {
      addForm.value = {
        name: '',
        description: '',
        type: '',
        start_month: '',
        start_year: '',
        end_month: '',
        end_year: '',
        link: ''
      };
      showAddModal.value = false;
    } else {
      alert(response.message);
    }
  } catch (error) {
    console.error('Error adding applicant project', error);
    alert('Failed to add project. Please try again.');
  }
};

const editApplicantProject = async () => {
  try {
    const response = await userStore.updateProject(editForm.value.id ,editForm.value);
    if (response.success) {
      showEditModal.value = false;
    } else {
      alert(response.message);
    }
  } catch (error) {
    console.error('Error updating applicant project', error);
    alert('Failed to update project. Please try again.');
  }
};

const deleteApplicantProject = async () => {
  try {
    const response = await userStore.deleteProject(projectToDelete.value.id);
    console.log(response.data)
    if (response.success) {
      showDeleteModal.value = false;
      projectToDelete.value = null;
    } else {
      alert(response.message);
    }
  } catch (error) {
    console.error('Error deleting applicant project', error);
    alert('Failed to delete project. Please try again.');
  }
};
</script>