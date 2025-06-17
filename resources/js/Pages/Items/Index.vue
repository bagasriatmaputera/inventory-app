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
                        <!-- alert success -->
                        <div v-if="$page.props.flash.success"
                            class="bg-green-100 m-2 border border-green-400 text-black-700 py-2 px-4 rounded relative"
                            role="alert">
                            {{ $page.props.flash.success }}
                        </div>
                        <table class="table-auto w-full mt-4">
                            <thead>
                                <tr>
                                    <th class="py-4 px-2">#</th>
                                    <th class="py-4 px-2">Name</th>
                                    <th class="py-4 px-2">Qty</th>
                                    <th class="py-4 px-2">Piece</th>
                                    <th class="py-4 px-2">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(item, index) in items" :key="index">
                                    <td class="border px-4 py-2">{{ index + 1 }}</td>
                                    <td class="border px-4 py-2">{{ item.name }}</td>
                                    <td class="border px-4 py-2 text-center">{{ item.qty }}</td>
                                    <td class="border px-4 py-2 text-center">{{ item.unit }}</td>
                                    <td class="border px-4 py-2 flex justify-center">
                                        <a :href="`/items/${item.id}/edit-unit`"
                                            class="bg-blue-100 border border-blue-400 hover:bg-blue-700 text-black-200 hover:text-white font-semibold py-2 px-4 rounded shadow">
                                            Edit
                                        </a> |
                                        <a :href="`/items/${item.id}/edit-stock`"
                                            class="bg-blue-100 border border-blue-400 hover:bg-blue-700 text-black-200 hover:text-white font-semibold py-2 px-4 rounded shadow">
                                            Edit Stock
                                        </a> |
                                        <a :href="`/items/${item.id}/stockcard`"
                                            class="bg-blue-100 border border-blue-400 hover:bg-blue-700 text-black-200 hover:text-white font-semibold py-2 px-4 rounded shadow">
                                            Stockcard
                                        </a>
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
