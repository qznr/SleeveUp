<template>
  Hi
</template>

<script setup>
import { ref, watch, computed } from 'vue';

const companyList = ref([]);

const fetchProfessions = async () => {
  try {
    const response = await axios.get('/companies');
    companyList.value = response.data
  } catch (error) {
    console.error('Error fetching professions:', error);
  }
};
fetchProfessions()

console.log(companyList.value)

</script>