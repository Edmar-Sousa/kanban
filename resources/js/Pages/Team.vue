<template>
    <Layout>
        <Head>
            <title>Equipes</title>
        </Head>

        <main class="flex-1 bg-white rounded-tl-2xl px-8 py-12 overflow-y-auto">
            <header class="flex justify-between items-center">
                <h1 class="text-3xl font-bold text-[#403937]">Adicionar Membro a Equipe</h1>
                
                <div>
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

            <div v-for="letter in getFirstLetterFriendsList" :key="letter" class="my-6">
                <div class="w-10 h-10 rounded bg-[#7C3AED] text-white leading-10 text-xl text-center">{{ letter }}</div>

                <ul class="mt-5">
                    <li class="px-10 mt-4 flex items-center" v-for="( friend, i ) in filterByLetter( letter )" :key="i">
                        <img 
                            :src="loadImage( image )" 
                            alt="imagem de perfil"
                            class="w-16 h-16 mx-7 rounded-full" />
                        
                        <div>
                            <p class="font-bold text-xl">{{ friend.name }}</p>
                            <p class="text-base text-[#1E293B]">{{ friend.email }}</p>
                        </div>
                    </li>
                </ul>
            </div>
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
import { computed, shallowRef, onMounted } from 'vue'
import { useForm, usePage } from '@inertiajs/inertia-vue3'

import InputForm from '../Components/InputForm.vue'

import websocket from '../Utils/websocket'
import jwttoken from '../Utils/jwttoken'

const props = defineProps( [ 'image' ] )

const openModal = shallowRef( false )
const email = shallowRef('')

const friends_list = [
    { name: 'Andre Vitor', email: 'andrevitor@gmail.com' },
    { name: 'Carlos Igor', email: 'carlosigor@gmail.com' },
    { name: 'Vitoria', email: 'vitoria@gmail.com' },
    { name: 'Andre Vitor 02', email: 'andrevitor@gmail.com' },
    { name: 'Andre Vitor 03', email: 'andrevitor@gmail.com' },
]


const getFirstLetterFriendsList = computed( () => new Set( friends_list.map( friend => friend.name.charAt(0) ) ) )


onMounted(() => websocket.connect(jwttoken.getToken()))


function filterByLetter( letter ) {
    return friends_list.filter( friend => friend.name.charAt(0) == letter )
}


function submitForm() {
    
    console.log('send')

    websocket.send({
        event: 'notificate',
        token: jwttoken.getToken(),
        data: {
            email: email.value,
        }
    })

}

</script>
