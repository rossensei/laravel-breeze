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

const props = defineProps({
    item: Object,
    auth: Object
})

const submit = () => {
    form.post('/items')
}
</script>

<template>
    <Head title="View" />

    <AuthenticatedLayout>

        <template #header>
            <div class="flex justify-between items-center">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">Items > View > {{ item.name }}</h2>
                <Link href="/items" class="px-4 py-1.5 rounded-md bg-gray-300 hover:bg-gray-200 text-black">Back</Link>
            </div>
        </template>

        <div class="flex py-12">
            <div class="w-1/4 mx-auto bg-white overflow-hidden shadow-sm sm:rounded-lg p-4">
                <div class="space-y-4">
                    <img :src="props.item.itemphoto_url" alt="">
                    <div>
                        <p class="text-4xl font-semibold">{{ item.name }}</p>
                        <p class="text-base font-normal">{{ item.description }}</p>
                    </div>
                    <div class="flex justify-between items-center">
                        <div class="px-6 pb-6 flex justify-start">
            
                            <label class="relative inline-flex items-center cursor-pointer" :for="'status-' + item.id">
                            <input type="checkbox" :checked="item.enabled" :id="'status-' + item.id" class="sr-only peer" @change="toggleEnabled(item)">
                            <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
                            <span class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300">Enable</span>
                            </label>
                
                        </div>

                        <Link :href="'/items/' + item.id" method="delete" as="button" class="px-4 py-1.5 rounded-md bg-red-600 hover:bg-red-500 text-white">Delete</Link>
                    </div>
                </div>

            </div>
        </div>
        
    </AuthenticatedLayout>
</template>