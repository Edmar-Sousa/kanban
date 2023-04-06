<template>
    <div 
        class="w-full my-6 p-6 rounded-lg shadow-[0_4px_16px_0px_rgba(22,22,22,0.1)]" 
        draggable="true"
        @dragstart=" $emit('dragStart', $event, task)">
            <h3 class="text-sm font-bold">{{ task.title }}</h3>
            <p class="my-2.5 text-sm font-medium text-[#756966]">{{ task.description }}</p>

            <div class="flex gap-2">
                <p class="text-sm py-1 px-2 font-medium rounded bg-[#E2D6FF] text-[#7C3AED]">rocketseat</p>
                <p class="text-sm py-1 px-2 font-medium rounded bg-[#E2D6FF] text-[#7C3AED]">desafio</p>
            </div>
    </div>
</template>

<script setup>


const props = defineProps( ['task'] )
const emit = defineEmits( ['dragStart'] )

</script>
