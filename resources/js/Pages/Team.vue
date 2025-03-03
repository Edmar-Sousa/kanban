<template>
    <Head>
        <title>Equipes</title>
    </Head>

    <main class="flex-1 bg-white rounded-tl-2xl px-8 py-12 overflow-y-auto">
        <header class="w-full flex justify-between items-center">
            <h1 class="text-3xl text-[#403937] font-bold inline-block">Adicionar Membro a Equipe</h1>

            <div class="flex items-center gap-10">
                <notification />

                <img
                    :src="loadImage( image )"
                    alt="imagem de perfil"
                    class="w-16 h-16 rounded-full" />
            </div>
        </header>

        <div class="my-10">
            <button
                type="button"
                class="w-[200px] rounded-md bg-[#7C3AED] inline-flex items-center gap-2 justify-center h-10 text-white text-base text-center"
                @click="handleOpenModal">
                    <user-plus-2 size="20" />
                    <span>Convidar</span>
            </button>

            <button
                type="button"
                class="w-[200px] rounded-md text-[#7C3AED] bg-[#7C3AED]/30 inline-flex items-center gap-2 justify-center h-10 text-base text-center ml-4"
                @click="handleViewInvites">
                    <user-plus-2 size="20" />
                    <span>Convites</span>
            </button>
        </div>

        <Suspense>
            <template #default>
                <AsyncListContactsPanel :id="id" />
            </template>

            <template #fallback>
                <SkeletonFriends />
            </template>
        </Suspense>
    </main>

    <modal
        ref="modalSendInvite"
        title="Enviar convite"
        @close-modal="clearMessages">
            <template #modal-body>
                <form action="#" method="POST" @submit.prevent>
                    <div class="my-4">
                        <InputForm
                            type="email"
                            name="username"
                            placeholder="Email do usuario"
                            v-model="inviteForm.email"
                            :error="inviteForm.errors.email" />
                    </div>

                    <button
                        type="button"
                        class="w-[200px] float-right rounded-md bg-[#7C3AED] flex items-center gap-2 justify-center h-10 text-white text-base text-center"
                        @click="submitForm">
                            <UserPlus2 size="20" />
                            <span>Convidar</span>
                    </button>
                </form>
            </template>
    </modal>


    <modal
        ref="modalFriendsInvite"
        title="Seu convites de amizade">
            <template #modal-body>

                <ul v-if="invitesData?.data.length">
                    <li v-for="(invite, index) in invitesData.data"
                        :key="invite.id"
                        class="mt-4">

                            <div class="inline-block">
                                <img
                                    :src="loadImage(invite.source_user_data?.image)"
                                    class="w-10 h-10 rounded-full" />
                            </div>

                            <div class="inline-block ml-3">
                                <p class="text-base font-bold">{{ invite.source_user_data?.name }}</p>
                                <p class="text-sm text-gray-600">{{ invite.source_user_data?.email }}</p>
                            </div>

                            <div class="inline-block float-right">
                                <button
                                    type="button"
                                    class="w-9 h-9 bg-green-500/50 text-green-700 leading-10 rounded-md mr-4 hover:scale-95"
                                    @click="handleAcceptInvite(invite.id, index)">
                                        <user-check size="20" class="mx-auto" />
                                </button>

                                <button
                                    type="button"
                                    class="w-9 h-9 bg-red-500/50 text-red-700 leading-10 rounded-md hover:scale-95">
                                        <user-x size="20" class="mx-auto" />
                                </button>
                            </div>
                    </li>
                </ul>

                <div v-else>
                    <img
                        src="/images/undraw_invite_re_rrcp.svg"
                        class="w-1/2 mx-auto my-5" />

                    <h2 class="text-lg font-bold text-center text-[#1E293B]">Nenhum convite encontrado!</h2>
                    <p class="text-base text-gray-600 text-center">Seus convites apareceram aqui</p>
                </div>
            </template>
    </modal>

</template>


<script setup>

import axios from 'axios'

import { UserCheck, UserPlus2, UserX } from 'lucide-vue-next'
import { shallowRef, ref, defineAsyncComponent, inject } from 'vue'
import { toastProviderKey } from '@/Keys/Provider'

import Layout from '@/Template/Layout.vue'
import InputForm from '@/Components/InputForm.vue'
import Notification from '@/Components/Notification.vue'
import SkeletonFriends from "@/Components/Skeletons/SkeletonFriends.vue"

import Modal from '@/Components/Modal.vue'
import { useForm } from '@inertiajs/vue3'


const props = defineProps( [ 'image', 'id' ] )

defineOptions({ layout: Layout })

const AsyncListContactsPanel = defineAsyncComponent({
    loader: () => import('@/Components/ListContactsPanel.vue'),
})

const inviteForm = useForm({
    email: '',
})


function clearMessages() {
    inviteForm.reset()
    inviteForm.email = ''
}

async function submitForm() {
    inviteForm.post(route('team.invite.create'))
}

const invitesData = ref(null)
const modalFriendsInvite = shallowRef(null)

const handleShowMessage = inject(toastProviderKey)

async function handleAcceptInvite(id, index) {

    try {
        const response = await axios.put(route('team.invite.update', { id }))

        if (response.status === 200) {
            handleShowMessage('success', 'Convite aceito com sucesso')
            invitesData.value.data.splice(index, 1)
        }
    }

    catch (err) {
        if (axios.isAxiosError(err)) {
            handleShowMessage('error', err.response.data.message)
            return
        }

        handleShowMessage('error', 'Erro ao aceitar convite')
    }
}


const modalSendInvite = ref(null)

function handleOpenModal() {
    if (modalSendInvite.value)
        modalSendInvite.value.showModal()
}


async function handleViewInvites() {
    try {
        const response = await axios.get(route('team.invite.index'));

        invitesData.value = response.data

        if (modalFriendsInvite.value)
            modalFriendsInvite.value.showModal()
    }
    catch {
        handleShowMessage('error', 'Erro ao buscar convites, tente mais tarde')
    }
}

</script>
