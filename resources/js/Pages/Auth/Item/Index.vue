<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link, router } from '@inertiajs/vue3';
import ItemCard from '@/Components/ItemCard.vue';
import { onMounted } from 'vue';

const props = defineProps({
    items: Array
})

const search = (ev) => {
    router.visit('/items/search/' + ev.target.value)
}

</script>

<template>
    <Head title="Items" />

    <AuthenticatedLayout>
        <template #header>
            <div class="flex justify-between items-center">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">Items</h2>

                <input type="text" name="search" id="search" class="rounded-full px-4 py-1" placeholder="Search..." @keydown.enter="search($event)">

                <Link href="/items/create" class="px-4 py-1.5 rounded-md bg-gray-300 hover:bg-gray-200 text-black">Add Item</Link>
            </div>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 grid grid-cols-4 gap-4">
                <ItemCard v-for="item in items" :key="item.id" :item="item" />
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
