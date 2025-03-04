<script setup>

defineProps({
    numberPlans: {
        type: Number,
        required: false,
        default: 3,
    }
})

</script>

<template>

    <div class="mx-auto max-w-[980px] flex flex-wrap items-center flex-col gap-6  md:flex-row md:items-stretch md:justify-between">
        <div
            class="w-full max-w-[300px] p-4 border border-[#E2E8F0] rounded-lg"
            v-for="plan in numberPlans"
            :key="plan">
                <div class="bg-gray-300 skeleton-loading rounded w-[155px] h-5"></div>

                <div class="w-full mt-2 flex justify-between items-end text-[#1E293B]">
                    <div class="w-[100px] h-6 rounded skeleton-loading"></div>
                    <div class="w-[100px] h-6 rounded skeleton-loading"></div>
                </div>

                <div class="flex items-center justify-center w-full h-14 mt-4 rounded-md bg-gray-300 skeleton-loading"></div>
                <hr class="my-4" />

                <div
                    class="w-full h-6 mb-4 bg-gray-300 rounded"
                    v-for="item in 3"
                    :key="item">
                </div>
        </div>
    </div>

</template>
