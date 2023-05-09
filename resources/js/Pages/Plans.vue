<template>

    <Head>
        <title>{{ title }}</title>
    </Head>

    <main class="w-full p-5">
        
        <div class="mx-auto max-w-[980px] flex flex-wrap items-center flex-col gap-6  md:flex-row md:items-stretch md:justify-between">
            <article 
                class="w-full max-w-[300px] p-4 border border-[#E2E8F0] rounded-lg" 
                v-for="plan in plans" :key="plan.title">
                    <h2 class="text-[#7C3AED] text-sm font-semibold uppercase">{{ plan.small_description }}</h2>
    
                    <div class="w-full mt-2 flex justify-between items-end text-[#1E293B]">
                        <p class="text-2xl font-bold">{{ plan.title }}</p>
                        <p class="text-lg font-normal">R$ <span class="font-bold">{{ plan.price }}/mês</span></p>
                    </div>
    
                    <button 
                        :arial-label="`Assinar plano ${ plan.title }`"
                        class="w-full h-14 mt-4 border border-[#1E293B] rounded-md text-[#1E293B] text-sm font-bold">
                            Assinar agora
                    </button>
    
                    <hr class="my-4" />
    
                    <ul>
                        <li class="flex items-center gap-2 mb-4" v-for="item in plan.items">
                            <img :src="require('~/images/check.svg').default" alt="Icone de check" />
                            <p class="text-sm font-normal text-[#475569]">{{ item.title }}</p>
                        </li>
                    </ul>
            </article>
        </div>

    </main>

</template>

<script setup>

const props = defineProps(['title'])

const plans = [
    {
        title: "Gratis",
        small_description: "Para você começar",
        price: 0.0,
        items: [
            { title: "Equipes com 3 usuarios" },
            { title: "Até 3 boards de tarefas" },
            { title: "Geração de um relatório" },
        ]
    },

    {
        title: "PRO",
        small_description: "Para você decolar",
        price: 4.99,
        items: [
            { title: "Equipes com 5 usuarios" },
            { title: "Até 5 boards de tarefas" },
            { title: "Geração de 3 relatórios" },
        ]
    },

    {
        title: "PREMIUM",
        small_description: "Para empresas",
        price: 9.99,
        items: [
            { title: "Equipes com usuarios ilimitados" },
            { title: "Boards de tarefas ilimitados" },
            { title: "Geração de relatórios ilimitados" },
        ]
    },
]


</script>
