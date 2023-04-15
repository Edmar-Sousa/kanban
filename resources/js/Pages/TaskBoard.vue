<template>
  <Layout>
    <main class="flex-1 bg-white rounded-tl-2xl px-8 py-12 overflow-y-auto">
      <header class="flex justify-between items-center">
        <h1 class="text-3xl font-bold text-[#403937]">Boards</h1>
        
        <div>
          <img 
            :src="require(`~/storage/${ image }`).default" 
            alt="imagem de perfil"
            class="w-16 h-16" />
        </div>
      </header>
      
      <div class="w-full min-h-[821px] mt-8">
        <div class="w-full flex justify-between items-center">
          <h2 class="font-bold text-xl text-[#403937]">Seus boards</h2>

          <button 
            arial-label="Criar um novo board"
            class="bg-[#7C3AED] rounded hover:scale-95" @click="openModal = true">
              <img :src="require('~/images/plus.svg').default" alt="Plus icon" />
          </button>

        </div>

        <div class="w-full grid grid-cols-3">
          
          <div 
            class="group/item w-full my-6 p-6 rounded-lg shadow-[0_4px_16px_0px_rgba(22,22,22,0.1)]" 
            v-for="taskboard in taskboards" :key="taskboard.id">
              <h3 class="text-sm font-bold">{{ taskboard.title }}</h3>
              <p class="my-2.5 text-sm font-medium text-[#756966]">{{ taskboard.description }}</p>

              <div class="w-full flex justify-end gap-2">
                <button 
                  arial-label="Deletar taskboard" 
                  class="hidden group-hover/item:block"
                  @click="deleteTaskBoards( taskboard.id )">
                    <img 
                      :src="require('~/images/trash.svg').default" 
                      alt="Icone de uma lixeira" 
                      class="w-[20px] h-[20px]" />
                </button>

                <Link :href="`${route('task')}/${taskboard.id}`" class="text-sm py-1 px-2 font-medium rounded bg-[#E2D6FF] text-[#7C3AED]">Visualizar</Link>
              </div>
          </div>

        </div>
      </div>
    </main>

    <div class="fixed top-0 bottom-0 left-0 right-0 bg-[#00000033] flex justify-center items-center" v-show="openModal">
      <div class="bg-white p-4 rounded w-full max-w-[500px]">
        <div class="w-full flex justify-between">
          <h2 class="font-bold">Adicionar nova Board</h2>

          <button arial-label="Close modal" @click="openModal = false">
            <img :src="require('~/images/x.svg').default" alt="close icon" />
          </button>
        </div>

        <form action="#" method="POST" @submit.prevent>
          <label 
            for="input-title"
            class="block my-2 text-sm font-semibold text-[#1E293B]">Titulo</label>

          <InputForm 
            type="text"
            name="title" 
            placeholder="Digite o titulo"
            v-model="form.title"
            :error="errors.title" />

          <label 
            for="input-title"
            class="block my-2 text-sm font-semibold text-[#1E293B]">Descrição</label>

          <textarea 
            name="description" 
            class="w-full h-[150px] border border-[#E2E8F0] rounded text-sm p-3 outline-none hover:border-[#7C3AED] focus:border-[#7C3AED]"
            :class="{ 'border-red-400': errors.description }"
            v-model="form.description"
            :error="errors.description"></textarea> 

          <p v-show="errors.description" class="text-xs text-red-400 mt-2">{{ errors.description }}</p> 

          <div class="w-full flex justify-end">
            <button 
              aria-label="Botão para filtrar tarefas"
              class="flex justify-center align-items text-sm font-normal gap-2 text-white bg-[#7C3AED] p-3 w-[135px] rounded hover:scale-95"
              @click="createTaskBoard()">
                Criar
            </button>
          </div>
        </form>
      </div>
    </div>

  </Layout>
</template>

<script setup>

import { Link, useForm } from "@inertiajs/inertia-vue3"
import { ref } from "vue"

import Layout from "../Template/Layout.vue"
import InputForm from "../Components/InputForm.vue";

const props = defineProps( ["taskboards", "image"] )

const openModal = ref(false)

const form = useForm({
  title: "",
  description: "",
})

const errors = ref({
  title: "",
  description: "",
})

function createTaskBoard() {
  form.post(route("taskboard"), {
    onSuccess: () => { 
      form.title = "" 
      form.description = ""
    },
    onError: (error) => errors.value = error
  })
}


function deleteTaskBoards( id ) {
  const deleteForm = useForm({ id })
  deleteForm.delete(route("taskboard"))
}

</script>
