<script setup>
import {Head, router} from '@inertiajs/vue3';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';

defineProps([
    'sales',
    'details',
])

const columns = [
    {data: 'date'},
    {data: 'salesman.name'},
    {data: 'total'},
];

const view = (data) => {
    router.get(route('report.show', data.id), {}, {
        only: ['details']
    });
}

</script>

<template>
    <Head title="Reporte"/>

    <AuthenticatedLayout>
        <template #header>Reporte</template>

        <div class="container-fluid">
            <div class="p-6 text-gray-900">
                <div class="row">
                    <div class="col-12 col-md-6 mx-auto pr-5">
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
                                <button class="btn btn-info btn-sm" @click="view(props.rowData)">
                                    <i class="fa fa-arrow-right"></i>
                                </button>
                            </template>
                        </DataTable>
                    </div>
                    <div class="col-8 col-md-6 mx-auto mt-5 pl-5">
                        <div class="card border-warning shadow-2xl">
                            <div class="card-header">
                                <h5>Detalles de la venta</h5>
                            </div>
                            <div class="card-body">
                                <table class="table table-striped table-hover">
                                    <thead>
                                    <tr>
                                        <th>Producto</th>
                                        <th>Talla</th>
                                        <th>Precio</th>
                                        <th>Cantidad</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr v-for="row in details" :key="row.id">
                                        <td>{{ row.product.name }}</td>
                                        <td>{{ row.product.size }}</td>
                                        <td>{{ row.price }}</td>
                                        <td>{{ row.quantity }}</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </AuthenticatedLayout>
</template>
