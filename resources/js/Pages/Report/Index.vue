<script setup>
import {Head} from '@inertiajs/vue3';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';

defineProps([
    'sales',
])

const columns = [
    {data: 'date'},
    {data: 'salesman.name'},
    {data: 'total'},
];
</script>

<template>
    <Head title="Reporte"/>

    <AuthenticatedLayout>
        <template #header>Reporte</template>

        <div class="p-6 text-gray-900">
            <DataTable
                :data="sales"
                :columns="columns"
                class="table table-striped table-hover"
            >
                <thead>
                <tr>
                    <th>Fecha</th>
                    <th>Nombre</th>
                    <th>Total</th>
                </tr>
                </thead>
            </DataTable>
        </div>

    </AuthenticatedLayout>
</template>
