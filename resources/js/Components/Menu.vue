<template>
  <aside aria-label="Navegação principal" class="w-full h-full max-w-[175px] pl-9 py-8 relative">    
    <img :src="require('~/images/logo.svg').default" alt="Logo do site" />
    <nav class="mt-14">
      <ul class="flex flex-col gap-9">
        <li 
          class="flex gap-4 items-center text-[#CAB3FF] hover:text-[#FFFFFF]" 
          :class="{ 'text-[#FFFFFF]': $page.url.startsWith('/task-board') }">
            <TabletIcon />
            <Link :href="route('taskboard')" class="font-bold text-4">Boards</Link>
        </li>
        
        <li class="flex gap-4 items-center text-[#CAB3FF] hover:text-[#FFFFFF]">
          <PeopleIcon />
          <a href="#" class="font-medium text-4">Equipes</a>
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

import { Link } from "@inertiajs/inertia-vue3"

import TabletIcon from "../Icon/Table.vue"
import PeopleIcon from "../Icon/People.vue"
import DocumentIcon from "../Icon/Document.vue"
import ConfigIcon from "../Icon/Config.vue"
import LogOutIcon from "../Icon/LogOut.vue"
import DollarIcon from "../Icon/Dollar.vue"

</script>
