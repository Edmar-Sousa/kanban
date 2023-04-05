<template>
  <Layout>
    <main class="flex-1 bg-white rounded-tl-2xl px-8 py-12 overflow-y-auto">
      <header class="flex">
        <div class="flex gap-4 items-center flex-1">
          <h1 class="text-3xl font-bold text-[#403937]">Meu Kanban</h1>
          <button arial-label="Botão para editar nome do board">
            <img src="images/pen.svg" alt="icone de um lapis" />
          </button>
        </div>
        
        <div>
          <img 
            src="images/profile-picture.png" 
            alt="imagem de perfil"
            class="w-16 h-16" />
        </div>
      </header>
      
      <div class="w-full mt-8 flex gap-4">
        <button 
          aria-label="Botão para filtrar tarefas"
          class="flex justify-center align-items text-sm font-normal gap-2 text-white bg-[#7C3AED] p-3 w-[135px] rounded hover:scale-95">
            <img src="images/filter.svg" alt="" />
            Filtrar
        </button>
        
        <button 
          class="flex items-center flex-1 gap-4 rounded-2xl px-6 focus:outline-none focus:ring ring-[#7C3AED] shadow-[0_4px_16px_0px_rgba(22,22,22,0.1)] text-[#7C7C8A] text-base font-normal">
            <img 
              src="images/search.svg" 
              alt="Icone de lupa" 
              class="w-5" />
            
            Busque por cards, assuntos ou responsáveis
        </button>
      </div>
      
      <div class="w-full min-h-[821px] mt-8 flex justify-between">
        <div class="w-[368px]">
          <h2 class="font-bold text-xl text-[#403937]">A fazer</h2>

          <Task v-for="task in task_to_do" :key="task.id" :task="task" />
        </div>

        <div class="w-[368px]">
          <h2 class="font-bold text-xl text-[#403937]">Fazendo</h2>
        </div>

        <div class="w-[368px]">
          <h2 class="font-bold text-xl text-[#403937]">Feito</h2>
        </div>
      </div>
    </main>
  </Layout>
</template>

<script setup>

import { computed } from "vue"

import Layout from "../Template/Layout.vue"
import Task from "../Components/Task.vue"


const props = defineProps( ['tasks'] )


const task_to_do = computed(() => props.tasks.filter( task => task.state == 1 ) )

</script>
