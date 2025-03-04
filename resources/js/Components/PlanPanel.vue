<script setup>

import axios from "axios"
import { useToast } from "vue-toast-notification"

import { ref } from "vue"
import { Link } from "@inertiajs/vue3"

defineProps({
    activitePlan: {
        type: Number,
        required: true
    }
})


const toast = useToast({
    position: 'top-right',
})

const plans = ref([])


getPlans()

async function getPlans() {
    try {
        const response = await axios.get(route('plans.list'))

        if (response.status === 200)
            plans.value = response.data
    }
    catch (err) {
        if (axios.isAxiosError(err))
            toast.error(err.response.data?.msg)

        else
            toast.error('Error ao buscar planos')
    }
}

</script>

<template>

    <div class="mx-auto max-w-[980px] flex flex-wrap items-center flex-col gap-6  md:flex-row md:items-stretch md:justify-between">
        <article
            class="w-full max-w-[300px] p-4 border border-[#E2E8F0] rounded-lg"
            v-for="plan in plans" :key="plan.title">
            <h2 class="text-[#7C3AED] text-sm font-semibold uppercase">{{ plan.small_description }}</h2>

            <div class="w-full mt-2 flex justify-between items-end text-[#1E293B]">
                <p class="text-2xl font-bold">{{ plan.title }}</p>
                <p class="text-lg font-normal">R$ <span class="font-bold">{{ plan.price }}/mês</span></p>
            </div>

            <Link
                :href="route('payment.index', { id: plan.id })"
                v-if="plan.id !== activitePlan"
                class="flex items-center justify-center w-full h-14 mt-4 border border-[#1E293B] rounded-md text-[#1E293B] text-sm font-bold">
                    Assinar Agora
            </Link>

            <div v-else
                 class="flex items-center justify-center w-full h-14 mt-4 border border-[#1E293B] rounded-md text-[#1E293B] text-sm font-bold">
                    Plano Ativo
            </div>

            <hr class="my-4" />

            <ul>
                <li class="flex items-center gap-2 mb-4" v-for="(item, index) in plan.plans_items" :key="index">
                    <img src="/images/check.svg" alt="Icone de check" />
                    <p class="text-sm font-normal text-[#475569]">{{ item.title }}</p>
                </li>
            </ul>
        </article>
    </div>

</template>
