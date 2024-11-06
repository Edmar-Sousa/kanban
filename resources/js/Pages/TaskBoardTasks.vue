<template>
  <Head>
    <title>Taskboard</title>
  </Head>

  <Layout>
    <main class="flex-1 bg-white rounded-tl-2xl px-8 py-12 overflow-y-auto">
      <header class="w-full flex justify-between items-center">
        <h1 class="text-3xl text-[#403937] font-bold inline-block">{{ taskboard.title }}</h1>
        
        <div class="flex items-center gap-10">
          <notification />

          <img 
            :src="loadImage( image )" 
            alt="imagem de perfil"
            class="w-16 h-16 rounded-full" />
        </div>
      </header>
      
      <div class="w-full min-h-[821px] mt-8 flex justify-between gap-2 overflow-x-auto">
        <div 
          class="min-w-[368px]" 
          @drop="drop($event, 1)"
          @dragover.prevent 
          @dragenter.prevent>
            <div class="w-full flex justify-between items-center">
              <h2 class="font-bold text-xl text-[#403937]">A fazer</h2>

              <button 
                arial-label="Adicionar tarefa"
                class="bg-[#7C3AED] rounded hover:scale-95 text-[#ffffff]" @click="handleOpenModal">
                  <Plus size="25" />
              </button>
            </div>

            <task 
              v-for="task in taskToDo" 
              :key="task.id" 
              :task="task" 
              @drag-start="$event => dragStart($event, task)"
              @on-delete="$event => DeleteTask(task)" />
        </div>

        <div class="min-w-[368px]"
          @drop="drop($event, 2)"
          @dragover.prevent
          @dragenter.prevent>
            <h2 class="font-bold text-xl text-[#403937]">Fazendo</h2>
            <task 
              v-for="task in taskDoing" 
              :key="task.id" 
              :task="task" 
              @drag-start="$event => dragStart($event, task)"
              @on-delete="$event => DeleteTask(task)" />
          </div>
          
          <div class="min-w-[368px]"
            @drop="drop($event, 3)"
            @dragover.prevent
            @dragenter.prevent>
              <h2 class="font-bold text-xl text-[#403937]">Feito</h2>
              <task 
                v-for="task in taskDone" 
                :key="task.id" 
                :task="task" 
                @drag-start="$event => dragStart($event, task)"
                @on-delete="$event => DeleteTask(task)" />
        </div>
      </div>
    </main>

    <Modal 
      ref="modalCreateTask" 
      title="Adicionar nova Tarefa" 
      @close-modal="closeModal">
        <template #modal-body>
          <form action="#" method="POST" @submit.prevent>
            <fieldset class="flex gap-2">
              <div class="flex-1">
                <label
                  for="input-date-start"
                  class="block my-2 text-sm font-semibold text-[#1E293B]">
                    Data de inicio
                </label>

                <date-input
                  name="date-start"
                  placeholder="Data de inicio"
                  v-model="formInputTasks.date_start"
                  :error="formInputTasksErrors.date_start">
                </date-input>
              </div>

              <div class="flex-1">
                <label
                  for="input-date-end"
                  class="block my-2 text-sm font-semibold text-[#1E293B]">
                    Data de fim
                </label>

                <date-input
                  name="date-end"
                  placeholder="Data de fim"
                  v-model="formInputTasks.date_end"
                  :error="formInputTasksErrors.date_end">
                </date-input>
              </div>

            </fieldset>

            <label 
              for="input-title"
              class="block my-2 text-sm font-semibold text-[#1E293B]">
                Tarefa:
            </label>

            <input-form 
              type="text"
              name="title" 
              placeholder="Digite o titulo da terfa"
              v-model="formInputTasks.title"
              :error="formInputTasksErrors.title" />

            <label 
              for="input-description"
              class="block my-2 text-sm font-semibold text-[#1E293B]">
                Descrição
            </label>

            <textarea 
              id="input-description"
              name="description" 
              class="w-full h-[150px] border border-[#E2E8F0] rounded text-sm p-3 outline-none hover:border-[#7C3AED] focus:border-[#7C3AED]"
              :class="{ 'border-red-400': formInputTasksErrors.description }"
              v-model="formInputTasks.description">
            </textarea>

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
        </template>
    </Modal>

  </Layout>
</template>

<script setup>

import { Plus } from 'lucide-vue-next'
import { useForm } from "@inertiajs/inertia-vue3"
import { computed, ref } from "vue"

import Layout from "@/Template/Layout.vue"
import Task from "@/Components/Task.vue"
import InputForm from "@/Components/InputForm.vue"
import DateInput from '../Components/DateInput.vue'
import Notification from "@/Components/Notification.vue"
import Modal from "@/Components/Modal.vue"

const props = defineProps( ["taskboard", "image"] )


const taskToDo  = computed( () => props.taskboard?.tasks.filter( task => task.state == 1 ) )
const taskDoing = computed( () => props.taskboard?.tasks.filter( task => task.state == 2 ) )
const taskDone  = computed( () => props.taskboard?.tasks.filter( task => task.state == 3 ) )


function dragStart( event, item ) {
  event.dataTransfer.dropEffect = "move"
  event.dataTransfer.effectAllowed = "move"
  event.dataTransfer.setData("id", item.id)
}

function drop( event, state ) {
  const taskId = event.dataTransfer.getData("id")
  const task = props.taskboard?.tasks.find( task => task.id == taskId )

  const form = useForm( { id: task.id, state } )

  form.put(route('taskboard.task.update', { id: task.id, }), {
    onSuccess: () => task.state = state,
    onError: err => console.log(err)
  })

}


const formInputTasks = ref({
  id: props.taskboard?.id,
  date_start: null,
  date_end: null,
  title: "",
  description: "",
})

function closeModal() {
  formInputTasks.value = { title: "", description: "" }
}

const formInputTasksErrors = ref({
  title: "",
  description: "",
})

function addNewTask() {
  const form = useForm( { ...formInputTasks.value } )

  form.post(route("taskboard.task.create"), {
    onSuccess: () => formInputTasks.value = { ...formInputTasks.value, title: "", description: "", date_start: null, date_end: null },
    onError: errors => formInputTasksErrors.value = errors
  })
}


function DeleteTask(task) {
  const form = useForm( { id: task.id } )

  form.delete(route("taskboard.task.delete"))
}


const modalCreateTask = ref(null)

function handleOpenModal() {

  if (modalCreateTask.value)
    modalCreateTask.value.showModal()

}

</script>
