<template>
    <Head>
        <title>Login</title>
    </Head>

    <div class="w-screen h-screen overflow-y-auto lg:flex lg:items-center">
        <div class="w-full h-full p-8 max-w-md m-auto">
            <img src="/images/logo-large.svg" alt="Logo vertigo" />

            <div>
                <h1 class="text-4xl font-bold mt-20 mb-4 text-[#1E293B]">Acesse a plataforma</h1>
                <p class="text-base font-normal mb-10 text-[#475569]">Faça login ou registre-se para começar a construir <br /> seus projetos ainda hoje.</p>
            
                <form class="w-full pb-10" @submit.prevent method="POST" action="#">
                    <div>
                        <label 
                            for="input-email"
                            class="block mb-4 text-sm font-semibold text-[#1E293B]">E-mail</label>
                        
                        <input-form 
                            type="email"
                            name="email"
                            placeholder="Digite seu email"
                            v-model="form.email"
                            :error="errors.email || v$.email.$errors[0]?.$message" />
                    </div>

                    <div class="mt-4">
                        <div class="w-full flex justify-between">
                            <label 
                                for="input-password"
                                class="block mb-4 text-sm font-semibold text-[#1E293B]">Senha</label>

                            <a href="#" class="text-sm font-bold text-[#7C3AED]">Esqueceu a senha?</a>
                        </div>

                        <input-form 
                            type="password"
                            name="password"
                            placeholder="Digite sua senha"
                            v-model="form.password"
                            :error="errors.password || v$.password.$errors[0]?.$message" />
                    </div>

                    <button
                        @click="login()"
                        arial-label="Botão para fazer login"
                        type="submit" 
                        class="w-full h-10 text-base font-bold rounded text-white my-9 bg-[#7C3AED] hover:bg-[#9F67FF]">
                            Entrar
                    </button>

                    <p class="text-base font-normal text-[#475569]">
                        Ainda não tem uma conta? 
                        <Link :href="route('register.index')" class="font-bold text-[#7C3AED]">Inscreva-se</Link>
                    </p>
                </form>
            </div>
        </div>

        <div class="hidden lg:block h-full">
            <img src="/images/background-login.svg" alt="" class="w-full h-full" />
        </div>
    </div>
</template>


<script setup>

import { ref } from "vue"
import { Link, useForm } from '@inertiajs/vue3'
import { useVuelidate } from "@vuelidate/core"
import { required, email, minLength, helpers } from "@vuelidate/validators"

import InputForm from "@/Components/InputForm.vue"

const rules = {
    email: {
        required: helpers.withMessage( 'Este campo é obrigatorio.', required ),
        email: helpers.withMessage( 'Este campo deve ter um email valido.', email ),
    },
    password: {
        required: helpers.withMessage( 'Este campo é obrigatorio.', required ),
        minLength: helpers.withMessage( 'Este campo de ter no minimo 6 caracteres.', minLength(6) ),
    }
}

const form = useForm({
    email: "",
    password: ""
})

const errors = ref({
    email: "",
    password: ""
})

const v$ = useVuelidate( rules, form )

function login() {
    v$.value.$validate()

    if ( !v$.value.$error )
        form.post( route("login"), {
            onError: message => errors.value = message
        } )
}

</script>
