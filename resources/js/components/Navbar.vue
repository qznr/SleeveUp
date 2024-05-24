<template>
  <nav class="bg-white w-full top-0 z-20 px-8 antialiased">
    <div class="items-center px-4 max-w-screen mx-auto lg:flex lg:px-8">
      <div class="flex items-center justify-between py-3 lg:py-4 lg:block">
        <a href="/" class="font-semibold text-3xl text-gray-900">
          SleeveUp!
        </a>
        <div class="lg:hidden">
          <button class="text-gray-700 outline-none p-2 rounded-md focus:border-gray-400 focus:border"
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
              <a href="/test" class="py-3 px-4 text-center border text-gray-600 hover:text-indigo-600 rounded-md block lg:inline lg:border-0">
                Hi, {{ user.first_name || 'Guest' }}
              </a>
            </li>
            <li class="mt-4 lg:mt-0" v-if="!user">
              <a href="/login" class="py-3 px-4 text-center border text-gray-600 hover:text-indigo-600 rounded-md block lg:inline lg:border-0">
                Login
              </a>
            </li>
            <li class="mt-8 lg:mt-0" v-if="!user">
              <a href="/register" class="py-3 px-4 text-center text-white bg-indigo-600 hover:bg-indigo-700 rounded-xl shadow block lg:inline">
                Sign Up
              </a>
            </li>
          </ul>
        </div>
        <div class="flex-1">
          <ul class="ml-6 justify-left items-left space-y-8 lg:flex lg:space-x-6 lg:space-y-0">
            <li v-for="link in navigation" :key="link.id" class="text-black hover:text-indigo-600">
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

<script>
import { ref, onMounted } from 'vue';
import axios from 'axios';

export default {
  data() {
    return {
      navigation: [
        { title: "Chatbot", router: "/chatbot" },
        { title: "Feedback", router: "/feedback" },
      ],
      user: null
    };
  },
  setup() {
    const open = ref(false);
    
    const menuOpen = () => {
      open.value = !open.value;
    };

    return { open, menuOpen };
  },
  async mounted() {
    try {
      const response = await axios.get('/user');
      this.user = response.data.user;
    } catch (error) {
      console.error('Error fetching user data', error);
    }
  }
};
</script>