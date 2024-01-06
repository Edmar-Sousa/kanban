<template>

    <div
        class="w-full p-4 mt-3 text-md font-bold border rounded" 
        :class="messagestyle">
            <p>{{ message }}</p>
    </div>

</template>


<script setup>

import { computed } from 'vue'


const props = defineProps( { 
    message: {
        type: String,
        required: true,
    },

    type: {
        type: String,
        required: true,
    },
} )



const messagestyle = computed(() => props.type == 'success' 
    ? 'border-green-700 text-green-700 bg-green-400'
    : 'border-red-700 text-red-700 bg-red-400'
)



</script>
