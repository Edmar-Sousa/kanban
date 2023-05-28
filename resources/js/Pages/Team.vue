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
</template>


<script setup>

import Layout from '../Template/Layout.vue'
import { computed } from 'vue'

const props = defineProps( [ 'image' ] )


const friends_list = [
    { name: 'Andre Vitor', email: 'andrevitor@gmail.com' },
    { name: 'Beatriz Sousa', email: 'beatrizsousa@gmail.com' },
    { name: 'Carlos Igor', email: 'carlosigor@gmail.com' },
    { name: 'Vitoria', email: 'vitoria@gmail.com' },
    { name: 'Andre Vitor 02', email: 'andrevitor@gmail.com' },
    { name: 'Beatriz Sousa 02', email: 'beatrizsousa@gmail.com' },
    { name: 'Andre Vitor 03', email: 'andrevitor@gmail.com' },
]


const getFirstLetterFriendsList = computed( () => new Set( friends_list.map( friend => friend.name.charAt(0) ) ) )


function filterByLetter( letter ) {
    return friends_list.filter( friend => friend.name.charAt(0) == letter )
}

</script>
