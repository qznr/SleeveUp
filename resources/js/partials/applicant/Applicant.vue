<template>
  <div class="bg-white max-w-screen-xl mx-6 xl:mx-auto p-8 rounded-xl shadow-xl relative">
    <div class="flex flex-col lg:flex-row gap-x-8">
    <button class="flex-shrink-0  w-24 h-24 sm:w-48 sm:h-48 lg:w-32 lg:h-32 mx-auto rounded-full" @click="showUploadModal = true">
      <img :src="user.img" alt="User Image" class="rounded-full inline-block w-24 h-24 sm:w-48 sm:h-48 lg:w-32 lg:h-32 ">
    </button>
    <div class="flex-grow flex flex-col justify-between">
      <div class="flex flex-col lg:flex-row justify-between mb-2">
        <h1 class="text-3xl my-4 lg:my-0 text-center lg:text-start">{{ user.name }}</h1>
        <div class="flex lg:flex-row justify-between lg:gap-x-10 my-4 lg:my-0 gap-y-3">
          <div :class="genderClass">
            <p>{{ user.gender }}</p>
          </div>
          <div class="px-3 py-1 bg-[5742F5] text-gray-100 rounded-xl inline-flex items-center font-semibold capitalize">
            <p class="pr-1">{{ user.applicant.status }}</p>
          </div>
        </div>
      </div>
      <p class="text-wrap break-words whitespace-pre-wrap">{{ user.applicant.bio }}</p>
      <div class="flex space-x-4 mt-4">
        <div class="flex">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6 mr-2 text-[FF8AAF]">
            <path fill-rule="evenodd" d="m11.54 22.351.07.04.028.016a.76.76 0 0 0 .723 0l.028-.015.071-.041a16.975 16.975 0 0 0 1.144-.742 19.58 19.58 0 0 0 2.683-2.282c1.944-1.99 3.963-4.98 3.963-8.827a8.25 8.25 0 0 0-16.5 0c0 3.846 2.02 6.837 3.963 8.827a19.58 19.58 0 0 0 2.682 2.282 16.975 16.975 0 0 0 1.145.742ZM12 13.5a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" clip-rule="evenodd" />
          </svg>
          <span>{{ user.place_of_birth }}</span>
        </div>
        <div class="flex">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6 mr-2 text-[FF8AAF]">
            <path fill-rule="evenodd" d="M7.5 5.25a3 3 0 0 1 3-3h3a3 3 0 0 1 3 3v.205c.933.085 1.857.197 2.774.334 1.454.218 2.476 1.483 2.476 2.917v3.033c0 1.211-.734 2.352-1.936 2.752A24.726 24.726 0 0 1 12 15.75c-2.73 0-5.357-.442-7.814-1.259-1.202-.4-1.936-1.541-1.936-2.752V8.706c0-1.434 1.022-2.7 2.476-2.917A48.814 48.814 0 0 1 7.5 5.455V5.25Zm7.5 0v.09a49.488 49.488 0 0 0-6 0v-.09a1.5 1.5 0 0 1 1.5-1.5h3a1.5 1.5 0 0 1 1.5 1.5Zm-3 8.25a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Z" clip-rule="evenodd" />
            <path d="M3 18.4v-2.796a4.3 4.3 0 0 0 .713.31A26.226 26.226 0 0 0 12 17.25c2.892 0 5.68-.468 8.287-1.335.252-.084.49-.189.713-.311V18.4c0 1.452-1.047 2.728-2.523 2.923-2.12.282-4.282.427-6.477.427a49.19 49.19 0 0 1-6.477-.427C4.047 21.128 3 19.852 3 18.4Z" />
          </svg>
          <span>{{ user.applicant.current_education_or_work }}</span>
        </div>
      </div>
    </div>
    <button class="flex-shrink-0 flex justify-end text-[5742F5] lg:ml-auto mt-4 lg:mt-0" @click="showModal = true">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
        <path d="M21.731 2.269a2.625 2.625 0 0 0-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 0 0 0-3.712ZM19.513 8.199l-3.712-3.712-8.4 8.4a5.25 5.25 0 0 0-1.32 2.214l-.8 2.685a.75.75 0 0 0 .933.933l2.685-.8a5.25 5.25 0 0 0 2.214-1.32l8.4-8.4Z" />
        <path d="M5.25 5.25a3 3 0 0 0-3 3v10.5a3 3 0 0 0 3 3h10.5a3 3 0 0 0 3-3V13.5a.75.75 0 0 0-1.5 0v5.25a1.5 1.5 0 0 1-1.5 1.5H5.25a1.5 1.5 0 0 1-1.5-1.5V8.25a1.5 1.5 0 0 1 1.5-1.5h5.25a.75.75 0 0 0 0-1.5H5.25Z" />
      </svg>
    </button>
  </div>

    
    <Modal :show="showModal" @close="showModal = false" :maxWidth="'5xl'">
      <template v-slot>
        <div class="px-12 py-6">
          <h2 class="text-2xl mb-4 text-[381D4F]">Ubah Profil</h2>
          <form @submit.prevent="updateApplicant">
            <div class="mb-4">
              <label for="name" class="block text-sm font-medium text-[381D4F]">Name</label>
              <TextInput id="name" v-model="form.name" type="text" class="mt-1 block w-full"></TextInput>
            </div>
            <div class="mb-4">
              <label for="gender" class="block text-sm font-medium text-[381D4F]">Gender</label>
              <SelectMenu id="gender" class="mt-1 block w-full" v-model="form.gender" :options="genderOptions" ></SelectMenu>
            </div>
            <div class="mb-4">
              <label for="bio" class="block text-sm font-medium text-[381D4F]">Bio</label>
              <TextArea id="bio" v-model="form.bio" class="mt-1 block w-full"></TextArea>
            </div>
            <div class="mb-4">
              <label for="status" class="block text-sm font-medium text-[381D4F]">Status</label>
              <SelectMenu id="status" class="mt-1 block w-full" v-model="form.status" :options="statusOptions" ></SelectMenu>
            </div>
            <div class="flex justify-end">
              <button type="submit" class="px-4 py-2 bg-[5742F5] text-white rounded-md">Save</button>
            </div>
          </form>
        </div>
      </template>
    </Modal>

    <Modal :show="showUploadModal" @close="showUploadModal = false" :maxWidth="'lg'">
      <template v-slot>
        <div class="max-w-md mx-auto h-40 rounded-lg border-2 border-dashed flex items-center justify-center my-6">
          <label htmlFor="file" class="cursor-pointer text-center p-4 md:p-8">
              <svg class="w-10 h-10 mx-auto" viewBox="0 0 41 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M12.1667 26.6667C8.48477 26.6667 5.5 23.6819 5.5 20C5.5 16.8216 7.72428 14.1627 10.7012 13.4949C10.5695 12.9066 10.5 12.2947 10.5 11.6667C10.5 7.0643 14.231 3.33334 18.8333 3.33334C22.8655 3.33334 26.2288 6.19709 27.0003 10.0016C27.0556 10.0006 27.1111 10 27.1667 10C31.769 10 35.5 13.731 35.5 18.3333C35.5 22.3649 32.6371 25.7279 28.8333 26.5M25.5 21.6667L20.5 16.6667M20.5 16.6667L15.5 21.6667M20.5 16.6667L20.5 36.6667" stroke="#4F46E5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
              </svg>
              <p class="mt-3 text-gray-700 max-w-xs mx-auto">Click to <span class="font-medium text-indigo-600">Upload your  file</span> or drag and drop your file here</p>
          </label>
          <input id="file" type="file" class="hidden" accept=".jpeg,.jpg,.png" @change="handleFileUpload"/>
        </div>
      </template>
    </Modal>

  </div>
</template>

<script setup>
import { ref, watch, computed} from 'vue';
import { useUserStore } from '../../stores/userStore';
import Modal from '../../components/Modal.vue';
import TextArea from '../../components/TextArea.vue'
import TextInput from '../../components/TextInput.vue'
import SelectMenu from '../../components/SelectMenu.vue'


const userStore = useUserStore();
const user = ref(userStore.user);

watch(() => userStore.user, (newUser) => {
  user.value = newUser;
});


const showModal = ref(false);
const showUploadModal = ref(false);

const form = ref({
  name: user.value.name,
  gender: user.value.gender,
  bio: user.value.applicant.bio,
  status: user.value.applicant.status
});

const genderOptions = ref([
  { value: 'female', label: 'Female' },
  { value: 'male', label: 'Male' },
]);

console.log(user.value.gender.toLowerCase())

const genderClass = computed(() => {
  return user.value.gender.toLowerCase() === 'female'
    ? 'px-3 py-1 bg-[FF8AAF] text-gray-100 rounded-xl inline-flex items-center font-semibold capitalize'
    : 'px-3 py-1 bg-[25B4C4] text-gray-100 rounded-xl inline-flex items-center font-semibold capitalize';
});

const statusOptions = ref([
  { value: 'Looking for work', label: 'Looking for work' },
  { value: 'Looking for investor', label: 'Looking for investor' },
  { value: 'Looking for partner', label: 'Looking for partner' },
]);

const handleFileUpload = async (event) => {
  const file = event.target.files[0];
  const maxSizeKB = 512;
  const maxSizeBytes = maxSizeKB * 1024;

  if (file) {

    if (file.size > maxSizeBytes) {
        alert(`File size exceeds ${maxSizeKB}KB. Please choose a smaller file.`);
        event.target.value = null; // Reset the input
        return;
    }

    let formData = new FormData();
    formData.append('img', file);
    try {
      // const response = await axios.post('/upload-test', formData, {
      //   headers: {
      //     'Content-Type': 'multipart/form-data',
      //   },
      // });
      userStore.updateProfileImage(formData)
      if (response.status === 200) {
        console.log('File uploaded successfully:', response.data.file_url);
        showUploadModal.value = false;
      } else {
        console.error('File upload failed');
      }
    } catch (error) {
      console.error('Error uploading file:', error.message);
    }

  }
};

const updateApplicant = async () => {
  try {
    const userData = {
      user: {
        name: form.value.name,
        gender: form.value.gender,
      },
      applicant: {
        bio: form.value.bio,
        status: form.value.status
      }
    };

    const response = await userStore.updateUser(userData);
    if (response.success) {
      showModal.value = false;
      showUploadModal.value = false;
    } else {
      alert('Failed to update profile');
    }
  } catch (error) {
    console.error('Error updating profile:', error);
    alert('An error occurred while updating the profile');
  }
};

</script>