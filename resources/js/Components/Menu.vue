<template>
  <button class="absolute top-4 left-2 md:hidden text-[#403937]" @click="openMenu = !openMenu">
    <Menu size="25" />
  </button>

  <aside 
    aria-label="Navegação principal" 
    class="absolute w-[175px] top-0 bottom-0 pl-9 py-8 bg-[#7C3AED] transition-all duration-300 md:relative"
    :class="{ 'left-0 md:left-0': openMenu, '-left-full md:left-0': !openMenu }">
      <button class="absolute right-2 top-4 text-[#FFFFFF] md:hidden" @click="openMenu = !openMenu">
        <X size="25" class="pointer-events-none" />
      </button>

      <img src="/images/logo.svg" alt="Logo do site" />
      <nav class="mt-14">
        <ul class="flex flex-col gap-9">
          <li 
            class="flex gap-4 items-center text-[#CAB3FF] hover:text-[#FFFFFF]" 
            :class="{ 'text-[#FFFFFF]': $page.url.startsWith('/task-board') }">
              <TabletIcon />
              <Link :href="route('taskboard.index')" class="font-bold text-4">Boards</Link>
          </li>
          
          <li 
            class="flex gap-4 items-center text-[#CAB3FF] hover:text-[#FFFFFF]"
            :class="{ 'text-[#FFFFFF]': $page.url.startsWith('/team') }">
              <PeopleIcon />
              <Link :href="route('team.index')" class="font-medium text-4">Equipes</Link>
          </li>
          
          <li class="flex gap-4 items-center text-[#CAB3FF] hover:text-[#FFFFFF]">
            <DocumentIcon />
            <a href="#" class="font-medium text-4">Relatórios</a>
          </li>
          
          <li 
            class="flex gap-4 items-center text-[#CAB3FF] hover:text-[#FFFFFF]"
            :class="{ 'text-[#FFFFFF]': $page.url == '/config' }">
              <ConfigIcon />
              <Link :href="route('config')" class="font-medium text-4">Ajustes</Link>
          </li>

          <li 
            class="flex gap-4 items-center text-[#CAB3FF] hover:text-[#FFFFFF]">
              <DollarIcon />
              <Link :href="route('plans')" class="font-medium text-4">Planos</Link>
          </li>

          <li class="flex gap-4 items-center text-[#CAB3FF] hover:text-[#FFFFFF]">
            <LogOutIcon />
            <Link :href="route('logout')" class="font-medium text-4">Sair</Link>
          </li>
        </ul>
      </nav>
  </aside>
</template>

<script setup>

import { Menu, X,  } from 'lucide-vue-next'
import { Link } from "@inertiajs/inertia-vue3"
import { shallowRef } from 'vue'

import TabletIcon from "@/Icon/Table.vue"
import PeopleIcon from "@/Icon/People.vue"
import DocumentIcon from "@/Icon/Document.vue"
import ConfigIcon from "@/Icon/Config.vue"
import LogOutIcon from "@/Icon/LogOut.vue"
import DollarIcon from "@/Icon/Dollar.vue"


const openMenu = shallowRef( false )


</script>
