<template>
    <div class="w-screen h-screen overflow-y-auto lg:flex lg:items-center">
        <div class="w-full h-full p-8 max-w-md m-auto">
            <img :src="require('~/logo-large.svg').default" alt="Logo vertigo" />
            
            <div>
                <h1 class="text-4xl font-bold mt-20 mb-4 text-[#1E293B]">Registre-se na plataforma</h1>
                <p class="text-base font-normal mb-10 text-[#475569]">Faça seu registro para começar a construir <br /> seus projetos ainda hoje.</p>
            
                <form class="w-full pb-10" @submit.prevent method="POST" action="#">
                    <div>
                        <label 
                            for="input-user-name"
                            class="block mb-4 text-sm font-semibold text-[#1E293B]">Nome</label>

                        <InputForm
                            type="text"
                            name="user-name"
                            placeholder="Digite seu nome"
                            v-model="form.username"
                            :error="errors.username" />
                    </div>

                    <div class="mt-4">
                        <label 
                            for="input-email"
                            class="block mb-4 text-sm font-semibold text-[#1E293B]">E-mail</label>

                        <InputForm 
                            type="email"
                            name="email"
                            placeholder="Digite seu e-mail"
                            v-model="form.email"
                            :error="errors.email" />
                    </div>

                    <div class="mt-4">
                        <label 
                            for="input-password"
                            class="block mb-4 text-sm font-semibold text-[#1E293B]">Senha</label>

                        <InputForm 
                            type="password"
                            name="password"
                            placeholder="Digite sua senha"
                            v-model="form.password"
                            :error="errors.password" />
                    </div>

                    <button
                        arial-label="Botão para fazer login"
                        type="submit" 
                        class="w-full h-10 text-base font-bold rounded text-white my-9 bg-[#7C3AED] hover:bg-[#9F67FF]"
                        @click="register">
                            Registre-se
                    </button>

                    <p class="text-base font-normal text-[#475569]">
                        Ja tem uma conta? 
                        <Link :href="route('login')" class="font-bold text-[#7C3AED]">Login</Link>
                    </p>
                </form>
            </div>
        </div>

        <div class="hidden lg:block h-full">
            <img :src="require('~/background-login.svg').default" alt="" class="w-full" />
        </div>
    </div>
</template>


<script setup>

import { ref } from "vue"
import { useForm, Link } from "@inertiajs/inertia-vue3"

import InputForm from "../Components/InputForm.vue"

const form = useForm({
    username: "",
    email: "",
    password: ""
})

const errors = ref({
    username: "",
    email: "",
    password: ""
})


function register() {
    form.post(route("register"), {
        onError: (messages) => errors.value = messages
    })
}


</script>
