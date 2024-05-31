<script setup>
import { ref, toRefs, defineProps, defineExpose } from 'vue';

const props = defineProps({
    options: {
        type: Array,
        required: true,
    },
    modelValue: {
        type: String,
        default: '',
    },
    placeholder: {
        type: String,
        default: '',
    },
    fieldClasses: {
        type: String,
        default: '',
    },
    dropdownClasses: {
        type: String,
        default: '',
    },
    contentClasses: {
        type: String,
        default: '',
    }
});

const emit = defineEmits(['update:modelValue']);

const dropdownVisible = ref(false);
const selectedLabel = ref('');

const select = ref(null);

const updateValue = (value, label) => {
    emit('update:modelValue', value);
    selectedLabel.value = label;
    dropdownVisible.value = false;
};

const toggleDropdown = () => {
    dropdownVisible.value = !dropdownVisible.value;
};

const closeDropdown = () => {
    dropdownVisible.value = false;
};

const handleClickOutside = (event) => {
    if (select.value && !select.value.contains(event.target)) {
        closeDropdown();
    }
};

document.addEventListener('click', handleClickOutside);

defineExpose({
    focus: () => select.value.focus(),
});

selectedLabel.value = props.options.find(option => option.value === props.modelValue)?.label || '';

</script>

<template>
    <div ref="select" class="relative">
        <div
            name="field"
            :class="[fieldClasses, 'flex justify-between w-full px-3 py-2 text-gray-500 bg-transparent border focus:border-indigo-600 shadow-sm rounded-lg cursor-pointer']"
            @click="toggleDropdown"
        >
            <p>{{ selectedLabel || placeholder }}</p>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 15 12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9" />
            </svg>
        </div>


        <Transition
            enter-active-class="transition ease-out duration-200"
            enter-from-class="opacity-0 scale-95"
            enter-to-class="opacity-100 scale-100"
            leave-active-class="transition ease-in duration-75"
            leave-from-class="opacity-100 scale-100"
            leave-to-class="opacity-0 scale-95"
        >
        <div v-if="dropdownVisible" name="dropdown" :class="[dropdownClasses, 'absolute z-10 w-full mt-1 bg-white border rounded-lg shadow-lg']">
            <div
                name="content"
                v-for="option in options"
                :key="option.value"
                @click="updateValue(option.value, option.label)"
                :class="[contentClasses, 'px-3 py-2 my-1 text-gray-500 cursor-pointer hover:bg-indigo-200']"
            >
                {{ option.label }}
            </div>
        </div>
        </Transition>
    </div>
</template>

<style scoped>
.relative {
    position: relative;
}
.absolute {
    position: absolute;
}
</style>
