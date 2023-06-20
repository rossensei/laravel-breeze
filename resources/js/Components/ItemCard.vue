<script setup>
import { router } from '@inertiajs/vue3';

const prop = defineProps({
    item: Object
})

console.log(prop.item)

const viewItem = () => {
    router.visit('/items/' + prop.item.id)
}
</script>

<template>
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg cursor-pointer" @click="viewItem()">
        <img v-if="prop.item.itemphoto" :src="prop.item.itemphoto_url" alt="itemphoto">
        <img v-else src="https://img.freepik.com/premium-vector/default-image-icon-vector-missing-picture-page-website-design-mobile-app-no-photo-available_87543-11093.jpg" alt="itemphoto">
        <div class="p-6 text-gray-900 font-semibold flex justify-between items-start"><span>{{ item.name }}</span> <span>P{{ item.price }}</span></div>
        <p class="px-6 mb-4">{{ item.description }}</p>
        <p class="px-6 font-light text-sm">{{ item.qty }} pcs</p>
    </div>
</template>