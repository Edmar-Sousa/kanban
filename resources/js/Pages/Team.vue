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
                    class="w-[200px] rounded-md bg-[#7C3AED] flex items-center gap-2 justify-center h-10 text-white text-base text-center"
                    @click="openModal = true">
                        <user-plus-2 size="20" />
                        <span>Convidar</span>
                </button>
            </div>

            <template v-if="friendsList.length">
                <div v-for="letter in getFirstLetterFriendsList" :key="letter" class="my-6">
                    <div class="w-10 h-10 rounded bg-[#7C3AED] text-white leading-10 text-xl text-center uppercase">{{ letter }}</div>
    
                    <ul class="mt-5">
                        <li class="px-10 mt-4 flex justify-between flex-col md:items-center md:flex-row" v-for="( friend, i ) in filterByLetter( letter )" :key="i">
                            <div class="flex items-center mb-4">
                                <img 
                                    :src="loadImage( friend.source_user_data.image )" 
                                    alt="imagem de perfil"
                                    class="w-16 h-16 mx-7 rounded-full" />
                                
                                <div>
                                    <p class="font-bold text-xl">{{ friend.source_user_data.name }}</p>
                                    <p class="text-base text-[#1E293B]">{{ friend.source_user_data.email }}</p>
                                </div>
                            </div>
    
                            <div class="flex flex-wrap justify-end gap-4">
                                <template v-if="friend.status == 3">
                                    <button
                                        type="button"
                                        class="inline-block w-[150px] rounded-md bg-[#7C3AED] px-4 items-center gap-2 justify-center h-10 text-white text-sm text-center hover:scale-95"
                                        @click="handleAcceptInvite(friend.id)">
                                            Aceitar convite
                                    </button>
    
                                    <button
                                        type="button"
                                        class="inline-block w-[150px] rounded-md bg-[#7C3AED] px-4 items-center gap-2 justify-center h-10 text-white text-sm text-center hover:scale-95">
                                            Recusar convite
                                    </button>
                                </template>
    
                            </div>
                        </li>
                    </ul>
                </div>
            </template>
        </main>
    </Layout>

    <div class="fixed top-0 bottom-0 left-0 right-0 bg-[#00000033] flex justify-center items-center" v-show="openModal">
      <div class="bg-white p-4 rounded w-full max-w-[500px]">

        <div class="w-full flex justify-between">
          <h2 class="font-bold">Enviar convite</h2>

          <button arial-label="Close modal" @click="openModal = false">
            <X size="20" />
          </button>
        </div>

        <div 
            v-show="messageresponse.status.length"
            class="w-full p-4 mt-3 text-lg font-bold border rounded" 
            :class="{ 
                'border-green-700 text-green-700 bg-green-400': messageresponse.status == 'success',
                'border-red-700 text-red-700 bg-red-400': messageresponse.status == 'error',
            }"
        >
            <p>{{ messageresponse.message }}</p>
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
        
      </div>
    </div>
</template>


<script setup>

import { UserPlus2, X } from 'lucide-vue-next'

import Layout from '../Template/Layout.vue'
import { computed, shallowRef, ref, onMounted } from 'vue'

import InputForm from '../Components/InputForm.vue'
import Notification from '../Components/Notification.vue'

import websocket from '../Utils/websocket'
import jwttoken from '../Utils/jwttoken'
import axios from 'axios'

const props = defineProps( [ 'image', 'friends' ] )

const openModal = shallowRef( false )
const email = shallowRef('')

const messageresponse = ref({
    status: '',
    message: '',
})

const friendsList = ref([])

const getFirstLetterFriendsList = computed( () => new Set( friendsList.value.map( friend => friend.source_user_data.name.charAt(0) ) ) )


onMounted(() => {
    websocket.connect(jwttoken.getToken())

    findFrinds()
})


function filterByLetter( letter ) {
    return friendsList.value.filter( friend => friend.source_user_data.name.charAt(0) == letter )
}


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
