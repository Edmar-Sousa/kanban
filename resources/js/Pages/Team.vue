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
                    >
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
                                :src="loadImage( friend.source_user_data.image )" 
                                alt="imagem de perfil"
                                class="w-16 h-16 mx-7 rounded-full" />
                            
                            <div>
                                <p class="font-bold text-xl">{{ friend.source_user_data.name }}</p>
                                <p class="text-base text-[#1E293B]">{{ friend.source_user_data.email }}</p>
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
                    :src="require('~/images/undraw_social_friends.svg').default"
                    class="w-1/2 mx-auto max-w-[500px]" />

            </div>
        </main>
    </Layout>

    <modal 
        ref="modalSendInvite" 
        title="Enviar convite">
            <template #modal-body>
                <div 
                    v-show="messageresponse.status.length"
                    class="w-full p-4 mt-3 text-lg font-bold border rounded" 
                    :class="messagestyle">
                        <p>
                            {{ messageresponse.message }}
                        </p>
                </div>

                <form action="#" method="POST" @submit.prevent>
                    <div class="my-4">
                        <InputForm
                            type="email"
                            name="username"
                            placeholder="Email do usuario"
                            v-model="email" />
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

</template>


<script setup>

import axios from 'axios'

import { UserPlus2 } from 'lucide-vue-next'
import { computed, shallowRef, ref, onMounted } from 'vue'


import Layout from '../Template/Layout.vue'
import InputForm from '../Components/InputForm.vue'
import Notification from '../Components/Notification.vue'
import Modal from '../Components/Modal.vue'

import websocket from '../Utils/websocket'
import jwttoken from '../Utils/jwttoken'

const props = defineProps( [ 'image', 'friends' ] )


const friendsList = ref([])

const getFirstLetterFriendsList = computed( () => new Set( friendsList.value.map( friend => friend.source_user_data.name.charAt(0) ) ) )

onMounted(() => {
    websocket.connect(jwttoken.getToken())

    findFrinds()
})


function filterByLetter( letter ) {
    return friendsList.value.filter( friend => friend.source_user_data.name.charAt(0) == letter )
}


const email = shallowRef('')
const messageresponse = ref({
    status: '',
    message: '',
})

const messagestyle = computed(() => messageresponse.value.status == 'success' 
    ? 'border-green-700 text-green-700 bg-green-400'
    : 'border-red-700 text-red-700 bg-red-400'
)

async function submitForm() {
    websocket.send({
        event: 'invite-friend',
        token: jwttoken.getToken(),
        data: {
            email: email.value,
        }
    })

    websocket.recv('invite-friend-success', data => messageresponse.value = data)
    websocket.recv('invite-friend-error', data => messageresponse.value = data)
}


function handleAcceptInvite(id) {

    console.log('ok')

    websocket.send({
        event: 'accept-invite',
        token: jwttoken.getToken(),
        data: {
            inviteId: id,
        },
    })

    websocket.recv('accept-invite-success', data => console.log(data))
    websocket.recv('accept-invite-error', data => console.log(data))

}


const modalSendInvite = ref(null)

function handleOpenModal() {
    if (modalSendInvite.value)
        modalSendInvite.value.showModal()
}


async function findFrinds() {
    try {
        const response = await axios.get(route('team.list'))

        friendsList.value = response.data
    }

    catch {
        console.log('ok')
    }
}

</script>
