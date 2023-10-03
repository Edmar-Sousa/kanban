<template>

    <div class="relative" ref="menuElement">
        <button 
            class="text-[#403937] hover:text-[#7C3AED] relative"
            aria-label="Abrir menu de notificações"
            @click="openNotificationMenu = !openNotificationMenu"
            type="button">
                <Bell size="25" />
    
                <span 
                    v-show="hasNotification"
                    class="block w-5 h-5 rounded-md bg-[#7C3AED] text-[#ffffff] text-[14px] absolute -right-3 -top-3">
                        {{ notificationCount }}
                </span>
        </button>
    
        <div 
            v-show="openNotificationMenu" 
            class="w-full min-w-[300px] py-4 px-3 absolute transition-all duration-300 shadow-[0_4px_16px_0px_rgba(22,22,22,0.1)] right-0 bg-[#ffffff] rounded-md">
                <h3 class="text-xl text-[#403937] font-bold">Notificações</h3>
        
                <ul class="w-full mt-3">
                    <li class="flex items-center gap-2 my-3 cursor-pointer">
                        <div class="w-[50px] h-[50px] bg-slate-400 rounded-full">
                        </div>

                        <div class="flex-1">
                            <p class="text-sm">
                                Você tem um convite de
                                <span class="font-bold">Edinho</span>
                            </p>
                        </div>

                        <div class="w-[10px] h-[10px] bg-[#7C3AED] rounded-full"></div>
                    </li>

                    <li class="flex items-center gap-2 my-3 cursor-pointer">
                        <div class="w-[50px] h-[50px] bg-slate-400 rounded-full">
                        </div>

                        <div class="flex-1">
                            <p class="text-sm">
                                Você tem um convite de
                                <span class="font-bold">Edinho</span>
                            </p>
                        </div>

                        <div class="w-[10px] h-[10px] bg-[#7C3AED] rounded-full"></div>
                    </li>
                </ul>
        </div>
    </div>

</template>

<script setup>

import { Bell } from 'lucide-vue-next'
import { shallowRef, computed, onMounted, onUnmounted } from 'vue'


const openNotificationMenu = shallowRef( false )
const notificationCount = shallowRef( 1 )
const menuElement = shallowRef( null )

const hasNotification = computed( () => notificationCount.value != 0 )


onMounted( () => window.addEventListener( 'click', handleClick ) )
onUnmounted( () => window.removeEventListener( 'click', handleClick ) )

function handleClick( event ) {
    if ( !menuElement.value.contains( event.target ) )
        openNotificationMenu.value = false
}

</script>
