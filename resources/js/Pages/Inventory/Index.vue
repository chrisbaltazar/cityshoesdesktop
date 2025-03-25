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
        <template #header>Inventario</template>

        <div class="container">
            <div class="p-6 text-gray-900">
                <div class="row">
                    <div class="col">
                        <DataTable
                            :data="products"
                            :columns="columns"
                            class="table table-striped table-hover"
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
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
