<template>

    <div class="fixed top-0 bottom-0 left-0 right-0 bg-[#00000033] flex justify-center items-center" v-show="openModal">
        <div class="bg-white p-4 rounded w-11/12 max-w-[500px]">

            <div class="w-full flex justify-between">
                <h2 class="font-bold">
                    {{ title }}
                </h2>

                <button arial-label="Close modal" @click="handleCloseModal">
                    <X size="20" />
                </button>
            </div>

            <slot name="modal-body"></slot>

        </div>
    </div>

</template>


<script setup>

import { X } from 'lucide-vue-next'
import { shallowRef } from 'vue'


defineProps([ 'title' ])
const emit = defineEmits([ 'closeModal' ])


defineExpose({
    showModal,
})

const openModal = shallowRef(false)

function showModal() {
    openModal.value = true
}


function handleCloseModal() {
    openModal.value = false

    emit('closeModal')
}


</script>
