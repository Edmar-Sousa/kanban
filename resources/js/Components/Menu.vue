<template>
  <aside aria-label="Navegação principal" class="w-full h-full max-w-[175px] pl-9 py-8 relative">    
    <img src="images/logo.svg" alt="Logo do site" />
    
    <nav class="mt-14">
      <ul class="flex flex-col gap-9">
        <li class="flex gap-4 items-center">
          <img src="images/tablet.svg" alt="Icone de um tablet" />
          <Link :href="route('taskboard')" class="font-bold text-4 text-[#FFFFFF]">Boards</Link>
        </li>
        
        <li class="flex gap-4 items-center">
          <img src="images/peplo.svg" alt="Icone de usuario" />
          <a href="#" class="font-medium text-4 text-[#CAB3FF]">Equipes</a>
        </li>
        
        <li class="flex gap-4 items-center">
          <img src="images/document.svg" alt="Icone de documento" />
          <a href="#" class="font-medium text-4 text-[#CAB3FF]">Relatórios</a>
        </li>
        
        <li class="flex gap-4 items-center">
          <img src="images/config.svg" alt="Icone de configuração" />
          <Link href="#" class="font-medium text-4 text-[#CAB3FF]">Ajustes</Link>
        </li>

        <li class="flex gap-4 items-center">
          <img src="images/log-out.svg" alt="Icone de logout" />
          <Link :href="route('logout')" class="font-medium text-4 text-[#CAB3FF]">Sair</Link>
        </li>
      </ul>
    </nav>
  </aside>
</template>

<script setup>

import { Link } from "@inertiajs/inertia-vue3"

</script>
