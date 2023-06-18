<script setup>
const props = defineProps({
    items: Array
})
</script>

<template>
    <div v-for="item in props.items" :key="item.id" class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900 font-semibold">{{ item.name }}</div>
        <p class="px-6 mb-4">{{ item.description }}</p>
    </div>
</template>