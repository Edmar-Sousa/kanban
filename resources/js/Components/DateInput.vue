<template>

    <input-form
        type="text"
        :name="name"
        :placeholder="placeholder"
        :error="error"
        :disabled="disabled"
        mask="##/##/#### ##:##"
        v-model="value" />

</template>


<script setup>

import { ref, watch } from 'vue'

import InputForm from '@/Components/InputForm.vue'

const props = defineProps( ['modelValue', 'error', 'name', 'placeholder', 'disabled' ] )
const emit = defineEmits( ['update:modelValue'] )



const value = ref(props.modelValue)


watch(value, nextvalue => {
    emit('update:modelValue', nextvalue.replace(/(\d{2})\/(\d{2})\/(\d{4})\s(\d{2})\:(\d{2})/, '$3-$2-$1 $4:$5'))
})

</script>
