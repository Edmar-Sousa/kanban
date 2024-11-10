<template>

    <div class="relative" ref="menuElement">
        <button 
            class="text-[#403937] hover:text-[#7C3AED] relative"
            aria-label="Abrir menu de notificações"
            @click="handleOpenMenu"
            type="button">
                <Bell size="25" />
    
                <span 
                    v-show="hasUnrededNotification"
                    class="block w-5 h-5 rounded-md bg-[#7C3AED] text-[#ffffff] text-[14px] absolute -right-3 -top-3">
                        {{ hasUnrededNotification }}
                </span>
        </button>
    
        <div 
            v-show="openNotificationMenu" 
            class="w-full min-w-[300px] py-4 px-3 absolute transition-all duration-300 shadow-[0_4px_16px_0px_rgba(22,22,22,0.1)] right-0 bg-[#ffffff] rounded-md">
                <h3 class="text-xl text-[#403937] font-bold">Notificações</h3>
        
                <ul class="w-full mt-3 max-h-[300px] overflow-y-auto" v-show="notifications.length">
                    <li 
                        v-for="notification in notifications"
                        :key="notification.id"
                        class="flex items-center gap-2 my-3 cursor-pointer">
                            <div class="w-[50px] h-[50px] bg-slate-400 rounded-full">
                                <img 
                                    :src="loadImage( notification.image )" 
                                    alt="imagen de perfil" 
                                    class="w-[50px] h-[50px] bg-slate-400 rounded-full" />
                            </div>

                            <div class="flex-1">
                                <p class="text-sm">
                                    {{ notification.message }}
                                    <span class="font-bold">{{ notification.source_user }}</span>
                                </p>

                                <p>
                                    <button 
                                        v-if="!notification.visible"
                                        type="button"
                                        class="text-sm text-[#7C3AED]"
                                        @click="handleMarkVisible(notification.id)">
                                            ver
                                    </button>
                                </p>
                            </div>

                            <div 
                                class="w-[10px] h-[10px] bg-[#7C3AED] rounded-full"
                                v-show="!notification.visible">
                            </div>
                    </li>
                </ul>

                <div v-show="!notifications.length">
                    <alert-triangle size="25" class="mt-4 mb-2 mx-auto text-[#7C3AED]" />
                    <p class="text-base text-[#403937] text-center">
                        Voçê não tem nenhuma notificação.
                    </p>
                </div>
        </div>
    </div>

</template>

<script setup>


import axios from 'axios'

import { Bell, AlertTriangle } from 'lucide-vue-next'
import { shallowRef, computed, onMounted, onUnmounted } from 'vue'

import { usePage } from '@inertiajs/vue3'


const openNotificationMenu = shallowRef( false )
const menuElement = shallowRef( null )

const notifications = shallowRef( [] )


const hasUnrededNotification = computed( () => notifications.value.filter( notification => !notification.visible ).length )

const page = usePage()

onMounted( () => {
    window.addEventListener( 'click', handleClick ) 
    
    window.Echo
        .private(`notification.${page.props.id}`)
        .listen('NotificationEvent', e => console.log(e))
} )

onUnmounted( () => window.removeEventListener( 'click', handleClick ) )


function handleClick( event ) {
    if ( !menuElement.value.contains( event.target ) )
        openNotificationMenu.value = false
}



function handleOpenMenu() {
    openNotificationMenu.value = !openNotificationMenu.value
}


async function findNotifications() {
    try {
        const response = await axios.get( route( 'notifications.index' ) )
        notifications.value = response.data
    }

    catch ( err ) {
        console.log( err )
    }
}


async function handleMarkVisible(id) {
    try {
        await axios.put( route( 'notifications.mark-view', id ) )

        findNotifications()
    }

    catch ( err ) {
        console.log( err )
    }
}

</script>
