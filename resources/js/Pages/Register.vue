<template>
    <Head>
        <title>Register</title>
    </Head>

    <div class="w-screen h-screen overflow-y-auto lg:flex lg:items-center">
        <div class="w-full h-full p-8 max-w-md m-auto">
            <img src="/images/logo-large.svg" alt="Logo vertigo" />
            
            <div>
                <h1 class="text-4xl font-bold mt-20 mb-4 text-[#1E293B]">Registre-se na plataforma</h1>
                <p class="text-base font-normal mb-10 text-[#475569]">Faça seu registro para começar a construir <br /> seus projetos ainda hoje.</p>
            
                <form class="w-full pb-10" @submit.prevent method="POST" action="#">

                    <div class="w-full flex items-center justify-between my-10 relative">
                        <div class="h-0.5 w-11/12 absolute duration-500 -z-10 top-6">
                            <div 
                                class="h-0.5 bg-[#7C3AED]" 
                                :class="{ 
                                    'w-0' : amountStep == 0,
                                    'w-1/2' : amountStep == 1,
                                    'w-full' : amountStep == 2,
                                }">
                            </div>
                        </div>

                        <div class="" v-for="(step, index) in steps" :key="index">
                            <div 
                                class="p-3 rounded-full bg-white border border-[#475569]"
                                :class="{ 
                                    '!bg-[#7C3AED] text-white !border-[#7C3AED]' : amountStep == index,
                                    '!border-[#7C3AED] text-[#7C3AED]': amountStep > index
                                }">
                                    <component :is="step.icon" class="mx-auto" :size="22" v-if="amountStep <= index" />
                                    <Check :size="22" v-else />
                            </div>

                            <p 
                                class="text-sm mt-2 text-center"
                                :class="{ 
                                    'text-[#7C3AED]' : amountStep == index || amountStep > index
                                }">
                                {{ step.section }}
                            </p>
                        </div>
                    </div>

                    <template v-if="amountStep == 0">
                        <div>
                            <label 
                                for="input-email"
                                class="block mb-4 text-sm font-semibold text-[#1E293B]">E-mail</label>
    
                            <input-form 
                                type="email"
                                name="email"
                                placeholder="Digite seu e-mail"
                                v-model="form.email"
                                :error="errors.email || v$.email.$errors[0]?.$message" />
                        </div>
    
                        <div class="mt-4">
                            <label 
                                for="input-password"
                                class="block mb-4 text-sm font-semibold text-[#1E293B]">Senha</label>
    
                            <input-form 
                                type="password"
                                name="password"
                                placeholder="Digite sua senha"
                                v-model="form.password"
                                :error="errors.password || v$.password.$errors[0]?.$message" />
                        </div>
                    </template>

                    <template v-if="amountStep == 1">
                        <div>
                            <label 
                                for="input-user-name"
                                class="block mb-4 text-sm font-semibold text-[#1E293B]">Nome</label>

                            <input-form
                                type="text"
                                name="user-name"
                                placeholder="Digite seu nome"
                                v-model="form.username"
                                :error="errors.username || v$.username.$errors[0]?.$message" />
                        </div>
                        
                        <div class="mt-4">
                            <label 
                                for="input-user-document" 
                                class="block mb-4 text-sm font-semibold text-[#1E293B]">CPF</label>

                            <input-form
                                type="text"
                                name="user-document"
                                placeholder="Digite seu cpf"
                                v-model="form.document"
                                mask="###.###.###-##"
                                :error="errors.document || v$.document.$errors[0]?.$message" />
                        </div>

                        <div class="mt-4">
                            <label 
                                for="input-user-phone" 
                                class="block mb-4 text-sm font-semibold text-[#1E293B]">Telefone</label>

                            <input-form
                                type="text"
                                name="user-phone"
                                placeholder="Digite seu telefone"
                                v-model="form.phone"
                                mask="(##) #####-####"
                                :error="errors.phone || v$.phone.$errors[0]?.$message" />
                        </div>
                    </template>

                    <template v-if="amountStep == 2">
                        <p class="mb-4">Selecione uma foto de perfil:</p>

                        <div>
                            <img
                                v-show="form.image"
                                alt="imagem de perfil"
                                class="w-[200px] h-[200px] m-auto mb-4 rounded-full"
                                id="image-preview" />

                            <label for="image-profile">
                                <div
                                    class="w-full h-10 flex gap-2 items-center justify-center text-sm py-1 px-2 font-medium rounded bg-[#E2D6FF] text-[#7C3AED]">
                                        <img src="/images/file-up.svg" class="w-5 h-5" />
                                        Selecionar Foto
                                </div>
                            </label>

                            <input 
                                type="file" 
                                accept=".png,.jpg" 
                                name="file-upload" 
                                id="image-profile" 
                                class="hidden"
                                ref="inputfile"
                                @change="changeImage($event)" />
                        </div>
                    </template>

                    <button
                        arial-label="Botão para fazer login"
                        type="submit" 
                        class="w-full h-10 text-base font-bold rounded text-white my-9 bg-[#7C3AED] hover:bg-[#9F67FF]"
                        @click="handleNextStep">
                            {{ stepButtonText }}
                    </button>

                    <p class="text-base font-normal text-[#475569]">
                        Ja tem uma conta? 
                        <Link :href="route('login')" class="font-bold text-[#7C3AED]">Login</Link>
                    </p>
                </form>
            </div>
        </div>

        <div class="hidden lg:block h-full">
            <img src="/images/background-login.svg" alt="" class="w-full" />
        </div>
    </div>
</template>


<script setup>


import { computed, markRaw, ref, shallowRef } from 'vue'
import { User, Shield, Image, Check } from 'lucide-vue-next'
import { useForm, Link } from '@inertiajs/vue3'
import { useVuelidate } from '@vuelidate/core'
import { required, email, minLength, maxLength, helpers } from '@vuelidate/validators'


import InputForm from '@/Components/InputForm.vue'

const rules = {
    username: {
        required: helpers.withMessage( 'Este campo é obrigatorio.', required ),
        minLength: helpers.withMessage( 'O campo deve ter no minimo 3 caracteres.', minLength( 3 ) ),
        maxLength: helpers.withMessage( 'O campo deve ter no maximo 40 caracters.', maxLength( 40 ) ),
    },
    email: {
        required: helpers.withMessage( 'Este campo é obrigatorio', required ),
        email: helpers.withMessage( 'O campo deve ter um email valido.', email ),
    },
    password: {
        required: helpers.withMessage( 'Este campo é obrigatorio.', required ),
        minLength: helpers.withMessage( 'O campo deve ter no minimo 3 caracteres.', minLength( 6 ) ),
        maxLength: helpers.withMessage( 'O campo deve ter no maximo 40 caracters.', maxLength( 40 ) ),
    },

    document: {
        required: helpers.withMessage( 'Este campo é obrigatorio.', required ),
    },

    phone: {
        required: helpers.withMessage( 'Este campo é obrigatorio.', required ),
    },

    image: {
        required: helpers.withMessage('Este campo é obrigatorio.', required),
    },
}


const amountStep = shallowRef(0)
const stepButtonText = computed(() => amountStep.value == 2 ? 'Registrar-se' : 'Proximo')

const steps = [
    {
        section: 'Conta',
        icon: markRaw(Shield),
    },

    {
        section: 'Perfil',
        icon: markRaw(User),
    },

    {
        section: 'Foto',
        icon: markRaw(Image)
    }
]


const form = useForm({
    email: '',
    password: '',
    username: '',
    document: '',
    phone: '',
    image: null,
})

const v$ = useVuelidate( rules, form )

const errors = ref({
    email: '',
    password: '',
    username: '',
    document: '',
    phone: '',
    image: ''
})



async function validateAccountInformation() {
    
    const validateStepOne = [
        v$.value.email.$validate(),
        v$.value.password.$validate(),
    ]

    try {
        const [ emailIsValid, passwordIsValid ] = await Promise.all(validateStepOne)

        if ( emailIsValid && passwordIsValid )
            form.post(route('register.step-one'), {
                onSuccess: () => amountStep.value = 1,
                onError: (messages) => errors.value = messages,
            })
    }

    catch {
        
    }
}


async function validateProfileInformation() {
    const validateStepTwo = [
        v$.value.username.$validate(),
        v$.value.document.$validate(),
        v$.value.phone.$validate(),
    ]

    try {
        const [ userNameIsValid, documentIsValid, phoneIsValid ] = await Promise.all(validateStepTwo)

        if ( userNameIsValid && documentIsValid && phoneIsValid )
            form.post(route('register.step-two'), {
                onSuccess: () => amountStep.value = 2,
                onError: (messages) => errors.value = messages,
            })
    }

    catch {

    }
}


async function handleRegisterUser() {
    if ( !v$.value.$error )
        form.post(route('register.create'), {
            onError: (messages) => errors.value = messages
        })
}


async function handleNextStep() {
    switch (amountStep.value) {
        case 0:
            validateAccountInformation()
            break

        case 1:
            validateProfileInformation()
            break

        case 2:
            handleRegisterUser()
    }
}


function changeImage( event ) {
    const [ file ] = event.target.files

    if ( file ) {
        form.image = file
        document.getElementById("image-preview").src = URL.createObjectURL(file)
    }
}


</script>
