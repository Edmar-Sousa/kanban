<template>
    <div class="w-screen h-screen overflow-y-auto lg:flex lg:items-center">
        <div class="w-full h-full p-8 max-w-md m-auto">
            <img src="images/logo-large.svg" alt="Logo vertigo" />
            
            <div>
                <h1 class="text-4xl font-bold mt-20 mb-4 text-[#1E293B]">Registre-se na plataforma</h1>
                <p class="text-base font-normal mb-10 text-[#475569]">Faça seu registro para começar a construir <br /> seus projetos ainda hoje.</p>
            
                <form class="w-full pb-10" @submit.prevent method="POST" action="#">
                    <div>
                        <label 
                            for="input-user-name"
                            class="block mb-4 text-sm font-semibold text-[#1E293B]">Nome</label>
                        <input 
                            type="text"
                            name="user-name"
                            id="input-user-name"
                            class="w-full h-10 border border-[#E2E8F0] rounded text-sm px-3 outline-none hover:border-[#7C3AED] focus:border-[#7C3AED]"
                            placeholder="Digite seu nome" />
                    </div>

                    <div class="mt-4">
                        <label 
                            for="input-email"
                            class="block mb-4 text-sm font-semibold text-[#1E293B]">E-mail</label>
                        <input 
                            type="email"
                            name="email"
                            id="input-email"
                            class="w-full h-10 border border-[#E2E8F0] rounded text-sm px-3 outline-none hover:border-[#7C3AED] focus:border-[#7C3AED]"
                            placeholder="Digite seu e-mail" />
                    </div>

                    <div class="mt-4">
                        <label 
                            for="input-password"
                            class="block mb-4 text-sm font-semibold text-[#1E293B]">Senha</label>
                        
                        <input 
                            type="password"
                            name="password"
                            id="input-password"
                            class="w-full h-10 border border-[#E2E8F0] rounded text-sm px-3 outline-none hover:border-[#7C3AED] focus:border-[#7C3AED]"
                            placeholder="Digite sua senha" />
                    </div>

                    <button
                        arial-label="Botão para fazer login"
                        type="submit" 
                        class="w-full h-10 text-base font-bold rounded text-white my-9 bg-[#7C3AED] hover:bg-[#9F67FF]">
                            Registre-se
                    </button>

                    <p class="text-base font-normal text-[#475569]">
                        Ja tem uma conta? <a :href="route('site.login')" class="font-bold text-[#7C3AED]">Login</a>
                    </p>
                </form>
            </div>
        </div>

        <div class="hidden lg:block h-full">
            <img src="images/background-login.svg" alt="" class="w-full" />
        </div>
    </div>
</template>


<script>


</script>
