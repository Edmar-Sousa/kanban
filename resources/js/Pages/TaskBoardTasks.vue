<template>
  <Layout>
    <main class="flex-1 bg-white rounded-tl-2xl px-8 py-12 overflow-y-auto">
      <header class="w-full flex justify-between items-center">
        <h1 class="text-3xl font-bold text-[#403937]">{{ taskboard.title }}</h1>
        
        <div>
          <img 
            :src=" loadImage( image )" 
            alt="imagem de perfil"
            class="w-16 h-16 rounded-full" />
        </div>
      </header>
      
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
                  <img :src="require('~/images/plus.svg').default" alt="Plus icon" />
              </button>
            </div>

            <Task 
              v-for="task in taskToDo" 
              :key="task.id" 
              :task="task" 
              @dragStart="dragStart"
              @onDelete="DeleteTask($event)" />
        </div>

        <div class="w-[368px]"
          @drop="drop($event, 2)"
          @dragover.prevent
          @dragenter.prevent>
            <h2 class="font-bold text-xl text-[#403937]">Fazendo</h2>
            <Task 
              v-for="task in taskDoing" 
              :key="task.id" 
              :task="task" 
              @dragStart="dragStart"
              @onDelete="DeleteTask($event)" />
          </div>
          
          <div class="w-[368px]"
            @drop="drop($event, 3)"
            @dragover.prevent
            @dragenter.prevent>
              <h2 class="font-bold text-xl text-[#403937]">Feito</h2>
              <Task 
                v-for="task in taskDone" 
                :key="task.id" 
                :task="task" 
                @dragStart="dragStart"
                @onDelete="DeleteTask($event)" />
        </div>
      </div>
    </main>


    <div class="fixed top-0 bottom-0 left-0 right-0 bg-[#00000033] flex justify-center items-center" v-show="openModal">
      <div class="bg-white p-4 rounded w-full max-w-[500px]">
        <div class="w-full flex justify-between">
          <h2 class="font-bold">Adicionar nova Tarefa</h2>

          <button arial-label="Close modal" @click="closeModal()">
            <img :src="require('~/images/x.svg').default" alt="close icon" />
          </button>
        </div>

        <form action="#" method="POST" @submit.prevent>
          <label 
            for="input-title"
            class="block my-2 text-sm font-semibold text-[#1E293B]">Tarefa</label>

          <InputForm 
            type="text"
            name="title" 
            placeholder="Digite o titulo da terfa"
            v-model="formInputTasks.title"
            :error="formInputTasksErrors.title" />

          <label 
            for="input-title"
            class="block my-2 text-sm font-semibold text-[#1E293B]">Descrição</label>

          <textarea 
            name="description" 
            class="w-full h-[150px] border border-[#E2E8F0] rounded text-sm p-3 outline-none hover:border-[#7C3AED] focus:border-[#7C3AED]"
            :class="{ 'border-red-400': formInputTasksErrors.description }"
            v-model="formInputTasks.description"></textarea>

          <p v-show="formInputTasksErrors.description" class="text-xs text-red-400 mt-2">{{ formInputTasksErrors.description }}</p>

          <div class="w-full flex justify-end">
            <button 
              aria-label="Botão para filtrar tarefas"
              class="flex justify-center align-items text-sm font-normal gap-2 text-white bg-[#7C3AED] p-3 w-[135px] rounded hover:scale-95"
              @click="addNewTask()">
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

const props = defineProps( ["taskboard", "image"] )
const openModal = ref(false)

const formInputTasks = ref({
  id: props.taskboard?.id,
  title: "",
  description: "",
})

const formInputTasksErrors = ref({
  title: "",
  description: "",
})

const taskToDo  = computed( () => props.taskboard?.tasks.filter( task => task.state == 1 ) )
const taskDoing = computed( () => props.taskboard?.tasks.filter( task => task.state == 2 ) )
const taskDone  = computed( () => props.taskboard?.tasks.filter( task => task.state == 3 ) )


function closeModal() {
  openModal.value = false
  formInputTasks.value = { title: "", description: "" }
}

function dragStart( event, item ) {
  event.dataTransfer.dropEffect = "move"
  event.dataTransfer.effectAllowed = "move"
  event.dataTransfer.setData("id", item.id)
}

function drop( event, state ) {
  const taskId = event.dataTransfer.getData("id")
  const task = props.taskboard?.tasks.find( task => task.id == taskId )

  const form = useForm( { id: task.id, state } )

  form.put(route("task", { id: task.id, }), {
    onSuccess: () => task.state = state,
    onError: (err) => console.log(err)
  })

}

function addNewTask() {
  const form = useForm( { ...formInputTasks.value } )

  form.post(route("task"), {
    onSuccess: () => formInputTasks.value = { title: "", description: "" },
    onError: (errors) => formInputTasksErrors.value = errors
  })
}

function DeleteTask(task) {
  const form = useForm( { id: task.id } )

  form.delete(route("task"))
}

</script>
