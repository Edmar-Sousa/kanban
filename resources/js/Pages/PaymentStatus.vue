<template>

    <Head title="Status do pagamento" />


    <div class="w-screen h-screen gap-10 p-8 flex flex-col items-center justify-center">

        <template v-if="isPendding">
            <div class="flex flex-col items-center md:flex-row-reverse justify-center">
                <div>
                    <img
                        src="/images/undraw_transfer_money.svg"
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
                    O pagamento foi confirmado com sucesso. <br />
                    Atualizamos o seu plano para o plano <b>{{ paymentState.planName }}</b>!
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

        <template v-else-if="isCanceled">
            <div>
                <div class="mx-auto w-16 h-16 bg-red-600 text-white flex items-center justify-center rounded-full">
                    <X :size="30" />
                </div>

                <h1 class="text-4xl font-bold mt-10 mb-4 text-[#25282c]">
                    Pagamento Foi Recusado ou Cancelado!
                </h1>

                <p class="text-base font-normal mb-10 text-[#475569]">
                    O pagamento foi cancelado, tente novamente. <br />
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

import { ref, computed, onMounted, onUnmounted } from 'vue'
import { Head, Link } from '@inertiajs/vue3'

import { Check, X } from 'lucide-vue-next'
import axios from 'axios';

const props = defineProps(['paymentId'])



const paymentState = ref({
    status: 'pendding',
    planName: '',
})


const isPendding = computed(() => paymentState.value.status === 'pendding')
const isConfirmed = computed(() => paymentState.value.status === 'confirmed')
const isCanceled = computed(() => paymentState.value.status === 'canceled')

onMounted(handlerConnectOnChannel)


function handlerConnectOnChannel() {
    window.Echo
        .private(`payment.${ props.paymentId }`)
        .listen('ConfirmPaymentEvent', handlerUpdatePaymentEvent)
}

function handlerUpdatePaymentEvent(event) {
    console.log(event)
    if (event.status === paymentState.value.status)
        return

    paymentState.value = {
        status: event.status,
        planName: event.planName
    }
}

</script>
