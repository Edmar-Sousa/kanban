<template>

    <Head>
        <title>Pagina de pagamento</title>
    </Head>

    <div class="w-screen h-screen">
        <header class="p-5">
            <nav>
                <Link :href="route('taskboard')" class="flex items-center text-[#7C3AED]">
                    <ArrowIcon /> Voltar para pagina principal
                </Link>
            </nav>
        </header>
    
        <main class="w-full flex justify-center items-center">
            <form @submit.prevent>
                <form id="payment-form">
                    <div id="link-authentication-element"></div>
                    <div id="payment-element"></div>

                    <button type="button" id="submit" @click="handleSubmit">
                        <span id="button-text">Pay now</span>
                    </button>
                </form>
            </form>
        </main>
    </div>

</template>

<script setup>

import { Link } from "@inertiajs/inertia-vue3"

import ArrowIcon from "../Icon/Arrow.vue"


</script>
