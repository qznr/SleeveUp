<template>
  <div class="relative overflow-hidden bg-gray-900 py-36">
    <div
      class="w-full h-full rounded-full bg-gradient-to-r from-[#58AEF1] to-pink-500 absolute -top-12 -right-14 blur-2xl opacity-10">
    </div>
    <div class="relative max-w-2xl mx-auto sm:text-center pt-14">
      <div class="relative z-10">
        <h3 class="text-gray-200 text-3xl font-semibold sm:text-4xl">
            Applying made easy
        </h3>
        <p class="mt-3 text-gray-300">
          Apply on the go, anytime and anywhere. We are ready anytime you are ready.
        </p>
      </div>
    </div>
    <div class="max-w-2xl mx-auto px-4 md:px-0 py-14">
      <ul aria-label="Steps" class="items-center text-gray-300 font-medium md:flex">
        <li v-for="(item, idx) in stepsItems" :key="idx" :aria-current="currentStep == idx + 1 ? 'step' : false" class="flex gap-x-3 md:flex-col md:flex-1 md:gap-x-0">
          <div class="flex flex-col items-center md:flex-row md:flex-1">
            <hr :class="{'w-full border hidden md:block': true, 'border-none': idx == 0, 'border-purple-300': currentStep >= idx + 1}" />
            <div :class="{'w-8 h-8 rounded-full border-2 flex-none flex items-center justify-center': true, 'bg-purple-300 border-purple-300': currentStep > idx + 1, 'border-purple-300': currentStep == idx + 1}">
              <span :class="{'w-2.5 h-2.5 rounded-full bg-purple-300': true, 'hidden': currentStep != idx + 1}"></span>
              <svg v-if="currentStep > idx + 1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth="3" stroke="currentColor" class="w-6 h-6 text-white">
                <path strokeLinecap="round" strokeLinejoin="round" d="M4.5 12.75l6 6 9-13.5" />
              </svg>
            </div>
            <hr :class="{'h-12 border md:w-full md:h-auto': true, 'border-none': idx + 1 == stepsItems.length, 'border-purple-300': currentStep > idx + 1}" />
          </div>
          <div class="h-8 flex justify-center items-center md:mt-3 md:h-auto">
            <h3 :class="{'text-sm': true, 'text-purple-300': currentStep == idx + 1}">{{ item }}</h3>
          </div>
        </li>
      </ul>
    </div>    
  </div>
</template>
  
  <script>
  export default {
    data() {
      return {
        stepsItems: ["Prepare", "Explore", "Apply"],
        currentStep: 2
      };
    }
  }
  </script>  