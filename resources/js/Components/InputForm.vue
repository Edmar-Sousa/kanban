<template>
    <input 
        :type="type"
        :name="name"
        :id="`input-${name}`"
        class="w-full h-10 border border-[#E2E8F0] rounded text-sm px-3 outline-none hover:border-[#7C3AED] focus:border-[#7C3AED]"
        :class="{ 'border-red-400': error }"
        :placeholder="placeholder"
        :value="modelValue"
        :disabled="disabled"
        @input="$event => $emit('update:modelValue', $event.target.value)"
        @change="$event => $emit('change', $event)"
        v-maska
        :data-maska="mask" />
    
    <p v-show="error" class="text-xs text-red-400 mt-2">{{ error }}</p>
</template>

<script setup>

import { vMaska } from 'maska'

const props = defineProps( ['modelValue', 'error', 'type', 'name', 'placeholder', 'disabled', 'mask'] )
const emit = defineEmits( ['update:modelValue', 'change'] )

</script>