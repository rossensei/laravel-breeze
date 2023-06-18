<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import ItemCard from '@/Components/ItemCard.vue';
import { onMounted } from 'vue';

const props = defineProps({
    items: Array
})
</script>

<template>
    <Head title="Items" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Items</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-2">
                <ItemCard :items="props.items" />
            </div>
        </div>

        <!-- <div class="grid grid-cols-3 gap-4">
            <div class="col text-blue-600 h-44 w-full">sdfsdfs</div>
            <div class="col text-blue-600 h-44 w-full">sdfsdfs</div>
            <div class="col text-blue-600 h-44 w-full">sdfsdfs</div>
            <div class="col text-blue-600 h-44 w-full">sdfsdfs</div>
            <div class="col text-blue-600 h-44 w-full">sdfsdfs</div>
        </div> -->
    </AuthenticatedLayout>
</template>
