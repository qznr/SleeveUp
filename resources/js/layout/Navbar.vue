<template>
  <nav class="bg-[151126] w-full top-0 z-20 px-8 antialiased">
    <div class="items-center px-4 max-w-screen mx-auto lg:flex lg:px-8">
      <div class="flex items-center justify-between py-3 lg:py-4 lg:block">
        <a href="/" class="font-semibold text-3xl text-gray-200">
          SleeveUp!
        </a>
        <div class="lg:hidden">
          <button class="text-gray-200 outline-none border-none p-2 rounded-md focus:border-gray-200 focus:border"
            @click="menuOpen">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-5">
              <path fill-rule="evenodd" d="M2 4.75A.75.75 0 0 1 2.75 4h14.5a.75.75 0 0 1 0 1.5H2.75A.75.75 0 0 1 2 4.75Zm7 10.5a.75.75 0 0 1 .75-.75h7.5a.75.75 0 0 1 0 1.5h-7.5a.75.75 0 0 1-.75-.75ZM2 10a.75.75 0 0 1 .75-.75h14.5a.75.75 0 0 1 0 1.5H2.75A.75.75 0 0 1 2 10Z" clip-rule="evenodd" />
            </svg>
          </button>
        </div>
      </div>
      <div class="flex-1 justify-between flex-row-reverse lg:overflow-visible lg:flex lg:pb-0 lg:pr-0 lg:h-auto" :class="[open ? 'h-screen pb-20 overflow-auto pr-4' : 'hidden']">
        <div>
          <ul class="flex flex-col-reverse space-x-0 lg:space-x-6 lg:flex-row">
            <li class="mt-4 lg:mt-0" v-if="user">
              <Dropdown>
                <template #trigger>
                  <a href="#" class="py-3 px-4 text-center border text-gray-300 hover:text-[25B4C4] rounded-md block lg:inline lg:border-0">
                    <img
                      :src="user.img || defaultImage"
                      :srcset="user.img ? `${user.img} 1x, ${user.img.replace('.png', '@2x.png')} 2x` : `${defaultImage} 1x, ${defaultImage.replace('.png', '@2x.png')} 2x`"
                      alt="User Image"
                      class="w-8 h-8 rounded-full inline-block mr-2"
                      loading="lazy"
                    >
                    Hi, {{ user.first_name || 'Guest' }}
                  </a>
                </template>
                <template #content>
                  <a href="/profile" class="block px-4 py-2 text-sm text-gray-300 hover:text-gray-900 hover:bg-gray-100">Profile</a>
                  <a href="#" @click.prevent="logout" class="block px-4 py-2 text-sm text-gray-300 hover:text-gray-900 hover:bg-gray-100">Logout</a>
                </template>
              </Dropdown>
            </li>
            <li class="mt-4 lg:mt-0" v-if="!user">
              <a href="/login" class="py-3 px-4 text-center text-md border font-semibold text-gray-300 hover:text-[25B4C4] rounded-md block lg:inline lg:border-0">
                Login
              </a>
            </li>
            <li class="mt-8 lg:mt-0" v-if="!user">
              <a href="/register" class="py-3 px-4 text-center text-md border font-semibold text-gray-300 hover:text-[25B4C4] rounded-md block lg:inline lg:border-0">
                Sign Up
              </a>
            </li>
          </ul>
        </div>
        <div class="flex-1">
          <ul class="ml-6 justify-left items-left space-y-8 lg:flex lg:space-x-6 lg:space-y-0">
            <li v-for="link in navigation" :key="link.id" class="text-gray-300 hover:text-[25B4C4]">
              <a :href="link.router" class="font-light">
                {{ link.title }}
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </nav>
</template>

<style scoped>
.sticky-nav {
  animation: sticky-nav 300ms;
}

@keyframes sticky-nav {
  0% {
    transform: translateY(-6em)
  }

  100% {
    transform: translateY(0)
  }
}
</style>

<script setup>
import { ref, computed, onMounted } from 'vue';
import { useUserStore } from '../stores/userStore';
import Dropdown from '../components/Dropdown.vue';

const userStore = useUserStore();
const open = ref(false);
const defaultImage = '/img/user/placeholder.png';
const navigation = [
  { title: "Chatbot", router: "/chatbot" },
  { title: "Feedback", router: "/feedback" },
];

const menuOpen = () => {
  open.value = !open.value;
};

const user = computed(() => userStore.user);

const logout = async () => {
  try {
    await userStore.logout();
  } catch (error) {
    console.error('Error during logout', error);
  }
};

onMounted(() => {
  userStore.fetchUser();
});
</script>