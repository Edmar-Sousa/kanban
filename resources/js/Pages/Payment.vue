<template>

    <Head>
        <title>Pagina de pagamento</title>
    </Head>

    <div class="w-screen h-screen">
        <header class="p-5">
            <nav>
                <Link class="flex items-center text-[#7C3AED]">
                    <arrow-icon /> Voltar para pagina principal
                </Link>
            </nav>
        </header>

        <main class="w-full flex justify-center items-center">
            <form @submit.prevent>
                <label
                    for="credit-card-number"
                    class="block mb-4 text-sm font-semibold text-[#1E293B]">
                        Número do cartão
                </label>

                <input-form
                    type="text"
                    name="credit-card-number"
                    placeholder="0000 0000 0000 0000"
                    mask="#### #### #### ####" />

                <label
                    for="credit-card-name"
                    class="block my-4 text-sm font-semibold text-[#1E293B]">
                        Nome do titular
                </label>

                <input-form
                    type="text"
                    name="credit-card-name"
                    placeholder="Nome como está no cartão" />

                <div class="flex gap-4 mt-4">
                    <div>
                        <label
                            for="credit-card-valid"
                            class="block mb-4 text-sm font-semibold text-[#1E293B]">
                                Validade
                        </label>

                        <input-form
                            type="text"
                            name="credit-card-valid"
                            placeholder="mm/aa"
                            mask="##/##" />
                    </div>

                    <div>
                        <label
                            for="credit-card-cvv"
                            class="block mb-4 text-sm font-semibold text-[#1E293B]">
                                CVV
                        </label>

                        <input-form
                            type="text"
                            name="credit-card-cvv"
                            placeholder="***"
                            mask="###" />
                    </div>
                </div>


                <button
                    arial-label="Botão para finalizar compra"
                    type="submit"
                    class="w-full h-10 text-base font-bold rounded text-white my-9 bg-[#7C3AED] hover:bg-[#9F67FF]">
                        Finalizar
                </button>
            </form>
        </main>
    </div>

</template>

<script setup>

import { Link } from "@inertiajs/inertia-vue3"

import ArrowIcon from "@/Icon/Arrow.vue"
import InputForm from '@/Components/InputForm.vue'


</script>
