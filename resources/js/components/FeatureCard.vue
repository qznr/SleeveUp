<template>
  <li class="bg-white space-y-3 p-4 border rounded-xl shadow-xl relative overflow-hidden">
    <div class="flex items-center mb-4 text-purple-600" v-html="icon"></div>
    <h5 class="text-xl font-semibold text-gray-800">{{ title }}</h5>
    <p class="mt-2 text-base text-gray-800">{{ desc }}</p>
  </li>
</template>

<script>
export default {
  name: 'FeatureCard',
  data(){
    return{
      mouseX: 0,
      mouseY: 0,
    }
  },
  props: {
    icon: {
      type: String,
      required: true
    },
    title: {
      type: String,
      required: true
    },
    desc: {
      type: String,
      required: true
    }
  },
};
</script>

<style scoped>
/* Add any specific styles for the card here */
li {
  transition: transform 0.15s ease;
}
li:hover {
  transform: scale(1.05);
}
</style>
