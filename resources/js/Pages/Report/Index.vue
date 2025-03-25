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
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-6 mx-auto">
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
                                <th>Ver</th>
                            </tr>
                            </thead>
                            <template #column-3="props">
                                <button class="btn btn-info btn-sm">
                                    <i class="fa fa-arrow-right"></i>
                                </button>
                            </template>
                        </DataTable>
                    </div>
                    <div class="col-8 col-md-6 mx-auto">

                    </div>
                </div>
            </div>

        </div>

    </AuthenticatedLayout>
</template>
