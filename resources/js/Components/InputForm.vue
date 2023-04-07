<template>
    <input 
        :type="type"
        :name="name"
        :id="`input-${name}`"
        class="w-full h-10 border border-[#E2E8F0] rounded text-sm px-3 outline-none hover:border-[#7C3AED] focus:border-[#7C3AED]"
        :class="{ 'border-red-400': error }"
        :placeholder="placeholder"
        :value="modelValue"
        @input="$emit('update:modelValue', $event.target.value)" />
    
    <p v-show="error" class="text-xs text-red-400 mt-2">{{ error }}</p>
</template>

<script setup>

const props = defineProps( ["modelValue", "error", "type", "name", "placeholder"] )
const emit = defineEmits( ["update:modelValue"] )

</script>