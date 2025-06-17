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
    qty: props.item.qty
});

const submitForm = () => {
    form.patch(`/items/${props.item.id}/edit-stock`);
};



</script>
<template>

    <Head title="Edit Stock Items" />
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Edit Stock Items</h2>
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
                                <input readonly type="text" v-model="form.unit" id="name" required
                                    class="shadow bg-gray-200 appearance-none border rounded w-full">
                            </div>
                            <div class="mb-4">
                                <label for="qty" class="block text-gray-700 font-bold mb-2">Qty:</label>
                                <input  type="text" v-model="form.qty" id="name" required
                                    class="shadow appearance-none border rounded w-full">
                                <div class=" m-2 border bg-red-100 border-red-400 text-black-700 py-2 px-4 rounded relative"
                                    v-if="form.errors.qty">
                                    {{ form.errors.qty }}
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
