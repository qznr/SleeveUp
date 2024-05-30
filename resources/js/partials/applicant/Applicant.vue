<template>
  <div class="bg-white max-w-screen-xl mx-auto p-12 rounded-xl shadow-xl relative">
    {{ user.email }}
  </div>
</template>

<script setup>
import { useUserStore } from '../../stores/userStore';
const userStore = useUserStore();
const user = userStore.user
console.log(user)
</script>