<template>
  <div class="bg-white max-w-screen-xl mx-auto p-8 rounded-xl shadow-xl relative mb-6" id="#certificate">
    <div class="flex mb-3 items-center justify-between">
      <h1 class="text-3xl text-[381D4F] font-semibold">Pelatihan & Sertifikasi</h1>
      <button class="col-span-12 lg:col-span-1 flex text-[5742F5]" @click="showAddModal = true">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
          <path fill-rule="evenodd" d="M5.625 1.5H9a3.75 3.75 0 0 1 3.75 3.75v1.875c0 1.036.84 1.875 1.875 1.875H16.5a3.75 3.75 0 0 1 3.75 3.75v7.875c0 1.035-.84 1.875-1.875 1.875H5.625a1.875 1.875 0 0 1-1.875-1.875V3.375c0-1.036.84-1.875 1.875-1.875ZM12.75 12a.75.75 0 0 0-1.5 0v2.25H9a.75.75 0 0 0 0 1.5h2.25V18a.75.75 0 0 0 1.5 0v-2.25H15a.75.75 0 0 0 0-1.5h-2.25V12Z" clip-rule="evenodd" />
          <path d="M14.25 5.25a5.23 5.23 0 0 0-1.279-3.434 9.768 9.768 0 0 1 6.963 6.963A5.23 5.23 0 0 0 16.5 7.5h-1.875a.375.375 0 0 1-.375-.375V5.25Z" />
        </svg>
      </button>
    </div>

    <!-- Certificates -->
    <div v-if="user.applicant.certificates">
        <div v-for="(certificate, index) in displayedCertificates" :key="index" class="flex py-4 border-t border-gray-400">
          <div class="text-[381D4F] px-8">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-8">
              <path fill-rule="evenodd" d="M8.603 3.799A4.49 4.49 0 0 1 12 2.25c1.357 0 2.573.6 3.397 1.549a4.49 4.49 0 0 1 3.498 1.307 4.491 4.491 0 0 1 1.307 3.497A4.49 4.49 0 0 1 21.75 12a4.49 4.49 0 0 1-1.549 3.397 4.491 4.491 0 0 1-1.307 3.497 4.491 4.491 0 0 1-3.497 1.307A4.49 4.49 0 0 1 12 21.75a4.49 4.49 0 0 1-3.397-1.549 4.49 4.49 0 0 1-3.498-1.306 4.491 4.491 0 0 1-1.307-3.498A4.49 4.49 0 0 1 2.25 12c0-1.357.6-2.573 1.549-3.397a4.49 4.49 0 0 1 1.307-3.497 4.49 4.49 0 0 1 3.497-1.307Zm7.007 6.387a.75.75 0 1 0-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 0 0-1.06 1.06l2.25 2.25a.75.75 0 0 0 1.14-.094l3.75-5.25Z" clip-rule="evenodd" />
            </svg>
          </div>
          <div class="justify-between w-full">
            <h2 class="text-[381D4F] text-xl font-semibold"> {{ certificate.name }}</h2>
            <div class="flex py-2 max-w-md justify-between items-center">
              <div class="flex">
                <div class="group px-3 py-1 bg-[25B4C4] text-gray-100 rounded-2xl inline-flex items-center font-semibold capitalize">
                  <p>{{ certificate.type }}</p>
                </div>
              </div>
              <div class="group px-3 py-1 bg-[FF8AAF] text-gray-100 rounded-2xl inline-flex items-center font-semibold capitalize">
                <p>{{ certificate.start_month }} {{ certificate.start_year }} - {{ certificate.end_month }} {{ certificate.end_year }}</p>
              </div>
            </div>
            <div class="flex mb-2">
              <p class="text-[381D4F] font-semibold mr-1">Skills:</p>
              <p class="text-[381D4F] text-wrap break-words whitespace-pre-wrap"> {{ certificate.skills }}</p>
            </div>
            <div class="flex mb-2">
              <p class="text-[381D4F] font-semibold mr-1">Tools:</p>
              <p class="text-[381D4F] text-wrap break-words whitespace-pre-wrap"> {{ certificate.tools }}</p>
            </div>
          </div>

          <!-- Buttons -->
          <div class="flex flex-col">
            <button class="col-span-12 lg:col-span-1 flex justify-end text-[5742F5]" @click="openEditModal(certificate)">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                <path d="M21.731 2.269a2.625 2.625 0 0 0-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 0 0 0-3.712ZM19.513 8.199l-3.712-3.712-8.4 8.4a5.25 5.25 0 0 0-1.32 2.214l-.8 2.685a.75.75 0 0 0 .933.933l2.685-.8a5.25 5.25 0 0 0 2.214-1.32l8.4-8.4Z" />
                <path d="M5.25 5.25a3 3 0 0 0-3 3v10.5a3 3 0 0 0 3 3h10.5a3 3 0 0 0 3-3V13.5a.75.75 0 0 0-1.5 0v5.25a1.5 1.5 0 0 1-1.5 1.5H5.25a1.5 1.5 0 0 1-1.5-1.5V8.25a1.5 1.5 0 0 1 1.5-1.5h5.25a.75.75 0 0 0 0-1.5H5.25Z" />
              </svg>
            </button>
            <button class="mt-3 col-span-12 lg:col-span-1 flex justify-end text-[5742F5]" @click="confirmDelete(certificate)">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                <path fill-rule="evenodd" d="M16.5 4.478v.227a48.816 48.816 0 0 1 3.878.512.75.75 0 1 1-.256 1.478l-.209-.035-1.005 13.07a3 3 0 0 1-2.991 2.77H8.084a3 3 0 0 1-2.991-2.77L4.087 6.66l-.209.035a.75.75 0 0 1-.256-1.478A48.567 48.567 0 0 1 7.5 4.705v-.227c0-1.564 1.213-2.9 2.816-2.951a52.662 52.662 0 0 1 3.369 0c1.603.051 2.815 1.387 2.815 2.951Zm-6.136-1.452a51.196 51.196 0 0 1 3.273 0C14.39 3.05 15 3.684 15 4.478v.113a49.488 49.488 0 0 0-6 0v-.113c0-.794.609-1.428 1.364-1.452Zm-.355 5.945a.75.75 0 1 0-1.5.058l.347 9a.75.75 0 1 0 1.499-.058l-.346-9Zm5.48.058a.75.75 0 1 0-1.498-.058l-.347 9a.75.75 0 0 0 1.5.058l.345-9Z" clip-rule="evenodd" />
              </svg>
            </button>
          </div>
        </div>
      <div class="flex border-t border-gray-400 justify-center pt-8" v-if="certificateCount > 1">
        <button @click="toggleShowMore" class="group px-3 py-1 bg-[#5742F5] text-gray-100 rounded-md inline-flex items-center font-semibold capitalize">
          <p class='pr-1'>{{ showAllCertificates ? 'Tampilkan Lebih Sedikit' : 'Lihat Selengkapnya' }}</p>
        </button>
      </div>
    </div>

    <div class="flex justify-center p-16" v-if="!user.applicant.certificates[0]">
      Sertifikat kamu masih kosong, segera diisi yuk!
    </div>

  </div>


  <!-- Add Modal -->
  <Modal :show="showAddModal" @close="showAddModal = false" :maxWidth="'5xl'">
    <template v-slot>
      <div class="px-12 py-6">
        <h2 class="text-2xl mb-3 text-[381D4F]">PELATIHAN DAN SERTIFIKAT</h2>
        <form @submit.prevent="addApplicantCertificate">
          <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-[381D4F]">Nama Pelatihan/Sertifikat</label>
            <TextInput id="name" v-model="addForm.name" type="text" class="mt-1 block w-full" :placeholder="'Tuliskan pelatihan/sertifikat yang pernah anda ikuti (ex: Management Cloud AWS Academy)'" required></TextInput>
          </div>
          <div class="mb-4">
            <label for="type" class="block text-sm font-medium text-[381D4F]">Pilih Jenis Pelatihan/Sertifikat</label>
            <!-- <TextInput id="type" v-model="addForm.type" type="text" class="mt-1 block w-full" :placeholder="'Pilih salah satu jenis pelatihan/sertifikasi yang pernah anda ikuti'" required></TextInput> -->
            <SelectMenu id="type" class="mt-1 block w-full" v-model="addForm.type" :options="typeOptions" :dropdownClasses="'overflow-y-auto max-h-36'" placeholder="Pilih salah satu jenis pelatihan/sertifikasi yang pernah anda ikuti" required></SelectMenu>
          </div>
          <div class="mb-4">
            <label for="Durasi" class="block text-sm font-medium text-[381D4F]">Durasi Pelatihan/Sertifikat</label>
            <div class="flex gap-x-12">
              <TextInput id="startMonth" v-model="addForm.start_month" type="text" class="mt-1 block" :placeholder="'Bulan'" required></TextInput>
              <TextInput id="startYear" v-model="addForm.start_year" type="text" class="mt-1 block" :placeholder="'Tahun'" required> </TextInput>
              <TextInput id="endMonth" v-model="addForm.end_month" type="text" class="mt-1 block" :placeholder="'Bulan'" required></TextInput>
              <TextInput id="endYear" v-model="addForm.end_year" type="text" class="mt-1 block" :placeholder="'Tahun'" required> </TextInput>
            </div>
          </div>
          <div class="mb-4">
            <label for="skills" class="block text-sm font-medium text-[381D4F]">Kemampuan</label>
            <TextInput id="skills" v-model="addForm.skills" type="text" class="mt-1 block w-full" :placeholder="'Sebutkan skill apa saja yang anda dapatkan dari pelatihan/sertifikat tersebut (Ex: Python, C++, Leadership, etc)'" required></TextInput>
          </div>
          <div class="mb-4">
            <label for="description" class="block text-sm font-medium text-[381D4F]">Alat atau Aplikasi</label>
            <TextInput id="skills" v-model="addForm.tools" type="text" class="mt-1 block w-full" :placeholder="'Sebutkan alat apa saja yang anda gunakan pada pelatihan/sertifikasi tersebut (Ex: VIM, Notepad, Google API, etc)'" required></TextInput>
          </div>
          <div class="mb-4">
            <label for="link" class="block text-sm font-medium text-[381D4F]">Link Sertifikat</label>
            <TextInput id="link" v-model="addForm.link" type="text" class="mt-1 block w-full" :placeholder="'Isi link sertifikat atau bukti pelatihan anda'"></TextInput>
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
        <h2 class="text-2xl mb-3 text-[381D4F]">PELATIHAN DAN SERTIFIKAT</h2>
        <form @submit.prevent="editApplicantCertificate">
          <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-[381D4F]">Nama Pelatihan/Sertifikat</label>
            <TextInput id="name" v-model="editForm.name" type="text" class="mt-1 block w-full" :placeholder="'Tuliskan pelatihan/sertifikat yang pernah anda ikuti (ex: Management Cloud AWS Academy)'" required></TextInput>
          </div>
          <div class="mb-4">
            <label for="type" class="block text-sm font-medium text-[381D4F]">Pilih Jenis Pelatihan/Sertifikat</label>
            <SelectMenu id="type" class="mt-1 block w-full" v-model="editForm.type" :options="typeOptions" :dropdownClasses="'overflow-y-auto max-h-36'" placeholder="Pilih salah satu jenis pelatihan/sertifikasi yang pernah anda ikuti" required></SelectMenu>
          </div>
          <div class="mb-4">
            <label for="Durasi" class="block text-sm font-medium text-[381D4F]">Durasi Pelatihan/Sertifikat</label>
            <div class="flex gap-x-12">
              <TextInput id="startMonth" v-model="editForm.start_month" type="text" class="mt-1 block" :placeholder="'Bulan'" required></TextInput>
              <TextInput id="startYear" v-model="editForm.start_year" type="text" class="mt-1 block" :placeholder="'Tahun'" required> </TextInput>
              <TextInput id="endMonth" v-model="editForm.end_month" type="text" class="mt-1 block" :placeholder="'Bulan'" required></TextInput>
              <TextInput id="endYear" v-model="editForm.end_year" type="text" class="mt-1 block" :placeholder="'Tahun'" required> </TextInput>
            </div>
          </div>
          <div class="mb-4">
            <label for="skills" class="block text-sm font-medium text-[381D4F]">Kemampuan</label>
            <TextInput id="skills" v-model="editForm.skills" type="text" class="mt-1 block w-full" :placeholder="'Sebutkan skill apa saja yang anda dapatkan dari pelatihan/sertifikat tersebut (Ex: Python, C++, Leadership, etc)'" required></TextInput>
          </div>
          <div class="mb-4">
            <label for="description" class="block text-sm font-medium text-[381D4F]">Alat atau Aplikasi</label>
            <TextInput id="skills" v-model="editForm.tools" type="text" class="mt-1 block w-full" :placeholder="'Sebutkan alat apa saja yang anda gunakan pada pelatihan/sertifikasi tersebut (Ex: VIM, Notepad, Google API, etc)'" required></TextInput>
          </div>
          <div class="mb-4">
            <label for="link" class="block text-sm font-medium text-[381D4F]">Link Sertifikat</label>
            <TextInput id="link" v-model="editForm.link" type="text" class="mt-1 block w-full" :placeholder="'Isi link sertifikat atau bukti pelatihan anda'"></TextInput>
          </div>
          <div class="flex justify-end">
            <button type="submit" class="px-4 py-2 bg-[5742F5] text-white rounded-md">Simpan</button>
          </div>
        </form>
      </div>
    </template>
  </Modal>

  <Modal :show="showDeleteModal" @close="showDeleteModal = false" :maxWidth="'lg'">
    <div class="px-4 py-6 flex">
        <div class="flex items-center justify-center w-12 h-12 mx-auto flex-none bg-red-100 rounded-full">
          <svg xmlns="http://www.w3.org/2000/svg" class=" size-6 text-red-600" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
          </svg>
        </div>
        <div class="w-full mt-2 ml-5 text-gray-800">
          <h2 class="text-xl mb-3 font-semibold ">Hapus Sertufikat</h2>
          <p>Apakah Anda yakin ingin menghapus sertifikat ini?</p>
          <div class="flex justify-end mt-4">
            <button @click="deleteApplicantCertificate" class="px-4 py-2 bg-red-600 text-white rounded-md ring-offset-2 ring-red-600">Hapus</button>
          </div>
        </div>
      </div>
  </Modal>
</template>

<script setup>
import { ref, watch, computed } from 'vue';
import { useUserStore } from '../../stores/userStore';
import Modal from '../../components/Modal.vue';
import TextInput from '../../components/TextInput.vue'
import SelectMenu from '../../components/SelectMenu.vue'

const userStore = useUserStore();
const user = ref(userStore.user);

const typeOptions = ref([
  { value: 'Online Course', label: 'Online Course' },
  { value: 'Professional Certification', label: 'Professional Certification' },
  { value: 'University Degree', label: 'University Degree' },
  { value: 'Technical Training', label: 'Technical Training' },
  { value: 'Workshops and Seminar', label: 'Workshops and Seminar' },
  { value: 'Industry-Specific Certification', label: 'Industry-Specific Certification' },
  { value: 'Language Proficiency Certificate', label: 'Language Proficiency Certificate' },
  { value: 'Safety and Compliance Certification', label: 'Safety and Compliance Certification' },
  { value: 'Leadership and Management Training', label: 'Leadership and Management Training' },
  { value: 'Software Proficiency Certificate', label: 'Software Proficiency Certificate' },
  { value: 'Continuing Education Units (CEUs)', label: 'Continuing Education Units (CEUs)' },
  { value: 'Internship Certification', label: 'Internship Certification' },
  { value: 'Volunteer Service Certificate', label: 'Volunteer Service Certificate' },
  { value: 'Research and Publication', label: 'Research and Publication' },
  { value: 'Creative and Performing Arts Certification', label: 'Creative and Performing Arts Certification' },
]);

watch(() => userStore.user, (newUser) => {
  user.value = newUser;
});

const showAddModal = ref(false);
const showEditModal = ref(false);
const showAllCertificates = ref(false);
const showDeleteModal = ref(false);

const addForm = ref({
  name: '',
  type: '',
  start_month: '',
  start_year: '',
  end_month: '',
  end_year: '',
  skills: '',
  tools: '',
  link: '',
});

const editForm = ref({
  name: '',
  type: '',
  start_month: '',
  start_year: '',
  end_month: '',
  end_year: '',
  skills: '',
  tools: '',
  link: '',
});

const certificateCount = computed(() => user.value.applicant.certificates.length);

const displayedCertificates = computed(() => {
  if (showAllCertificates.value) {
    return user.value.applicant.certificates;
  }
  return user.value.applicant.certificates.slice(0, 1);
});

const certificateToDelete = ref(null);

const confirmDelete = (certificate) => {
  certificateToDelete.value = certificate;
  showDeleteModal.value = true;
};

const toggleShowMore = () => {
  showAllCertificates.value = !showAllCertificates.value;
};

const openEditModal = (certificate) => {
  editForm.value = { ...certificate };
  showEditModal.value = true;
};

// Methods
const addApplicantCertificate = async () => {
  try {
    console.log(addForm.value)
    const response = await userStore.addCertificate(addForm.value);
    if (response.success) {
      addForm.value = {
        name: '',
        type: '',
        start_month: '',
        end_year: '',
        start_month: '',
        end_year: '',
        skills: '',
        tools: '',
        link: '',
      };
      showAddModal.value = false;
    } else {
      alert(response.message);
    }
  } catch (error) {
    console.error('Error adding applicant certificate', error);
    alert('Failed to add certificate. Please try again.');
  }
};

const editApplicantCertificate = async () => {
  try {
    const response = await userStore.updateCertificate(editForm.value.id ,editForm.value);
    if (response.success) {
      showEditModal.value = false;
    } else {
      alert(response.message);
    }
  } catch (error) {
    console.error('Error updating applicant certificate', error);
    alert('Failed to update certificate. Please try again.');
  }
};

const deleteApplicantCertificate = async () => {
  try {
    const response = await userStore.deleteCertificate(certificateToDelete.value.id);
    if (response.success) {
      showDeleteModal.value = false;
      certificateToDelete.value = null;
    } else {
      alert(response.message);
    }
  } catch (error) {
    console.error('Error deleting applicant certificate', error);
    alert('Failed to delete certificate. Please try again.');
  }
};
</script>