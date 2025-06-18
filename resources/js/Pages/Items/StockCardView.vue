<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import PrimaryButton from '@/Components/PrimaryButton.vue';
const props = defineProps({
    items: Array,
    item: Object
});
</script>
<template>

    <Head title="Items" />
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">StockCard
                <span class="bg-blue-400 rounded text-white px-2 border border-blue-700">{{ props.item.name }}</span>
            </h2>
        </template>
        <!-- Table items -->
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <PrimaryButton>
                            <a href="/items">
                                Back
                            </a>
                        </PrimaryButton>
                        <table class="table-auto w-full mt-4">
                            <thead>
                                <tr>
                                    <th class="py-4 px-2">Status</th>
                                    <th class="py-4 px-2">Qty</th>
                                    <th class="py-4 px-2">Description</th>
                                    <th class="py-4 px-2">Time</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(item, index) in props.items" :key="index">
                                    <td class="border px-4 py-2">{{ item.status }}</td>
                                    <td class="border px-4 py-2 text-center">{{ item.qty }}</td>
                                    <td class="border px-4 py-2 text-center">{{ item.description }}</td>
                                    <td class="border px-4 py-2 text-center">{{ new
                                        Date(item.created_at).toLocaleString() }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
