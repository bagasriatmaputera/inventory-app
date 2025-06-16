<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import PrimaryButton from '@/Components/PrimaryButton.vue';

</script>

<template>

    <Head title="Add Items" />
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Add Items</h2>
        </template>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <form @submit.prevent="cresteItem()">
                            <div class="mb-4">
                                <label for="name" class="block text-grey-700 font-bold mb-2">Item Name:</label>
                                <input type="text" name="name" id="name" required class="shadow appearance-none border rounded w-full">
                            </div>
                            <div class="mb-4">
                                <label for="name" class="block text-grey-700 font-bold mb-2">Qty Item:</label>
                                <input type="number" name="qty" id="qty" required class="shadow appearance-none border rounded w-full">
                            </div>
                            <PrimaryButton type="submit">Add Items</PrimaryButton>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>