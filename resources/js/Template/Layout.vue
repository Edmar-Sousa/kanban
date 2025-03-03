<template>
    <div class="w-full h-screen bg-[#7C3AED] flex pt-1">
        <Menu></Menu>
        <slot></slot>
    </div>
</template>

<script setup>

import { watch, provide } from 'vue'
import { usePage } from '@inertiajs/vue3'
import { useToast } from 'vue-toast-notification'
import { toastProviderKey } from '@/Keys/Provider'

import Menu from "@/Components/Menu.vue"


const toast = useToast({
  position: 'top-right',
})


const page = usePage()


watch(() => page.props, handlerFlashMessage,
    {
        deep: true,
    }
)

provide(toastProviderKey, handleShowMessage)

function handleShowMessage(status, message) {
    switch (status) {
        case 'success':
            toast.success(message)
            break

        case 'warning':
            toast.warning(message)
            break

        case 'error':
            toast.error(message)
            break
    }
}

function handlerFlashMessage() {
    if (!page.props?.flash)
        return

    const { status, message } = page.props?.flash
    handleShowMessage(status, message)
}

</script>
