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
                <fieldset>
                    <label
                        for="credit-card-number"
                        class="block mb-4 text-sm font-semibold text-[#1E293B]">
                            Número do cartão
                    </label>
    
                    <input-form
                        type="text"
                        name="credit-card-number"
                        placeholder="0000 0000 0000 0000"
                        mask="#### #### #### ####"
                        v-model="form.creditCardNumber"
                        :error="form.errors.creditCardNumber || v$?.creditCardNumber.$errors[0]?.$message" />
    
                    <label
                        for="credit-card-name"
                        class="block my-4 text-sm font-semibold text-[#1E293B]">
                            Nome do titular
                    </label>
    
                    <input-form
                        type="text"
                        name="credit-card-name"
                        placeholder="Nome como está no cartão"
                        v-model="form.name"
                        :error="form.errors.name || v$?.name?.$errors[0]?.$message" />
                </fieldset>

                <fieldset class="flex gap-4 mt-4">
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
                            mask="##/##"
                            v-model="form.dateExpired"
                            :error="form.errors.dateExpired || v$?.dateExpired?.$errors[0]?.$message" />
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
                            mask="###"
                            v-model="form.cvv"
                            :error="form.errors.cvv || v$?.cvv?.$errors[0]?.$message" />
                    </div>
                </fieldset>


                <button
                    arial-label="Botão para finalizar compra"
                    type="submit"
                    class="w-full h-10 text-base font-bold rounded text-white my-9 bg-[#7C3AED] hover:bg-[#9F67FF]"
                    @click="handlerSubmit">
                        Finalizar
                </button>
            </form>
        </main>
    </div>

</template>

<script setup>

import { Link, useForm } from "@inertiajs/vue3"

import { useVuelidate } from '@vuelidate/core'
import { helpers, required,  } from '@vuelidate/validators'

import ArrowIcon from "@/Icon/Arrow.vue"
import InputForm from '@/Components/InputForm.vue'



const props = defineProps([ 'planId' ])

const form = useForm({
    planId: props.planId,

    creditCardNumber: null,
    name: null,
    dateExpired: null,
    cvv: null,
})


const rules = {
    creditCardNumber: { 
        required: helpers.withMessage('O numero do cartão é obrigatorio', required)
    },

    name: { 
        required: helpers.withMessage('O nome é obrigatorio', required)
    },

    dateExpired: { 
        required: helpers.withMessage('O data expiração é obrigatorio', required)
    },

    cvv: { 
        required: helpers.withMessage('O cvv é obrigatorio', required)
    },
}


const v$ = useVuelidate(rules, form)



function handlerSubmit() {

    v$.value.$validate()

    if (v$.value.$error)
        return

    
    form.post(route('payment.create'))

}

</script>
