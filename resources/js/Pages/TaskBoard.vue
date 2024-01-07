<template>
  <Head>
    <title>TaskBoard</title>
  </Head>

  <Layout>
    <main class="flex-1 bg-white rounded-tl-2xl px-8 py-12 overflow-y-auto">
      <header class="flex justify-between items-center">
        <h1 class="text-3xl font-bold text-[#403937]">Boards</h1>
        
        <div class="flex items-center gap-10">
          <notification />

          <img 
            :src="loadImage( image )" 
            alt="imagem de perfil"
            class="w-16 h-16 rounded-full" />
        </div>
      </header>
      
      <div class="w-full min-h-[821px] mt-8">
        <div class="w-full flex justify-between items-center">
          <h2 class="font-bold text-xl text-[#403937]">Seus boards</h2>

          <button 
            arial-label="Criar um novo board"
            class="bg-[#7C3AED] text-[#ffffff] rounded hover:scale-95" 
            @click="handleOpenModal">
              <plus size="25" />
          </button>
        </div>

        <div class="w-full grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-3">
          <div 
            class="group/item w-full my-6 p-6 rounded-lg shadow-[0_4px_16px_0px_rgba(22,22,22,0.1)]" 
            v-for="taskboard in taskboards" 
            :key="taskboard.id">
              <h3 class="text-sm font-bold">{{ taskboard.title }}</h3>
              <p class="my-2.5 text-sm font-medium text-[#756966]">{{ taskboard.description }}</p>

              <div class="w-full flex justify-end gap-2">
                <button 
                  arial-label="Deletar taskboard" 
                  class="hidden group-hover/item:block"
                  @click="deleteTaskBoards( taskboard.id )">
                    <trash size="20"
                      class="w-[20px] h-[20px]" />
                </button>

                <Link 
                  :href="`${route('task')}/${taskboard.id}`" 
                  class="text-sm py-1 px-2 font-medium rounded bg-[#E2D6FF] text-[#7C3AED]">
                    Visualizar
                </Link>
              </div>
          </div>

        </div>
      </div>
    </main>

    <Modal 
      ref="modalCreateTaskboard" 
      title="Adicionar nova Board"
      @close-modal="clearMessages">
        <template #modal-body>
          <form-alert 
            v-if="$page.props?.flash.status"
            :message="$page.props?.flash.message"
            :type="$page.props?.flash.status" /> 

          <form action="#" method="POST" @submit.prevent>
            <label 
              for="input-title"
              class="block my-2 text-sm font-semibold text-[#1E293B]">Titulo</label>

            <input-form 
              type="text"
              name="title" 
              placeholder="Digite o titulo"
              v-model="form.title"
              :error="errors.title" />

            <label 
              for="input-title"
              class="block my-2 text-sm font-semibold text-[#1E293B]">
                Descrição
            </label>

            <textarea 
              name="description" 
              class="w-full h-[150px] border border-[#E2E8F0] rounded text-sm p-3 outline-none hover:border-[#7C3AED] focus:border-[#7C3AED]"
              :class="{ 'border-red-400': errors.description }"
              v-model="form.description"
              :error="errors.description">
            </textarea> 

            <p v-show="errors.description" class="text-xs text-red-400 mt-2">
              {{ errors.description }}
            </p> 

            <div class="w-full flex justify-end">
              <button 
                aria-label="Botão para filtrar tarefas"
                class="flex justify-center align-items text-sm font-normal gap-2 text-white bg-[#7C3AED] p-3 w-[135px] rounded hover:scale-95"
                @click="createTaskBoard()">
                  Criar
              </button>
            </div>
          </form>
        </template>
    </Modal>

  </Layout>
</template>

<script setup>

import { ref, onMounted } from 'vue'
import { Link, useForm, usePage } from "@inertiajs/inertia-vue3"
import { Plus, Trash } from 'lucide-vue-next'

import jwttoken from '../Utils/jwttoken'

import FormAlert from '../Components/FormAlert.vue'
import Layout from '../Template/Layout.vue'
import InputForm from '../Components/InputForm.vue'

import Notification from '../Components/Notification.vue'
import Modal from '../Components/Modal.vue'

const props = defineProps( ['taskboards', 'image', 'token'] )


onMounted(() => jwttoken.setToken(props.token)) 


const form = useForm({
  title: '',
  description: '',
})

const errors = ref({
  title: '',
  description: '',
})

function createTaskBoard() {
  form.post(route('taskboard'), {
    onSuccess: () => { 
      form.title = '' 
      form.description = ''
    },
    onError: (error) => errors.value = error
  })
}


function deleteTaskBoards( id ) {
  const deleteForm = useForm({ id })
  deleteForm.delete(route('taskboard'))
}

const modalCreateTaskboard = ref(null)

function handleOpenModal() {
  if (modalCreateTaskboard.value)
    modalCreateTaskboard.value.showModal()
}


const page = usePage()

function clearMessages() {
  if ( page.props.value.flash )
    page.props.value.flash = {}
}

</script>
