<template>
    <Head>
        <title>Configurações</title>
    </Head>

    <Layout>
        <main class="flex-1 bg-white rounded-tl-2xl px-8 py-12 overflow-y-auto">
            <h1 class="text-3xl font-bold text-[#403937]">Ajustes</h1>

            <form @submit.prevent action="#" method="POST" class="my-4">
                <fieldset class="flex gap-6 items-start">
                    <div>
                        <img 
                            :src="loadImage( user.image )" 
                            alt="imagem de perfil"
                            class="w-[200px] h-[200px] m-auto mb-4 rounded-full"
                            id="image-preview" />

                        <label for="image-profile">
                            <div
                                class="w-full h-10 flex gap-2 items-center justify-center text-sm py-1 px-2 font-medium rounded bg-[#E2D6FF] text-[#7C3AED]">
                                    <img src="/images/file-up.svg" class="w-5 h-5" />
                                    Alterar foto
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
    
                    <div class="flex-1">
                        <label for="input-username" class="block mb-4 text-sm font-semibold text-[#1E293B]">Nome</label>
                        
                        <input-form 
                            type="text"
                            name="username"
                            placeholder="Altere seu node de usuario"
                            v-model="form.username"
                            :error="errors.username || v$.username.$errors[0]?.$message" />
                    </div>
                </fieldset>

                
                <fieldset class="mt-7">
                    <legend class="font-bold text-[#403937]">Dados de Endereço</legend>
    
                    <div class="flex items-center gap-4 my-4">
                        <div class="flex-1">
                            <label 
                                for="input-street"
                                class="block mb-4 text-sm font-semibold text-[#1E293B]">Digite o nome da sua rua</label>
                                
                            <input-form 
                                type="text"
                                name="street"
                                placeholder="Rua"
                                v-model="form.street" 
                                :error="errors.street || v$.street.$errors[0]?.$message" />
                        </div>
    
                        <div class="flex-1">
                            <label 
                                for="input-zip-code"
                                class="block mb-4 text-sm font-semibold text-[#1E293B]">Digite o cep</label>
                            
                            <input-form 
                                type="text"
                                name="zip-code"
                                placeholder="00000-000"
                                v-model="form.zip_code"
                                @change="handleChangeZipcode"
                                :error="errors.zip_code || v$.zip_code.$errors[0]?.$message" />
                        </div>
    
                        <div class="flex-1">
                            <label 
                                for="input-number"
                                class="block mb-4 text-sm font-semibold text-[#1E293B]">Digite o numero da sua casa</label>
                            
                            <input-form 
                                type="number"
                                name="number"
                                placeholder="Numero"
                                v-model="form.number"
                                :error="errors.number || v$.number.$errors[0]?.$message" />
                        </div>
                    </div>
    
                    <div class="flex items-center gap-4 my-4">
                        <div class="flex-1">
                            <label 
                                for="input-complement"
                                class="block mb-4 text-sm font-semibold text-[#1E293B]">Complemento</label>
                            
                            <input-form 
                                type="text"
                                name="complement"
                                placeholder="Complemento"
                                v-model="form.complement"
                                :error="errors.complement || v$.complement.$errors[0]?.$message" />
                        </div>
    
                        <div class="flex-2">
                            <label 
                                for="input-uf"
                                class="block mb-4 text-sm font-semibold text-[#1E293B]">Estado</label>
                            
                            <input-form 
                                type="text"
                                name="uf"
                                placeholder="UF"
                                :disabled="true"
                                v-model="form.uf"
                                :error="errors.uf || v$.uf.$errors[0]?.$message" />
                        </div>
    
                        <div class="flex-2">
                            <label 
                                for="input-city"
                                class="block mb-4 text-sm font-semibold text-[#1E293B]">Cidade</label>
                            
                            <input-form 
                                type="text"
                                name="city"
                                placeholder="Cidade"
                                v-model="form.city"
                                :error="errors.city || v$.city.$errors[0]?.$message" />
                        </div>
                    </div>

                    <div class="flex-2">
                        <label 
                            for="input-neighborhood"
                            class="block mb-4 text-sm font-semibold text-[#1E293B]">Bairro</label>
                        
                        <input-form 
                            type="text"
                            name="neighborhood"
                            placeholder="Bairro"
                            v-model="form.neighborhood"
                            :error="errors.neighborhood || v$.neighborhood.$errors[0]?.$message" />
                    </div>
    
                </fieldset>
            </form>

            <div class="w-full flex justify-end">
                <button 
                    arial-label="Salvar alterações" 
                    class="w-[120px] h-10 text-base font-bold rounded text-white my-9 bg-[#7C3AED] hover:bg-[#9F67FF]"
                    @click="$event => submit()">
                        Salvar
                </button>
            </div>
        </main>
    </Layout>

</template>

<script setup>

import { ref } from 'vue'
import { useForm } from '@inertiajs/inertia-vue3'
import { useToast } from 'vue-toast-notification'

import { useVuelidate } from '@vuelidate/core'
import { minLength, maxLength, integer, helpers } from '@vuelidate/validators'

import Layout from '@/Template/Layout.vue'
import InputForm from '@/Components/InputForm.vue'

const props = defineProps(['user', 'address'])
const inputfile = ref()


const rules = {
    username: {
        minLength: helpers.withMessage( 'Este campo deve ter no minimo 3 caracteres', minLength( 3 ) ),
        maxLength: helpers.withMessage( 'Este campo deve ter no maximo 40 caracteres', maxLength( 40 ) ),
    },
    street: {
        minLength: helpers.withMessage( 'Este campo deve ter no minimo 3 caracteres', minLength( 3 ) ),
    },
    zip_code: {
        integer: helpers.withMessage( 'Este campo deve conter apenas numeros', integer )
    },
    number: {
        integer: helpers.withMessage( 'Este campo deve conter apenas numeros', integer ),
    },
    complement: {
        minLength: helpers.withMessage( 'Este campo deve ter no minimo 3 caracteres', minLength( 3 ) ),
    },
    uf: {
        minLength: helpers.withMessage( 'Este campo deve ter no minimo 3 caracteres', minLength( 2 ) ),
    },
    city: {
        minLength: helpers.withMessage( 'Este campo deve ter no minimo 3 caracteres', minLength( 3 ) ),
    },
    neighborhood: {
        minLength: helpers.withMessage( 'Este campo deve ter no minimo 3 caracteres', minLength( 3 ) ),
    }
}

const form = useForm({
    username: props.user?.name,
    image: null,

    street: props.address?.street,
    zip_code: props.address?.zip_code,
    number: props.address?.numero,
    complement: props.address?.complement,
    uf: props.address?.uf,
    city: props.address?.city,
    neighborhood: props.address?.neighborhood,
})

const errors = ref({})

const v$ = useVuelidate( rules, form )

const toast = useToast({
  position: 'top-right',
})

async function handleChangeZipcode( $event ) {
    try {
        const data = await ( await fetch(`https://viacep.com.br/ws/${ $event.target.value }/json`, { 
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json',
                'Access-Control-Allow-Origin': '*'
            },
            method: 'GET',
        }) ).json()
    
        form.uf = data.uf
        form.city = data.localidade
    }

    catch {
        toast.error('Erro ao buscar informações do cep')
    }
}


function changeImage( event ) {
    const [ file ] = event.target.files

    if ( file ) {
        document.getElementById("image-preview").src = URL.createObjectURL(file)
    }
}


function submit() {
    const image = inputfile.value?.files[0]

    if ( image )
        form.image = image
    
    v$.value.$validate()

    if ( !v$.value.$error )
        form.post(route("user"), {
            onError: err => errors.value = err
        })
}

</script>
