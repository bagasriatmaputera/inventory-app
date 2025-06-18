<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import { useForm } from '@inertiajs/vue3';

const props = defineProps({
    item: Object,
});

const form = useForm({
    name: props.item.name,
    unit: props.item.unit,
    qty: props.item.qty,
    status: '',
    description: ''
});

const submitForm = () => {
    form.patch(`/items/${props.item.id}/edit-stock`);
};

const status = [
    { value: 'in', name: 'IN' },
    { value: 'out', name: 'OUT' }
]



</script>
<template>

    <Head title="Edit Stock Items" />
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Edit Stock Items :
                <span class="bg-blue-400 rounded px-2 border border-blue-400 text-white">
                    {{ props.item.name }} ({{ props.item.qty }})
                </span></h2>
        </template>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <form @submit.prevent="submitForm">
                            <div class="mb-4">
                                <label for="name" class="block text-gray-700 font-bold mb-2">Item Name:</label>
                                <input readonly type="text" v-model="form.name" id="name" required
                                    class="shadow bg-gray-200 appearance-none border rounded w-full">
                            </div>
                            <div class="mb-4">
                                <label for="unit" class="block text-gray-700 font-bold mb-2">Item Unit:</label>
                                <input readonly type="text" v-model="form.unit" id="unit" required
                                    class="shadow bg-gray-200 appearance-none border rounded w-full">
                            </div>
                            <div class="mb-4">
                                <label for="qty" class="block text-gray-700 font-bold mb-2">Qty:</label>
                                <input type="text" v-model="form.qty" id="qty" required
                                    class="shadow appearance-none border rounded w-full">
                                <div class=" m-2 border bg-red-100 border-red-400 text-black-700 py-2 px-4 rounded relative"
                                    v-if="form.errors.qty">
                                    {{ form.errors.qty }}
                                </div>
                            </div>
                            <div class="mb-4">
                                <label for="status" class="block text-gray-700 font-bold mb-2">Status:</label>
                                <select name="status" v-model="form.status" id="status"
                                    class="shadow appearance-none border rounded w-full">
                                    <option value="" disabled selected>Choose status:</option>
                                    <option :value="note.value" v-for="(note, index) in status" :key="index">
                                        {{ note.name }}
                                    </option>
                                </select>
                                <div class=" m-2 border bg-red-100 border-red-400 text-black-700 py-2 px-4 rounded relative"
                                    v-if="form.errors.status">
                                    {{ form.errors.status }}
                                </div>
                            </div>
                            <div class="mb-4">
                                <label for="description" class="block text-gray-700 font-bold mb-2">Description:</label>
                                <textarea v-model="form.description" id="description" required
                                    class="shadow appearance-none border rounded w-full"></textarea>
                                <div class="m-2 border bg-red-100 border-red-400 text-black-700 py-2 px-4 rounded relative"
                                    v-if="form.errors.description">
                                    {{ form.errors.description }}
                                </div>
                            </div>
                            <PrimaryButton type="submit">Edit Stock Items</PrimaryButton>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
