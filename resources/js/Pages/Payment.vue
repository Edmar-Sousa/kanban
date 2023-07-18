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

import { onMounted } from "vue"
import { Link } from "@inertiajs/inertia-vue3"

import ArrowIcon from "../Icon/Arrow.vue"

const props = defineProps( [ 'client_secret', 'stripe_public_key' ] )

onMounted( () => {
    const script = document.createElement( 'script' )

    script.src = 'https://js.stripe.com/v3/'
    script.type = 'text/javascript'

    script.addEventListener( 'load', initStripe )

    document.body.appendChild( script )
} )


let stripe, elements
function initStripe() {
    stripe = Stripe( props.stripe_public_key )

    elements = stripe.elements( { clientSecret: props.client_secret } )

    const linkAuthenticationElement = elements.create("linkAuthentication")
    linkAuthenticationElement.mount("#link-authentication-element")

    const paymentElementOptions = {
        layout: "tabs",
    }

    const paymentElement = elements.create("payment", paymentElementOptions)
    paymentElement.mount("#payment-element")
}


async function handleSubmit() {
    const { error } = await stripe.confirmPayment({
        elements,
        confirmParams: {
            return_url: 'http://localhost:8000/payment/finish'
        }
    })
}

</script>
