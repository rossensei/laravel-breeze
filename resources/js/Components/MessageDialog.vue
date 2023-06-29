<script setup>
const prop = defineProps({
    messages: Object
})

// defineEmits(['dismiss'])

const closeDialog = (key) => {
    if(key === 'error') {
        prop.messages.error = null
    } else {
        prop.messages.info = null
    }
}
</script>

<template>
<!-- Dialog -->
<div class="absolute top-0 left-0 flex justify-center items-start h-full min-w-full" v-if="prop.messages.info">
    <div class="bg-gray-100 px-4 py-2 rounded-lg w-1/4 min-h-auto mt-10 fixed shadow-lg text-sm">
        <h1 class="text-lg font-semibold"> Information Message</h1>
        <hr>
        <div class="py-3 flex items-center space-x-4">
            <span class="text-4xl"><i class="fa-solid fa-circle-info text-blue-600"></i></span>
            <p class="text-base font-normal">{{ prop.messages.info }}</p>
        </div>
        <hr>
        <button class="float-right mt-2 bg-blue-600 rounded-md p-2 px-4 text-white hover:bg-blue-500" @click="closeDialog('info')">Dismiss</button>
        <!-- <button class="float-right mt-2 bg-blue-600 rounded-md p-2 px-4 text-white hover:bg-blue-500" @click="$emit('dismiss')">Dismiss</button> -->
    </div>
</div>

<div class="absolute top-0 left-0 flex justify-center items-start h-full min-w-full" v-if="prop.messages.error">
    <div class="bg-gray-100 px-4 py-2 rounded-lg w-1/4 min-h-auto mt-10 fixed shadow-lg text-sm">
        <h1 class="text-lg font-semibold text-red-500"> Warning!</h1>
        <hr>
        <div class="py-3 flex items-center space-x-4">
            <span class="text-4xl"><i class="fa-solid fa-triangle-exclamation text-red-500"></i></span>
            <p class="text-base font-normal">{{ prop.messages.error }}</p>
        </div>
        <hr>
        <button class="float-right mt-2 bg-gray-600 rounded-md p-2 px-4 text-white hover:bg-gray-500" @click="closeDialog('error')">Dismiss</button>
        <!-- <button class="float-right mt-2 bg-gray-600 rounded-md p-2 px-4 text-white hover:bg-gray-500" @click="$emit('dismiss')">Dismiss</button> -->
    </div>
</div>
</template>