<template>
    <div class="w-full h-screen bg-[#7C3AED] flex pt-1">
        <Menu></Menu>
        <slot></slot>
    </div>
</template>

<script setup>

import { usePage } from '@inertiajs/vue3'
import { useToast } from 'vue-toast-notification'

import Menu from "@/Components/Menu.vue"
import { watch } from 'vue'


const toast = useToast({
  position: 'top-right',
})


const page = usePage()


watch(() => page.props, handlerFlashMessage,
    {
        deep: true,
    }
)


function handlerFlashMessage() {
    const { status, message } = page.props.value?.flash

    switch (status) {
        case 'success':
            toast.success(message)
            break

        case 'warning':
            toast.warning(message)

        case 'error':
            toast.error(message)
    }
}

</script>
