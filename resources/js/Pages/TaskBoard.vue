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
      
      <div class="w-full min-h-[821px] mt-8 flex justify-between gap-2">
        <div 
          class="w-[368px]" 
          @drop="drop($event, 1)"
          @dragover.prevent 
          @dragenter.prevent>
            <div class="w-full flex justify-between items-center">
              <h2 class="font-bold text-xl text-[#403937]">A fazer</h2>

              <button 
                arial-label="Adicionar tarefa"
                class="bg-[#7C3AED] rounded hover:scale-95" @click="openModal = true">
                  <img src="images/plus.svg" alt="Plus icon" />
              </button>
            </div>

            <Task v-for="task in taskToDo" :key="task.id" :task="task" @dragStart="dragStart" />
        </div>

        <div class="w-[368px]"
          @drop="drop($event, 2)"
          @dragover.prevent
          @dragenter.prevent>
            <h2 class="font-bold text-xl text-[#403937]">Fazendo</h2>
            <Task v-for="task in taskDoing" :key="task.id" :task="task" @dragStart="dragStart" />
          </div>
          
          <div class="w-[368px]"
            @drop="drop($event, 3)"
            @dragover.prevent
            @dragenter.prevent>
              <h2 class="font-bold text-xl text-[#403937]">Feito</h2>
              <Task v-for="task in taskDone" :key="task.id" :task="task" @dragStart="dragStart" />
        </div>
      </div>
    </main>

    <div class="fixed top-0 bottom-0 left-0 right-0 bg-[#00000033] flex justify-center items-center" v-show="openModal">
      <div class="bg-white p-4 rounded w-full max-w-[500px]">
        <div class="w-full flex justify-between">
          <h2 class="font-bold">Adicionar nova Tarefa</h2>

          <button arial-label="Close modal" @click="openModal = false">
            <img src="images/x.svg" alt="close icon" />
          </button>
        </div>

        <form action="#" method="POST">
          <label 
            for="input-title"
            class="block my-2 text-sm font-semibold text-[#1E293B]">Tarefa</label>

          <InputForm 
            type="text"
            name="title" 
            placeholder="Digite o titulo da terfa"
            v-model="formNewTask.title" />

          <label 
            for="input-title"
            class="block my-2 text-sm font-semibold text-[#1E293B]">Descrição</label>

          <textarea 
            name="description" 
            class="w-full h-[150px] border border-[#E2E8F0] rounded text-sm p-3 outline-none hover:border-[#7C3AED] focus:border-[#7C3AED]"
            v-model="formNewTask.description"></textarea>

          <div class="w-full flex justify-end">
            <button 
              aria-label="Botão para filtrar tarefas"
              class="flex justify-center align-items text-sm font-normal gap-2 text-white bg-[#7C3AED] p-3 w-[135px] rounded hover:scale-95">
                Adicionar
            </button>
          </div>
        </form>
      </div>
    </div>
  </Layout>
</template>

<script setup>

import { computed, ref } from "vue"
import { useForm } from "@inertiajs/inertia-vue3"

import Layout from "../Template/Layout.vue"
import Task from "../Components/Task.vue"
import InputForm from "../Components/InputForm.vue"

const props = defineProps( ['tasks'] )
const tasks = props.tasks

const openModal = ref(false)

const formNewTask = useForm({
  title: '',
  description: '',
})

const taskToDo  = computed( () => tasks.filter( task => task.state == 1 ) )
const taskDoing = computed( () => tasks.filter( task => task.state == 2 ) )
const taskDone  = computed( () => tasks.filter( task => task.state == 3 ) )


function updateTaskState(id, state) {
  return new Promise( (resolve, reject) => {
    const form = useForm( { id, state } )

    form.put( route('task'), {
      onSuccess: resolve,
      onError: reject
    } )
  } )
}


function dragStart( event, item ) {
  event.dataTransfer.dropEffect = "move"
  event.dataTransfer.effectAllowed = "move"
  event.dataTransfer.setData('id', item.id)
}

function drop( event, state ) {
  const taskId = event.dataTransfer.getData('id')
  const task = tasks.find( task => task.id == taskId )

  updateTaskState(task.id, state)
    .then( () => task.state = state )
    .catch( (err) => console.log(err) )
}

</script>
