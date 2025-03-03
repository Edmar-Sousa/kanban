<script setup>

import axios from "axios"

import {UserX} from "lucide-vue-next"
import {useToast} from "vue-toast-notification"
import {computed, ref, shallowRef} from "vue"


const props = defineProps({
    id: {
        type: Number,
        required: true,
    }
})

const toast = useToast({
    position: 'top-right',
})

const friendsList = ref([])
const isLoading = shallowRef(true)

findFriends()

async function findFriends() {
    isLoading.value = true

    try {
        const response = await axios.get(route('team.list'))
        friendsList.value = response.data
    }

    catch {
        toast.error('Erro ao fazer convite, tente mais tarde')
    }

    isLoading.value = false
}

function filterByLetter( letter ) {
    return friendsList.value.filter( friend => {
        const firstLetter = friend.source_user_data.id === props.id  ?
            friend.destination_user_data.name.charAt(0) :
            friend.source_user_data.name.charAt(0)


        return firstLetter === letter
    })
}

const getFirstLetterFriendsList = computed( () => new Set(
        friendsList.value.map(friend => friend.source_user_data.id === props.id ?
            friend.destination_user_data.name.charAt(0) :
            friend.source_user_data.name.charAt(0)
        )
    )
)


async function handleDeleteFriend(id) {
    try {
        const response = await axios.delete(route('team.delete', { id }))

        if (response.status === 200)
        {
            toast.success(response.data?.message)
            findFriends()
        }
    }

    catch {
        toast.error('Erro ao remover da lista de amigos')
    }
}

</script>

<template>

    <template v-if="friendsList.length && !isLoading">
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

    <div v-else-if="!friendsList.length && !isLoading" class="mt-10">
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

</template>
