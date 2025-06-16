<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import PrimaryButton from '@/Components/PrimaryButton.vue';
defineProps(
    {
        items: Array
    }
)
</script>
<template>

    <Head title="Items" />
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Items</h2>
        </template>
        <!-- Table items -->
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <PrimaryButton>
                            <a href="/items-add">
                                CREATE ITEM
                            </a>
                        </PrimaryButton>
                        <table class="table-auto w-full mt-4">
                            <thead>
                                <tr>
                                    <th class="py-4 px-2">#</th>
                                    <th class="py-4 px-2">Name</th>
                                    <th class="py-4 px-2">Qty</th>
                                    <th class="py-4 px-2">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(item, index) in items" :key="index">
                                    <td class="border px-4 py-2">{{ index + 1 }}</td>
                                    <td class="border px-4 py-2">{{ item.name }}</td>
                                    <td class="border px-4 py-2">{{ item.qty }}</td>
                                    <td class="border px-4 py-2">Edit || Stock Card</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
