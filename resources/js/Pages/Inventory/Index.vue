<script setup>
import {Head} from '@inertiajs/vue3';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';

defineProps([
    'products',
])

const columns = [
    {data: 'name'},
    {data: 'size'},
    {data: 'price'},
];
</script>

<template>
    <Head title="Inventory"/>

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800">Inventario general</h2>
        </template>

        <div class="p-6 text-gray-900">
            <DataTable
                :data="products"
                :columns="columns"
                class="table is-striped is-hoverable is-fullwidth"
            >
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Size</th>
                    <th>Price</th>
                </tr>
                </thead>
            </DataTable>
        </div>

    </AuthenticatedLayout>
</template>
