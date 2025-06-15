<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';

    defineProps(
        {
            items: Array
        }
    )
</script>
<template >
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Items</h2>
        </template>
        <ul>
            <li v-for="item in items" :key="item.id">
                {{ item.name }}
            </li>
        </ul>
    </AuthenticatedLayout>
</template>
