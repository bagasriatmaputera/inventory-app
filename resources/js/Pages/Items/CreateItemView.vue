<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import { useForm } from '@inertiajs/vue3';

const form = useForm({
    name: '',
    qty: 0,
    unit: ''
});

const submitForm = () => {
    form.post('/items');
};

const pieces = [
    { value: 'KG', name: 'Kilograms' },
    { value: 'GRAM', name: 'Grams' },
    { value: 'LITER', name: 'Liters' },
    { value: 'ML', name: 'Milliliters' },
    { value: 'PCS', name: 'Pieces' },
    { value: 'PACK', name: 'Packs' },
    { value: 'BOX', name: 'Boxes' },
    { value: 'BOTTLE', name: 'Bottles' },
    { value: 'CAN', name: 'Cans' },
    { value: 'SACK', name: 'Sacks' },
    { value: 'BAG', name: 'Bags' },
    { value: 'SET', name: 'Sets' },
    { value: 'ROLL', name: 'Rolls' },
    { value: 'TUBE', name: 'Tubes' },
    { value: 'TRAY', name: 'Trays' },
    { value: 'BARREL', name: 'Barrels' },
    { value: 'CUP', name: 'Cups' },
    { value: 'PORTION', name: 'Portions' },
];

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
                        <form @submit.prevent="submitForm">
                            <div class="mb-4">
                                <label for="name" class="block text-gray-700 font-bold mb-2">Item Name:</label>
                                <input type="text" v-model="form.name" id="name" required
                                    class="shadow appearance-none border rounded w-full">
                                <div class=" m-2 border bg-red-100 border-red-400 text-black-700 py-2 px-4 rounded relative"
                                    v-if="form.errors.name">
                                    {{ form.errors.name }}
                                </div>
                            </div>
                            <div class="mb-4">
                                <label for="qty" class="block text-gray-700 font-bold mb-2">Qty Item:</label>
                                <input type="number" v-model="form.qty" id="qty" required
                                    class="shadow appearance-none border rounded w-full">
                                <div class=" m-2 border bg-red-100 border-red-400 text-black-700 py-2 px-4 rounded relative"
                                    v-if="form.errors.qty">
                                    {{ form.errors.qty }}
                                </div>
                            </div>
                            <div class="mb-4">
                                <label for="unit" class="block text-gray-700 font-bold mb-2">Unit:</label>
                                <!-- <input type="text" v-model="form.unit" id="unit" required placeholder="pcs/kg/liter"
                                    class="shadow appearance-none border rounded w-full"> -->
                                <select name="unit" v-model="form.unit" id="unit"
                                    class="shadow appearance-none border rounded w-full">
                                    <option value="">Choose Pieces</option>
                                    <option :value="piece.value" v-for="(piece, index) in pieces" :key="index">
                                        {{ piece.name }}
                                    </option>
                                </select>
                                <div class=" m-2 border bg-red-100 border-red-400 text-black-700 py-2 px-4 rounded relative"
                                    v-if="form.errors.unit">
                                    {{ form.errors.unit }}
                                </div>
                            </div>
                            <PrimaryButton type="submit">Add Items</PrimaryButton>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
