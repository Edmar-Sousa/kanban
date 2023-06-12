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
            <form @submit.prevent action="#" method="POST" class="w-full max-w-[740px] p-8 rounded border border-[#7C3AED]">
                <div class="w-full flex justify-between">
                    <fieldset class="w-full max-w-[330px]">
                        <label for="input-cardNumber" class="block font-bold text-sm mb-2">
                            Número do cartão
                        </label>

                        <InputForm 
                            type="text" 
                            name="cardNumber"
                            placeholder="0000 0000 0000 0000"
                            v-model="form.cardNumber"
                            mask="#### #### #### ####"
                            :error="v$.cardNumber.$errors[0]?.$message" />


                        <label for="input-name" class="block font-bold text-sm mt-6 mb-2">
                            Nome do titular
                        </label>

                        <InputForm 
                            type="text" 
                            name="name"
                            placeholder="Nome escrito no cartão"
                            v-model="form.name"
                            :error="v$.name.$errors[0]?.$message" />

                        <div class="flex mt-6 gap-4">
                            <div>
                                <label for="input-date" class="block font-bold text-sm mb-2">
                                    Validade
                                </label>

                                <InputForm 
                                    type="text" 
                                    name="date"
                                    placeholder="mm/aa"
                                    v-model="form.date"
                                    mask="##/##"
                                    :error="v$.date.$errors[0]?.$message" />
                            </div>

                            <div>
                                <label for="input-cvv" class="block font-bold text-sm mb-2">
                                    CVV
                                </label>

                                <InputForm 
                                    type="text" 
                                    name="cvv"
                                    placeholder="000"
                                    v-model="form.cvv"
                                    mask="###"
                                    :error="v$.cvv.$errors[0]?.$message" />
                            </div>
                        </div>

                        <button 
                            arial-label="Botão para concluir pagamento" 
                            class="w-full h-10 mt-6 text-base font-bold rounded text-white bg-[#7C3AED] hover:bg-[#9F67FF]"
                            @click="submit">
                                Concluir pagamento
                        </button>
                    </fieldset>

                    <div>
                        <div class="w-[280px] h-[168px] relative rounded-lg border bg-[#7C3AED] text-white px-6 pt-6">
                            <div class="flex items-center justify-between">
                                <CardFlag />
                                <CardIcon />
                            </div>

                            <div class="flex items-center gap-2 mt-10">
                                <p 
                                    class="font-bold text-base tracking-[4px]"
                                    v-for="( number, i ) in cardNumber"
                                    :key="i">
                                        {{ number }}
                                </p>
                            </div>

                            <div class="flex items-center justify-between mt-3">
                                <p class="text-sm font-normal text-[#F9FAFB]">{{ name }}</p>
                                <p class="text-sm font-normal text-[#F9FAFB]">{{ date }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </main>
    </div>

</template>

<script setup>

import { computed } from "vue"
import { Link, useForm } from "@inertiajs/inertia-vue3"

import { useVuelidate } from "@vuelidate/core"
import { required, helpers } from "@vuelidate/validators"

import ArrowIcon from "../Icon/Arrow.vue"
import CardFlag from "../Icon/CardFlag.vue"
import CardIcon from "../Icon/CardIcon.vue"

import InputForm from "../Components/InputForm.vue"

const form = useForm( {
    cardNumber: "",
    name: "",
    date: "",
    cvv: "",
} )


const rules = {
    cardNumber: { required: helpers.withMessage( "Este campo é obrigatorio", required ), },
    name:       { required: helpers.withMessage( "Este campo é obrigatorio", required ), },
    date:       { required: helpers.withMessage( "Este campo é obrigatorio", required ), },
    cvv:        { required: helpers.withMessage( "Este campo é obrigatorio", required ), },
}


const v$ = useVuelidate( rules, form )

const name = computed( () => form.name.length ? form.name : "Seu nome aqui" )
const cardNumber = computed( () => form.cardNumber.length ? form.cardNumber.split( " " ) : [ "0000", "0000", "0000", "0000" ] )
const date = computed( () => form.date.length ? form.date : "00/00" )


function submit() {
    v$.value.$validate()

    if ( !v$.value.$error ) {
        form.post( route( "payment" ), {
            onSuccess: () => console.log( "ok" ),
            onError: errors => console.log( errors )
        } )
    }
}


</script>
