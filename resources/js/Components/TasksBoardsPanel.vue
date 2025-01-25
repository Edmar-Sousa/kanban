<template>
    <div class="w-full grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-3">
        <div
            class="group/item w-full my-6 p-6 rounded-lg shadow-[0_4px_16px_0px_rgba(22,22,22,0.1)]"
            v-for="taskboard in taskboards"
            :key="taskboard.id">
                <h3 class="text-sm font-bold">{{ taskboard.title }}</h3>
                <p class="my-2.5 text-sm font-medium text-[#756966]">{{ taskboard.description }}</p>

                <div class="w-full flex justify-end gap-2">
                    <button
                        aria-label="Adicionar amigo ao quadro de tarefas"
                        class="hidden group-hover/item:block"
                        @click="handlerAddFriendToBoard(taskboard.id)">
                        <user-plus size="20"
                                   class="w-[20px] h-[20px]" />
                    </button>

                    <button
                        arial-label="Deletar taskboard"
                        class="hidden group-hover/item:block"
                        @click="deleteTaskBoards( taskboard.id )">
                        <trash size="20"
                               class="w-[20px] h-[20px]" />
                    </button>

                    <Link
                        :href="route('taskboard.task.index', { id: taskboard.id })"
                        class="text-sm py-1 px-2 font-medium rounded bg-[#E2D6FF] text-[#7C3AED]">
                            Visualizar
                    </Link>
                </div>
        </div>
    </div>
</template>

<script setup>

import axios from "axios"

import {Trash, UserPlus} from "lucide-vue-next"
import {Link} from "@inertiajs/vue3"
import {shallowRef} from "vue";

const response = await axios.get(route('taskboard.list'))
const taskboards = shallowRef(response.data.taskboards)

</script>
