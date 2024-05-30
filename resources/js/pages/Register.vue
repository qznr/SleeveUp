<template>
  <section class="bg-gray-100">
    <div class="flex flex-col items-center justify-center sm:px-6 py-8 mx-auto h-screen lg:py-0">
      <div class="relative">
        <h3 class="text-gray-800 text-3xl font-semibold sm:text-4xl py-12">
          Sign up on SleeveUp!
        </h3>
        <div
            class="absolute inset-0 max-w-xs mx-auto h-44 blur-[150px]"
            style="background: linear-gradient(152.92deg, rgba(192, 132, 252, 0.2) 4.54%, rgba(232, 121, 249, 0.26) 34.2%, rgba(192, 132, 252, 0.9) 77.55%);"
        ></div>
      </div>
      <div class="w-full bg-white rounded-lg shadow md:mt-0 sm:max-w-md xl:p-0 ">
        <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
          <form class="space-y-4 md:space-y-6" @submit.prevent="handleSubmit">
            <div>
                <label for="first-name" class="block mb-2 text-sm font-medium text-gray-900">Name</label>
                <TextInput name="first-name" id="first-name" v-model="name" required> </TextInput>
            </div>
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
            <div>
              <label for="confirm-password" class="block mb-2 text-sm font-medium text-gray-900">Confirm password</label>
              <PasswordInput type="confirm-password" name="confirm-password" id="confirm-password" v-model="confirmPassword"></PasswordInput>
              <p v-if="confirmPasswordError" class="text-sm text-red-600">{{ confirmPasswordError }}</p>
            </div>
            <button type="submit" class="w-full text-white bg-indigo-600 hover:bg-indigo-700 focus:ring-4 focus:outline-none focus:ring-indigo-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Create an account</button>
            <p class="text-sm font-light text-gray-500 ">
                Already have an account? <a href="/login" class="font-medium text-indigo-600 hover:underline ">Login here</a>
            </p>
          </form>
        </div>
      </div>
    </div>
  </section>
</template>

<script setup>
  import { ref, watch} from 'vue'
  import EmailInput from '../components/EmailInput.vue'
  import PasswordInput from '../components/PasswordInput.vue'
  import TextInput from '../components/TextInput.vue'

  import { useUserStore } from '../stores/userStore';
  const userStore = useUserStore();

  const name = ref('')
  const lastName = ref('')

  const email = ref('')
  const password = ref('')
  const confirmPassword = ref('')

  const emailError = ref('')
  const passwordError = ref('')
  const confirmPasswordError = ref('')

  watch(password, (newPassword) => {
    if (newPassword.length > 8) {
      passwordError.value = ''
    } else {
      passwordError.value = 'Password must be longer than 8 characters'
    }

    if (newPassword === confirmPassword.value) {
      confirmPasswordError.value = ''
    } else {
      confirmPasswordError.value = 'Passwords do not match'
    }
  })

  watch(confirmPassword, (newConfirmPassword) => {
    if (newConfirmPassword === password.value) {
      confirmPasswordError.value = ''
    } else {
      confirmPasswordError.value = 'Passwords do not match'
    }
  })

  const handleSubmit = async () => {
    // Reset email error
    emailError.value = ''

    // Check if email already exists
    try {
      const emailResponse = await axios.post('/check-email', { email: email.value });
      if (emailResponse.data.exists) {
        emailError.value = 'Email already exists';
        return;
      }
    } catch (error) {
      console.error('Error checking email', error.response.data);
      return;
    }

    if (!passwordError.value && !confirmPasswordError.value) {
      try {
        const response = await axios.post('/register', {
          email: email.value,
          password: password.value,
          password_confirmation: confirmPassword.value,
          name: name.value,
        });
        // Redirect to homepage if registration is successful
        if (response.status === 201) {
          const userResponse = await axios.get('/user');
          userStore.setUser(userResponse.data.user)
          window.location.href = '/';
        }
      } catch (error) {
        console.error('Error submitting form', error.response.data);
      }
    }
  }
</script>