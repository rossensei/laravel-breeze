<script setup>
import { router } from '@inertiajs/vue3';

const prop = defineProps({
    item: Object
})

console.log(prop.item)

const viewItem = () => {
    router.visit('/items/' + prop.item.id)
}

const toggleEnabled = (item) => {
    // console.log(item)
    router.visit('/items/toggle/' + item.id, {
        method: 'post',
        preserveScroll: true
    })
}
</script>

<template>
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg cursor-pointer">
        <div class="flex-1" @click="viewItem()">
            <img v-if="prop.item.itemphoto" :src="prop.item.itemphoto_url" alt="itemphoto">
            <img v-else src="https://img.freepik.com/premium-vector/default-image-icon-vector-missing-picture-page-website-design-mobile-app-no-photo-available_87543-11093.jpg" alt="itemphoto">
            <div class="p-6 text-gray-900 font-semibold flex justify-between items-start"><span>{{ item.name }}</span> <span>P{{ item.price }}</span></div>
            <p class="px-6 mb-4">{{ item.description }}</p>
            <p class="px-6 font-light text-sm">{{ item.qty }} pcs</p>
        </div>

        <div class="px-6 pb-6 flex justify-start">
            
            <label class="relative inline-flex items-center cursor-pointer" :for="'status-' + item.id">
            <input type="checkbox" :checked="item.enabled" :id="'status-' + item.id" class="sr-only peer" @change="toggleEnabled(item)">
            <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
            <span class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300">Enable</span>
            </label>

        </div>
    </div>
</template>