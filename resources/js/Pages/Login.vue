<template>
    <div class="w-screen h-screen overflow-y-auto lg:flex lg:items-center">
        <div class="w-full h-full p-8 max-w-md m-auto">
            <img src="images/logo-large.svg" alt="Logo vertigo" />
            
            <div>
                <h1 class="text-4xl font-bold mt-20 mb-4 text-[#1E293B]">Acesse a plataforma</h1>
                <p class="text-base font-normal mb-10 text-[#475569]">Faça login ou registre-se para começar a construir <br /> seus projetos ainda hoje.</p>
            
                <form class="w-full pb-10" @submit.prevent method="POST" action="#">
                    <div>
                        <label 
                            for="input-email"
                            class="block mb-4 text-sm font-semibold text-[#1E293B]">E-mail</label>
                        <input 
                            type="email"
                            name="email"
                            id="input-email"
                            class="w-full h-10 border border-[#E2E8F0] rounded text-sm px-3 outline-none hover:border-[#7C3AED] focus:border-[#7C3AED]"
                            :class="{ 'border-red-400': errors.email }"
                            placeholder="Digite seu e-mail"
                            v-model="form.email" />
                        
                        <p v-show="errors.email" class="text-xs text-red-400 mt-2">{{ errors.email }}</p>
                    </div>

                    <div class="mt-4">
                        <div class="w-full flex justify-between">
                            <label 
                                for="input-password"
                                class="block mb-4 text-sm font-semibold text-[#1E293B]">Senha</label>

                            <a href="#" class="text-sm font-bold text-[#7C3AED]">Esqueceu a senha?</a>
                        </div>
                        <input 
                            type="password"
                            name="password"
                            id="input-password"
                            class="w-full h-10 border border-[#E2E8F0] rounded text-sm px-3 outline-none hover:border-[#7C3AED] focus:border-[#7C3AED]"
                            :class="{ 'border-red-400': errors.password }"
                            placeholder="Digite sua senha"
                            v-model="form.password" />

                        <p v-show="errors.password" class="text-xs text-red-400 mt-2">{{ errors.password }}</p>
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
                        <Link :href="route('register')" class="font-bold text-[#7C3AED]">Inscreva-se</Link>
                    </p>
                </form>
            </div>
        </div>

        <div class="hidden lg:block h-full">
            <img src="images/background-login.svg" alt="" class="w-full" />
        </div>
    </div>
</template>


<script setup>

import { ref } from 'vue'
import { useForm, Link } from '@inertiajs/inertia-vue3'


const form = useForm({
    email: '',
    password: ''
})

const errors = ref({
    email: '',
    password: ''
})

function login() {
    form.post(route('login'), {
        onError: (message) => errors.value = message
    })
}

</script>
