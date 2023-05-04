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
                                    <img :src="require('~/images/file-up.svg').default" class="w-5 h-5" />
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
                        
                        <InputForm 
                            type="text"
                            name="username"
                            placeholder="Altere seu node de usuario"
                            v-model="form.username" />
                    </div>
                </fieldset>

                
                <fieldset class="mt-7">
                    <legend class="font-bold text-[#403937]">Dados de Endereço</legend>
    
                    <div class="flex items-center gap-4 my-4">
                        <div class="flex-1">
                            <label 
                                for="input-street"
                                class="block mb-4 text-sm font-semibold text-[#1E293B]">Digite o nome da sua rua</label>
                                
                            <InputForm 
                                type="text"
                                name="street"
                                placeholder="Rua"
                                v-model="form.street" />
                        </div>
    
                        <div class="flex-1">
                            <label 
                                for="input-zip-code"
                                class="block mb-4 text-sm font-semibold text-[#1E293B]">Digite o cep</label>
                            
                            <InputForm 
                                type="text"
                                name="zip-code"
                                placeholder="00000-000"
                                v-model="form.zip_code"
                                @change="handleChangeZipcode" />
                        </div>
    
                        <div class="flex-1">
                            <label 
                                for="input-number"
                                class="block mb-4 text-sm font-semibold text-[#1E293B]">Digite o numero da sua casa</label>
                            
                            <InputForm 
                                type="number"
                                name="number"
                                placeholder="Numero"
                                v-model="form.number" />
                        </div>
                    </div>
    
                    <div class="flex items-center gap-4 my-4">
                        <div class="flex-1">
                            <label 
                                for="input-complement"
                                class="block mb-4 text-sm font-semibold text-[#1E293B]">Complemento</label>
                            
                            <InputForm 
                                type="text"
                                name="complement"
                                placeholder="Complemento"
                                v-model="form.complement" />
                        </div>
    
                        <div class="flex-2">
                            <label 
                                for="input-uf"
                                class="block mb-4 text-sm font-semibold text-[#1E293B]">Estado</label>
                            
                            <InputForm 
                                type="text"
                                name="uf"
                                placeholder="UF"
                                :disabled="true"
                                v-model="form.uf" />
                        </div>
    
                        <div class="flex-2">
                            <label 
                                for="input-city"
                                class="block mb-4 text-sm font-semibold text-[#1E293B]">Cidade</label>
                            
                            <InputForm 
                                type="text"
                                name="city"
                                placeholder="Cidade"
                                v-model="form.city" />
                        </div>
                    </div>

                    <div class="flex-2">
                        <label 
                            for="input-neighborhood"
                            class="block mb-4 text-sm font-semibold text-[#1E293B]">Bairro</label>
                        
                        <InputForm 
                            type="text"
                            name="neighborhood"
                            placeholder="Bairro"
                            v-model="form.neighborhood" />
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

import { ref, watch } from "vue"
import { useForm } from "@inertiajs/inertia-vue3"

import Layout from "../Template/Layout.vue"
import InputForm from "../Components/InputForm.vue"

const props = defineProps(["user"])
const inputfile = ref()

const form = useForm({
    username: props.user?.name,
    image: null,

    street: "",
    zip_code: "",
    number: 0,
    complement: "",
    uf: "",
    city: "",
    neighborhood: "",
})


async function handleChangeZipcode( $event ) {
    try {
        const data = await ( await fetch(`https://viacep.com.br/ws/${ $event.target.value }/json`, { 
            headers: {
                Accept: "application/json",
                "Content-Type": "application/json",
                "Access-Control-Allow-Origin": "*"
            },
            method: "GET",
        }) ).json()
    
        form.uf = data.uf
        form.city = data.localidade
    }
    catch {
        console.log('ok')
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
    
    form.post(route("user"), {
        onSuccess: () => console.log("ok"),
        onError: (err) => console.log(err)
    })
}

</script>
