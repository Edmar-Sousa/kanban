<template>

    <Layout>
        <main class="flex-1 bg-white rounded-tl-2xl px-8 py-12 overflow-y-auto">
            <h1 class="text-3xl font-bold text-[#403937]">Ajustes</h1>

            <form action="#" method="POST" class="my-4">
                <fieldset class="flex gap-6 items-center">
                    <div>
                        <img 
                            :src="require('~/profile-picture.png').default" 
                            alt="imagem de perfil"
                            class="w-[200px] h-[200px] m-auto mb-4 rounded-full"
                            id="image-preview" />

                        <label for="image-profile">
                            <div
                                class="w-full h-10 flex gap-2 items-center justify-center text-sm py-1 px-2 font-medium rounded bg-[#E2D6FF] text-[#7C3AED]">
                                    <img :src="require('~/file-up.svg').default" class="w-5 h-5" />
                                    Alterar foto
                            </div>
                        </label>

                        <input type="file" accept=".png,.jpg" name="file-upload" id="image-profile" class="hidden" @change="changeImage($event)" />
                    </div>
    
                    <div class="flex-1">
                        <div>
                            <label for="input-username" class="block mb-4 text-sm font-semibold text-[#1E293B]">Nome</label>
                            
                            <InputForm 
                                type="text"
                                name="username"
                                placeholder="Altere seu node de usuario" />
                        </div>
    
                        <div>
                            <label for="input-password" class="block my-4 text-sm font-semibold text-[#1E293B]">Senha</label>
                            
                            <InputForm 
                                type="password"
                                name="password"
                                placeholder="Altere sua senha" />
                        </div>
                    </div>
                </fieldset>

                <div class="w-full flex justify-end">
                    <button arial-label="Salvar alterações" class="w-[120px] h-10 text-base font-bold rounded text-white my-9 bg-[#7C3AED] hover:bg-[#9F67FF]">
                        Salvar
                    </button>
                </div>
            </form>
        </main>
    </Layout>

</template>

<script setup>

import Layout from "../Template/Layout.vue"
import InputForm from "../Components/InputForm.vue"


function changeImage( event ) {
    const [ file ] = event.target.files

    if ( file ) {
        document.getElementById("image-preview").src = URL.createObjectURL(file)
    }
}


</script>
