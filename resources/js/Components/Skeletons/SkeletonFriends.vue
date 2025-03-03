<script setup>

defineProps({
    numberContacts: {
        type: Number,
        required: false,
        default: 5,
    }
})

</script>

<template>
    <div class="mt-6">
        <div class="w-10 h-10 rounded bg-gray-300 leading-10 text-xl text-center uppercase skeleton-loading"></div>

        <div
            v-for="contact in numberContacts"
            :key="contact"
            class="mt-5 px-10 flex items-center">
                <div class="w-16 h-16 mx-7 bg-gray-300 rounded-full skeleton-loading"></div>
                <div>
                    <div class="w-[100px] h-6 rounded bg-gray-300 skeleton-loading"></div>
                    <div class="w-[200px] h-4 rounded mt-2 bg-gray-300 skeleton-loading"></div>
                </div>
        </div>
    </div>

</template>

