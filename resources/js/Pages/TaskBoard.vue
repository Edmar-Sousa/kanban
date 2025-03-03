<template>
  <Head>
    <title>TaskBoard</title>
  </Head>

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
            @click="handleOpenModal"
            data-qa-selector="create-taskboard">
              <plus size="25" />
          </button>
        </div>

        <Suspense>
            <template #default>
                <AsyncTasksBoardsComponent ref="taskBoardsPanelRef" />
            </template>

            <template #fallback>
                <SkeletonTasksBoards :number-tasks-boards="3" />
            </template>
        </Suspense>

      </div>
    </main>

    <Modal
      ref="modalAddFriedToBoard"
      title="Adicionar amigo ao quadro de tarefas">
        <template #modal-body>
          <ul
            v-for="friend in friendsList"
            :key="friend.id"
            class="w-full">
              <li class="w-full flex items-center py-1 my-4">
                <check-box
                  v-model="friendsToAddInBoard"
                  :value="friend.id" />

                <img
                  :src="loadImage(
                    friend.source_user_data.id == id ?
                    friend.destination_user_data.image :
                    friend.source_user_data.image
                  )"
                  alt="Foto de perfil do usuario"
                  class="w-[40px] h-[40px] mx-4 rounded-full"/>

                <p class="">
                  {{
                    friend.source_user_data.id == id ?
                    friend.destination_user_data.name :
                    friend.source_user_data.name
                  }}
                </p>
              </li>
          </ul>

          <button
              aria-label="Botão para adicionar a equipe"
              class="flex justify-center align-items text-sm font-normal gap-2 text-white bg-[#7C3AED] p-3 w-[135px] rounded hover:scale-95"
              @click="handlerInviteToTeam">
                Adicionar
            </button>
        </template>
    </Modal>


    <Modal
      ref="modalCreateTaskboard"
      title="Adicionar nova Board"
      @close-modal="clearMessages">
        <template #modal-body>
          <form-alert
            data-qa-selector="form-alert"
            v-if="$page.props?.flash?.status"
            :message="$page.props?.flash?.message"
            :type="$page.props?.flash?.status" />

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
                @click="createTaskBoard()"
                data-qa-selector="send-form-taskboard">
                  Criar
              </button>
            </div>
          </form>
        </template>
    </Modal>
</template>

<script setup>

import axios from 'axios'
import {ref, defineAsyncComponent, useTemplateRef, inject} from 'vue'

import { useForm, usePage } from "@inertiajs/vue3"
import { Plus } from 'lucide-vue-next'

import { toastProviderKey } from '@/Keys/Provider'

import FormAlert from '@/Components/FormAlert.vue'
import Layout from '@/Template/Layout.vue'
import InputForm from '@/Components/InputForm.vue'
import CheckBox from '@/Components/CheckBox.vue'

import Notification from '@/Components/Notification.vue'
import Modal from '@/Components/Modal.vue'
import SkeletonTasksBoards from "@/Components/Skeletons/SkeletonTasksBoards.vue";

const props = defineProps( ['id', 'image'] )

defineOptions({ layout: Layout })

const friendsToAddInBoard = ref([])

const tasksBoardsPanelRef = useTemplateRef('taskBoardsPanelRef')
const AsyncTasksBoardsComponent = defineAsyncComponent({
  loader: () => import("@/Components/TasksBoardsPanel.vue"),
})


const form = useForm({
  title: '',
  description: '',
})

const errors = ref({
  title: '',
  description: '',
})

function createTaskBoard() {
  form.post(route('taskboard.create'), {
    onSuccess: () => {
      form.title = ''
      form.description = ''

      tasksBoardsPanelRef.value.getTasksboards()
    },
    onError: (error) => errors.value = error
  })
}

const modalCreateTaskboard = ref(null)

function handleOpenModal() {
  if (modalCreateTaskboard.value)
    modalCreateTaskboard.value.showModal()
}


const page = usePage()

function clearMessages() {
  if ( page.props?.value?.flash )
    page.props.value.flash = {}
}


const modalAddFriedToBoard = ref(null)
const friendsList = ref(null)

const handleShowMessage = inject(toastProviderKey)

async function findFriends() {
  try {
    const response = await axios.get(route('team.list'))

    friendsList.value = response.data
  }
  catch {
      handleShowMessage('error', 'Erro ao busca lista de amigos')
  }
}

async function handlerAddFriendToBoard() {
  if (!modalAddFriedToBoard.value)
    return

  await findFriends()
  modalAddFriedToBoard.value.showModal()
}


async function handlerInviteToTeam() {
  try {
    const response = await axios.post(route('team.invite.team'))

    if (response.status === 200)
        handleShowMessage('success', 'Convite enviado com sucesso')
  }

  catch {
      handleShowMessage('error', 'Erro ao enviar convite')
  }
}

</script>
