<template>

  <input 
    type="checkbox"
    class="w-[24px] h-[24px] appearance-none rounded-md border-2 border-[#E2D6FF] hover:border-[#7C3AED] cursor-pointer checked:bg-[#7C3AED] checked:border-[#7C3AED] custom-checkbox relative"
    v-model="selected"
    :value="value" />

</template>

<script setup>

import { ref, watch } from 'vue'


const props = defineProps([
  'modelValue',
  'value'
])


const selected = ref(getInitialValue())

const emit = defineEmits(['update:modelValue'])


function getInitialValue() {
  const index = props.modelValue.findIndex(amount => amount == props.value)
  return index >= 0
}


watch(selected, () => {
  if (selected.value)
    handlerAddValue()

  else
    handlerRemoveValue()
})



function handlerRemoveValue() {
  const selectedValues = props.modelValue
  const index = selectedValues.findIndex(amount => amount == props.value)

  if (index >= 0)
    selectedValues.splice(index, 1)

  emit('update:modelValue', selectedValues)
}

function handlerAddValue() {
  const selectedValues = props.modelValue
  selectedValues.push(props.value)

  emit('update:modelValue', selectedValues)
}



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
