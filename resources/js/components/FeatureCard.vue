<template>
  <!-- <li class="bg-gray-900 space-y-3 p-4 border rounded-xl shadow-xl relative overflow-hidden" @mousemove="handleMousemove">
    <div class="glow bg-[5742f5] duration-75 blur-[150px]" :style="{ right: mouseX + 'px'}"></div>
    <div class="flex items-center mb-4 text-purple-200" v-html="icon"></div>
    <h5 class="text-xl font-semibold text-gray-200">{{ title }}</h5>
    <p class="mt-2 text-base text-gray-200">{{ desc }}</p> -->
    <!-- Position X : {{ mouseX }} - Position Y {{ mouseY }} -->
  <!-- </li> -->
  <li class="bg-white space-y-3 p-4 border rounded-xl shadow-xl relative overflow-hidden" @mousemove="handleMousemove">
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
  methods:{
    handleMousemove(e){
      this.mouseX = e.offsetX-125
      this.mouseY = e.offsetY
    }
  }
};
</script>

<style scoped>
/* Add any specific styles for the card here */
.glow {
  position: absolute;
  width: 250px;
  height: 250px;
}
</style>
