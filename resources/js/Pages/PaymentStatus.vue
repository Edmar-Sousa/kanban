<template>

    <Head title="Status do pagamento" />


    <div class="w-screen h-screen gap-10 p-8 flex flex-col items-center md:flex-row-reverse justify-center">

        <template v-if="isPendding">
            <div>
                <img 
                    :src="require('~/images/undraw_transfer_money.svg').default"
                    alt="imagem de uma moça com um cartão"
                    class="mx-auto w-11/12 max-w-[400px]" />
            </div>
    
            <div class="">
                <h1 class="text-4xl font-bold mt-10 mb-4 text-[#25282c]">
                    Pagamento Pendente!
                </h1>
    
                <p class="text-base font-normal mb-10 text-[#475569]">
                    Estamos esperando a confirmação do pagamento! <br />
                    Você sera notificado por email, quando o pagamento for confirmado!
                </p>
    
                <p class="text-base font-normal mb-4 text-[#475569]">
                    Espere aqui ou vá para a pagina principal!
                </p>
    
                <Link
                    :href="route('taskboard.index')"
                    arial-label="Link para voltar a pagina principal"
                    type="submit" 
                    class="block w-full h-10 text-base text-center leading-10 font-bold rounded text-white my-9 bg-[#7C3AED] hover:bg-[#9F67FF]">
                        Voltar para a pagina principal
                </Link>
            </div>
        </template>


        <template v-else-if="isConfirmed">

            <div>
                <div class="mx-auto w-16 h-16 bg-green-600 text-white flex items-center justify-center rounded-full">
                    <Check :size="30" />
                </div>

                <h1 class="text-4xl font-bold mt-10 mb-4 text-[#25282c]">
                    Pagamento Confirmado!!!
                </h1>
    
                <p class="text-base font-normal mb-10 text-[#475569]">
                    O pagamento foi confirmado con sucesso. <br />
                    Atualizamos o seu plano atual!
                </p>
    
                <Link
                    :href="route('taskboard.index')"
                    arial-label="Link para voltar a pagina principal"
                    type="submit" 
                    class="block w-full h-10 text-base text-center leading-10 font-bold rounded text-white my-9 bg-[#7C3AED] hover:bg-[#9F67FF]">
                        Voltar para a pagina principal
                </Link>
            </div>
            
        </template>
    
    </div>


</template>

<script setup>

import { shallowRef, computed, onMounted } from 'vue'
import { Head, Link } from '@inertiajs/inertia-vue3'

import { Check } from 'lucide-vue-next'

defineProps(['paymentId'])



const paymentState = shallowRef('pendding')


const isPendding = computed(() => paymentState.value == 'pendding')
const isConfirmed = computed(() => paymentState.value == 'confirmed')


onMounted(() => {
    setTimeout(() => paymentState.value = 'confirmed', 1000)
})

</script>
