<template>
  <section class="bg-gray-100">
    <div class="flex flex-col items-center justify-center sm:px-6 py-8 mx-auto h-screen lg:py-0 px-4 md:px-0">
      <div class="relative">
        <h3 class="text-gray-800 text-3xl font-semibold sm:text-4xl py-12">
          Login to SleeveUp!
        </h3>
        <div
          class="absolute inset-0 max-w-xs mx-auto h-44 blur-[150px]"
          style="background: linear-gradient(152.92deg, rgba(192, 132, 252, 0.2) 4.54%, rgba(232, 121, 249, 0.26) 34.2%, rgba(192, 132, 252, 0.9) 77.55%);"
        ></div>
      </div>
      <div class="w-full bg-white rounded-lg shadow md:mt-0 sm:max-w-md xl:p-0">
        <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
          <form class="space-y-4 md:space-y-6" @submit.prevent="handleSubmit">
            <div>
              <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Your email</label>
              <EmailInput name="email" id="email" v-model="email"></EmailInput>
              <p v-if="emailError" class="text-sm text-red-600">{{ emailError }}</p>
            </div>
            <div>
              <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Password</label>
              <PasswordInput type="password" name="password" id="password" v-model="password"></PasswordInput>
              <p v-if="passwordError" class="text-sm text-red-600">{{ passwordError }}</p>
            </div>
            <button type="submit" class="w-full text-white bg-indigo-600 hover:bg-indigo-700 focus:ring-4 focus:outline-none focus:ring-indigo-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Login</button>
            <p class="text-sm font-light text-gray-500">
              Don't have an account? <a href="/register" class="font-medium text-indigo-600 hover:underline">Sign up here</a>
            </p>
          </form>
        </div>
      </div>
    </div>
  </section>
</template>

<script setup>
import { ref } from 'vue'
import EmailInput from '../components/EmailInput.vue'
import PasswordInput from '../components/PasswordInput.vue'
import { useUserStore } from '../stores/userStore';
import axios from 'axios'

const email = ref('')
const password = ref('')

const emailError = ref('')
const passwordError = ref('')

const userStore = useUserStore();

const handleSubmit = async () => {
  // Reset errors
  emailError.value = ''
  passwordError.value = ''

  try {
    const response = await axios.post('/login', {
      email: email.value,
      password: password.value,
    })
    
    if (response.status === 200) {
      const userResponse = await axios.get('/user');
      userStore.setUser(userResponse.data.user)
      window.location.href = '/' // Redirect to homepage on successful login
    }
  } catch (error) {
    if (error.response && error.response.status === 401) {
      passwordError.value = 'Invalid email or password'
    } else {
      console.error('Error logging in', error.response ? error.response.data : error.message)
    }
  }
}
</script>