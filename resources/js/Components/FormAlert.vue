<template>

    <div 
        class="w-full p-4  border-[2px] my-2 rounded-md"
        :class="mapStyle[props.type]?.alertStyle">
            <p class="text-base font-bold text-[#1E293B]">
                <component 
                    :is="mapStyle[props.type]?.icon"
                    :class="mapStyle[props.type]?.iconStyle"
                    class="inline-block mr-1" />

                {{ message }}
            </p>
    </div>

</template>


<script setup>


import { AlertCircle, CheckCircle2 } from 'lucide-vue-next'


const props = defineProps( [ 'message', 'type' ] )


const mapStyle = {
    error: {
        icon: AlertCircle,
        iconStyle: 'text-[#e61c1c]',
        alertStyle: 'border-[#f54e4e] bg-[#fce5e5]'
    },

    success: {
        icon: CheckCircle2,
        iconStyle: 'text-[#36f542]',
        alertStyle: 'border-[#70ff5c] bg-[#e1fedd]'
    },
}


</script>
