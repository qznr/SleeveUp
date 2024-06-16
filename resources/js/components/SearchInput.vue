<script setup>
import { onMounted, ref } from 'vue';

const model = defineModel({
    type: String,
    required: true,
});

const input = ref(null);

onMounted(() => {
    if (input.value.hasAttribute('autofocus')) {
        input.value.focus();
    }
});

defineExpose({ focus: () => input.value.focus() });
</script>

<template>
  <form class="max-w-md">
    <div class="relative max-w-md">
        <svg xmlns="http://www.w3.org/2000/svg" class="absolute top-0 bottom-0 w-6 h-6 my-auto text-[5742F5] left-3"
          fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path strokeLinecap="round" strokeLinejoin="round"
            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
        </svg>
      <input type="text" 
        placeholder="Search"
        class="w-full py-3 pl-12 pr-4 text-gray-500 border rounded-xl outline-none focus:border-[5742F5]" 
        v-model="model"
        ref="input"/>
    </div>
  </form>
</template>