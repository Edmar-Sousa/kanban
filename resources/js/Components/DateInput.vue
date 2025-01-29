<template>

    <input
        type="text"
        :name="name"
        :id="`input-${name}`"
        class="w-full h-10 border border-[#E2E8F0] rounded text-sm px-3 outline-none hover:border-[#7C3AED] focus:border-[#7C3AED]"
        :class="{ 'border-red-400': error }"
        :placeholder="placeholder"
        v-model="inputValue"
        :disabled="disabled"
        @input="handlerInput"
        v-maska
        data-maska="##/##/#### ##:##" />

    <p v-show="hasError" class="text-xs text-red-400 mt-2">{{ error }}</p>

</template>


<script setup>

import {computed, ref} from 'vue'
import { vMaska } from 'maska/vue'


const props = defineProps( ['modelValue', 'error', 'name', 'placeholder', 'disabled' ] )
const emit = defineEmits( ['update:modelValue'] )


const inputValue = ref(props.modelValue)

const hasError = computed(() => props.error?.length)

function handlerInput()  {
    emit('update:modelValue', inputValue.value.replace(/(\d{2})\/(\d{2})\/(\d{4})\s(\d{2})\:(\d{2})/, '$3-$2-$1 $4:$5'))
}

</script>
