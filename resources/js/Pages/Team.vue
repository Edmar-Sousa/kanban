<template>
    <Layout>
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

            <template v-if="friendsList.length">
                <div v-for="letter in getFirstLetterFriendsList" :key="letter" class="my-6">
                    <div class="w-10 h-10 rounded bg-[#7C3AED] text-white leading-10 text-xl text-center uppercase">{{ letter }}</div>

                    <ul class="mt-5">
                        <li class="px-10 mt-4 flex items-center" v-for="( friend, i ) in filterByLetter( letter )" :key="i">
                            <img
                                :src="loadImage(
                                    friend.source_user_data.id == id ?
                                    friend.destination_user_data.image :
                                    friend.source_user_data.image
                                )"
                                alt="imagem de perfil"
                                class="w-16 h-16 mx-7 rounded-full" />

                            <div class="flex-1">
                                <p class="font-bold text-xl">
                                    {{
                                        friend.source_user_data.id == id ?
                                        friend.destination_user_data.name :
                                        friend.source_user_data.name
                                    }}
                                </p>
                                <p class="text-base text-[#1E293B]">
                                    {{
                                        friend.source_user_data.id == id ?
                                        friend.destination_user_data.email :
                                        friend.source_user_data.email
                                    }}
                                </p>
                            </div>

                            <div>
                                <button
                                    type="button"
                                    class="w-9 h-9 bg-red-500/50 text-red-700 leading-10 rounded-md hover:scale-95"
                                    @click="handleDeleteFriend( friend.source_user_data.id == id ? friend.destination_user_data.id : friend.source_user_data.id)">
                                        <user-x size="20" class="mx-auto" />
                                </button>
                            </div>
                        </li>
                    </ul>
                </div>
            </template>

            <div v-else class="mt-10">
                <h2 class="text-xl font-bold text-center mb-1 text-[#403937]">
                    Nenhum amigo encontrado
                </h2>

                <p class="text-center text-base mb-8 text-[#403937]">
                    Adicione amigos para interagir com suas tarrefas
                </p>

                <img
                    src="/images/undraw_social_friends.svg"
                    class="w-1/2 mx-auto max-w-[500px]" />

            </div>
        </main>
    </Layout>

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
                            <user-plus-2 size="20" />
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
                    <li v-for="invite in invitesData.data"
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
                                    @click="handleAcceptInvite(invite.id)">
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

import { UserPlus2, UserCheck, UserX } from 'lucide-vue-next'
import { computed, shallowRef, ref, onMounted } from 'vue'
import { useToast } from 'vue-toast-notification'

import Layout from '@/Template/Layout.vue'
import InputForm from '@/Components/InputForm.vue'
import Notification from '@/Components/Notification.vue'
import Modal from '@/Components/Modal.vue'
import { useForm } from '@inertiajs/vue3'


const props = defineProps( [ 'image', 'id' ] )


const friendsList = ref([])

const getFirstLetterFriendsList = computed( () => new Set( friendsList.value.map( friend => {
    return friend.source_user_data.id == props.id       ?
           friend.destination_user_data.name.charAt(0)  :
           friend.source_user_data.name.charAt(0)
} ) ) )

onMounted(() => {
    findFrinds()
})


function filterByLetter( letter ) {
    return friendsList.value.filter( friend => {
        const firstLetter = friend.source_user_data.id == props.id  ?
           friend.destination_user_data.name.charAt(0) :
           friend.source_user_data.name.charAt(0)


        return firstLetter == letter
    })
}


const inviteForm = useForm({
    email: '',
})


function clearMessages() {
    inviteForm.reset()
    inviteForm.email = ''
}

async function submitForm() {

    inviteForm.post(route('team.invite.create'))

    // websocket.send({
    //     event: 'invite-friend',
    //     token: jwttoken.getToken(),
    //     data: {
    //         email: email.value,
    //     }
    // })

    // websocket.recv('invite-friend-success', data => messageresponse.value = data)
    // websocket.recv('invite-friend-error', data => messageresponse.value = data)
}


function handleAcceptInvite(id) {



    // websocket.send({
    //     event: 'accept-invite',
    //     token: jwttoken.getToken(),
    //     data: {
    //         inviteId: id,
    //     },
    // })

    // websocket.recv('accept-invite-success', data => {
    //     messageresponse.value = data

    //     handleViewInvites()
    //     findFrinds()
    // })
    // websocket.recv('accept-invite-error', data => {
    //     messageresponse.value = data

    //     handleViewInvites()
    //     findFrinds()
    // })

}


const modalSendInvite = ref(null)

function handleOpenModal() {
    if (modalSendInvite.value)
        modalSendInvite.value.showModal()
}


const toast = useToast({
  position: 'top-right',
})

const invitesData = shallowRef(null)
const modalFriendsInvite = shallowRef(null)

async function handleViewInvites() {
    try {
        const response = await axios.get(route('team.invite.index'));

        invitesData.value = response.data

        if (modalFriendsInvite.value)
            modalFriendsInvite.value.showModal()
    }
    catch {
        toast.error('Erro ao buscar convites, tente mais tarde')
    }
}


async function findFrinds() {
    try {
        const response = await axios.get(route('team.list'))

        friendsList.value = response.data
    }

    catch {
        toast.error('Erro ao fazer convite, tente mais tarde')
    }
}


async function handleDeleteFriend(id) {
    try {
        const response = await axios.delete(route('team.delete', { id }))

        if (response.status === 200)
        {
            toast.success(response.data?.message)
            findFrinds()
        }
    }

    catch {
        toast.error('Erro ao remover da lista de amigos')
    }
}

</script>
