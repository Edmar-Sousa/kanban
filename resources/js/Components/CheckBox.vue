<template>

    <input 
        type="checkbox"
        class="w-[24px] h-[24px] appearance-none rounded-md border-2 border-[#E2D6FF] hover:border-[#7C3AED] cursor-pointer checked:bg-[#7C3AED] checked:border-[#7C3AED] custom-checkbox relative"
        v-model="isChecked" />

</template>

<script setup>

import { shallowRef } from 'vue'


const props = defineProps([
    'modelValue',
])


const isChecked = shallowRef(props.modelValue)


</script>



<style>
  .custom-checkbox:checked::before {
    content: '';
    position: absolute;
    top: 50%;
    left: 50%;

    width: 6px;
    height: 10px;
    
    border: solid white;
    border-width: 0 2px 2px 0;
    
    transform: translate(-50%, -55%) rotateZ(45deg);
  }
</style>
