<template>
    <div class="w-full grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-3" v-once>
        <div
            class="w-full my-6 p-6 rounded-lg shadow-[0_4px_16px_0px_rgba(22,22,22,0.1)] h-[136px]"
            v-for="taskboard in numberTasksBoards"
            :key="taskboard">
                <span class="block max-w-[100px] rounded h-5 bg-gray-300 skeleton-loading" />
                <span class="block max-w-[250px] rounded my-2.5 h-5 bg-gray-300 skeleton-loading" />

                <div class="w-full flex justify-end gap-2">
                    <span class="h-5 w-[80px] py-1 px-2 rounded bg-gray-300 skeleton-loading" />
                </div>
        </div>
    </div>
</template>

<script setup>

defineProps({
    numberTasksBoards: {
        type: Number,
        required: true,
        validator: (value) => value > 0
    }
})

</script>
