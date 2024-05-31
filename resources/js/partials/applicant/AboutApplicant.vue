<template>
  <div class="bg-white max-w-screen-xl mx-auto p-8 rounded-xl shadow-xl relative mb-6">
    <div class="flex mb-3 items-center justify-between">
      <h1 class="text-3xl text-[381D4F] font-semibold">About Me</h1>
      <button class="col-span-12 lg:col-span-1 flex text-[5742F5]" @click="showModal = true">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
          <path d="M21.731 2.269a2.625 2.625 0 0 0-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 0 0 0-3.712ZM19.513 8.199l-3.712-3.712-8.4 8.4a5.25 5.25 0 0 0-1.32 2.214l-.8 2.685a.75.75 0 0 0 .933.933l2.685-.8a5.25 5.25 0 0 0 2.214-1.32l8.4-8.4Z" />
          <path d="M5.25 5.25a3 3 0 0 0-3 3v10.5a3 3 0 0 0 3 3h10.5a3 3 0 0 0 3-3V13.5a.75.75 0 0 0-1.5 0v5.25a1.5 1.5 0 0 1-1.5 1.5H5.25a1.5 1.5 0 0 1-1.5-1.5V8.25a1.5 1.5 0 0 1 1.5-1.5h5.25a.75.75 0 0 0 0-1.5H5.25Z" />
        </svg>
      </button>
    </div>
    <p class="text-wrap break-words whitespace-pre-wrap text-[381D4F]"> {{user.applicant.about_me}} </p>
  </div>

  <Modal :show="showModal" @close="showModal = false">
      <template v-slot>
        <div class="p-6">
          <h2 class="text-2xl mb-3 text-[381D4F]">Ubah Profil</h2>
          <form @submit.prevent="updateApplicant">
            <div class="mb-4">
              <label for="aboutMe" class="block text-sm font-medium text-[381D4F]">About me</label>
              <TextArea id="aboutMe" v-model="form.about_me" class="mt-2 block w-full"></TextArea>
            </div>
            <div class="flex justify-end">
              <button type="submit" class="px-4 py-2 bg-[5742F5] text-white rounded-md">Save</button>
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

const userStore = useUserStore();
const user = ref(userStore.user);

watch(() => userStore.user, (newUser) => {
  user.value = newUser;
});

const form = ref({
  about_me: user.value.applicant.about_me
});

const showModal = ref(false);

const updateApplicant = async () => {
  try {
    const userData = {
      applicant: {
        about_me: form.value.about_me
      }
    };

    const response = await userStore.updateUser(userData);
    if (response.success) {
      showModal.value = false;
    } else {
      alert('Failed to update profile');
    }
  } catch (error) {
    console.error('Error updating profile:', error);
    alert('An error occurred while updating the profile');
  }
};
</script>