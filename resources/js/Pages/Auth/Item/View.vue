<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link, useForm } from '@inertiajs/vue3'
import { onMounted, onUpdated, watch } from 'vue';

const form = useForm({
    name: '',
    description: '',
    price: null,
    qty: null,
    itemphoto: null,
})

defineProps({
    item: Object
})

const submit = () => {
    form.post('/items')
}
</script>

<template>
    <Head title="Create" />

    <AuthenticatedLayout>

        <template #header>
            <div class="flex justify-between items-center">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">Items > View > {{ item.name }}</h2>
                <Link href="/items" class="px-4 py-1.5 rounded-md bg-gray-300 hover:bg-gray-200 text-black">Back</Link>
            </div>
        </template>

        <div class="flex py-12">
            <div class="w-1/4 mx-auto bg-white overflow-hidden shadow-sm sm:rounded-lg p-4">
                
            </div>
        </div>
        
    </AuthenticatedLayout>
</template>