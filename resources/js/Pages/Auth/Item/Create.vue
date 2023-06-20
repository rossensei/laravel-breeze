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

// watch(form, (newValue, oldValue) => {
//     console.log(newValue)
// })

const submit = () => {
    form.post('/items')
}
</script>

<template>
    <Head title="Create" />

    <AuthenticatedLayout>

        <template #header>
            <div class="flex justify-between items-center">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">Item > Create</h2>
                <Link href="/items" class="px-4 py-1.5 rounded-md bg-gray-300 hover:bg-gray-200 text-black">Back</Link>
            </div>
        </template>

        <div class="flex py-12">
            <div class="w-1/4 mx-auto bg-white overflow-hidden shadow-sm sm:rounded-lg p-4">
                <form @submit.prevent="submit">
                    <div class="mb-4">
                        <label for="name">Item name</label>
                        <input v-model="form.name" type="text" name="nameinput" id="name" class="w-full px-2 py-1 text-base rounded-md">
                        <span v-if="form.errors.name" class="text-sm text-red-600 font-light">{{ form.errors.name }}</span>
                    </div>
                    <div class="mb-4">
                        <label for="description">Description</label>
                        <textarea v-model="form.description" type="text" name="description" id="description" class="w-full h-12 px-2 py-1 text-base rounded-md"></textarea>
                        <span v-if="form.errors.description" class="text-sm text-red-600 font-light">{{ form.errors.description}}</span>
                    </div>
                    <div class="flex justify-between items-center space-x-2">
                        <div class="mb-4">
                            <label for="price">Price</label>
                            <input v-model="form.price" type="number" name="price" id="price" class="w-full px-2 py-1 text-base rounded-md" placeholder="0">
                            <span v-if="form.errors.price" class="text-sm text-red-600 font-light">{{ form.errors.price }}</span>
                        </div>
                        <div class="mb-4">
                            <label for="qty">Quantity</label>
                            <input v-model="form.qty" type="number" name="qty" id="qty" class="w-full px-2 py-1 text-base rounded-md" placeholder="0">
                            <span v-if="form.errors.qty" class="text-sm text-red-600 font-light">{{ form.errors.qty }}</span>
                        </div>
                    </div>
                    <div class="mb-4">
                        <label for="itemphoto">Item photo</label>
                        <input type="file" @input="form.itemphoto = $event.target.files[0]" name="itemphoto" id="itemphoto" class="w-full text-base">
                        <progress v-if="form.progress" :value="form.progress.percentage" max="100">
                            {{ form.progress.percentage }}%
                        </progress>
                    </div>

                    <button type="submit" class="w-full text-center py-3 bg-gray-500 text-white rounded-md">Add Item</button>
                </form>
            </div>
        </div>

        <!-- <div class="py-8 w-[400px] mx-auto px-4 rounded bg-white mt-8 shadow">

            <form @submit.prevent="submit">
                <div class="flex flex-col mb-3">
                    <label for="name">Name</label>
                    <input type="text" id="name" v-model="form.name" class="h-full border-gray-400 rounded" />
                    <div class="text-red-600" v-if="form.errors.name">{{ form.errors.name }}</div>
                </div>
                <div class="flex flex-col mb-3">
                    <label for="description">Description</label>
                    <textarea id="description" v-model="form.description" class="h-full border-gray-400 rounded"></textarea>
                    <div class="text-red-600" v-if="form.errors.description">{{ form.errors.description }}</div>
                </div>
                <div class="flex justify-between">
                    <div class="flex flex-col mb-3 w-[45%]">
                        <label for="price">Price</label>
                        <input type="number" step="0.01" id="price" v-model="form.price" class="h-full border-gray-400 rounded text-right" />
                        <div class="text-red-600" v-if="form.errors.price">{{ form.errors.price }}</div>
                    </div>
                    <div class="flex flex-col mb-3 w-[45%]">
                        <label for="qty">Quantity</label>
                        <input type="number" id="qty" v-model="form.qty" class="h-full border-gray-400 rounded text-center" />
                        <div class="text-red-600" v-if="form.errors.qty">{{ form.errors.qty }}</div>
                    </div>
                </div>
                <div class="flex flex-col mb-3">
                    <label for="pic">Product Picture</label>
                    <input type="file" @input="form.itemphoto = $event.target.files[0]" class="h-full border-gray-400 rounded text-center" accept="image/jpeg" />
                    <progress v-if="form.progress" :value="form.progress.percentage" max="100">
                        {{ form.progress.percentage }}%
                    </progress>
                </div>
                <button class="px-4 py-2 bg-blue-200 w-full rounded border border-blue-300 shadow hover:bg-white">
                    Create Item
                </button>
            </form>

        </div> -->
        
    </AuthenticatedLayout>
</template>