<template>
    <input 
        :type="type"
        :name="name"
        :id="`input-${name}`"
        class="w-full h-10 border border-[#E2E8F0] rounded text-sm px-3 outline-none hover:border-[#7C3AED] focus:border-[#7C3AED]"
        :class="{ 'border-red-400': error }"
        :placeholder="placeholder"
        v-model="inputValue"
        :disabled="disabled"
        @input="handlerInput"
        @change="$event => $emit('change', $event)"
        v-maska
        :data-maska="mask" />
    
    <p v-show="error" class="text-xs text-red-400 mt-2">{{ error }}</p>
</template>

<script setup>

import { ref, watch } from 'vue'
import { vMaska } from 'maska/vue'

const props = defineProps( ['modelValue', 'error', 'type', 'name', 'placeholder', 'disabled', 'mask'] )
const emit = defineEmits( ['update:modelValue', 'change'] )


const inputValue = ref(props.modelValue)


watch(
    () => props.modelValue, 
    () => {
        inputValue.value = props.modelValue
    }
)


function handlerInput() {
    emit('update:modelValue', inputValue.value)
}


</script>