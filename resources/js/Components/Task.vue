<template>
    <div 
        class="group/item w-full my-6 p-6 cursor-pointer rounded-lg shadow-[0_4px_16px_0px_rgba(22,22,22,0.1)]" 
        draggable="true"
        @dragstart="$emit('dragStart', $event)">
            <div class="w-full h-[30px] flex justify-between items-center">
                <h3 class="text-sm font-bold">{{ task.title }}</h3>
    
                <button 
                    arial-label="Botão para editar tarefa" 
                    class="hidden group-hover/item:block"
                    @click="$emit('onDelete')">
                        <img 
                            src="/images/trash.svg" 
                            alt="Icone de uma lixeira" 
                            class="w-[20px] h-[20px]" />
                </button>
            </div>
            <p class="my-2.5 text-sm font-medium text-[#756966]">{{ task.description }}</p>
    </div>
</template>

<script setup>

const props = defineProps( ["task"] )
const emit = defineEmits( ["dragStart", "onDelete", "viewTask"] )

</script>
