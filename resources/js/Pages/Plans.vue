<template>

    <Head>
        <title>{{ title }}</title>
    </Head>

    <main class="w-full p-5">

        <div class="h-8 mb-14">
            <Link :href="route('taskboard.index')" class="flex items-center text-[#7C3AED]">
                <arrow-icon /> Voltar para pagina principal
            </Link>
        </div>

        <Suspense>
            <template #default>
                <AsyncPlans :activite-plan="activitePlan" />
            </template>

            <template #fallback>
                <SkeletonPlans />
            </template>
        </Suspense>
    </main>

</template>

<script setup>

import { defineAsyncComponent } from "vue"
import { Link } from '@inertiajs/vue3'
import ArrowIcon from "@/Icon/Arrow.vue"
import SkeletonPlans from "@/Components/Skeletons/SkeletonPlans.vue"

const props = defineProps( [ 'title', 'activitePlan' ] )


const AsyncPlans = defineAsyncComponent({
    loader: () => import("@/Components/PlanPanel.vue"),
})

</script>
