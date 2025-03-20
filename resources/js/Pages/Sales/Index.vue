<script setup>
import {Head} from '@inertiajs/vue3';
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import {ref, computed} from "vue";

const columns = [
    {data: 'product'},
    {data: 'size'},
    {data: 'price'},
];

const info = ref({
    salesman: '',
    product: '',
    size: '',
    price: ''
});
const details = ref([]);

const hasDetails = computed(() => {
    return details.value.length > 0;
});

</script>

<template>
    <Head title="Ventas"/>

    <AuthenticatedLayout>
        <template #header>Ventas</template>

        <div class="container mt-5" id="saleInfo">
            <div class="row">
                <div class="col">
                    <div class="form-floating">
                        <input type="text" class="form-control" v-model="info.salesman" id="txtSalesman" placeholder="Vendedor">
                        <label for="txtSalesman">Vendedor</label>
                    </div>
                </div>
                <div class="col">
                    <div class="form-floating">
                        <input type="text" class="form-control" v-model="info.product" id="txtProduct" placeholder="Producto">
                        <label for="txtProduct">Producto</label>
                    </div>
                </div>
                <div class="col">
                    <div class="form-floating">
                        <input type="text" class="form-control" v-model="info.size" id="cmbSize" placeholder="Talla">
                        <label for="cmbSize">Talla</label>
                    </div>
                </div>
                <div class="col">
                    <div class="form-floating">
                        <input type="text" class="form-control" v-model="info.price" id="txtPrice" placeholder="Precio">
                        <label for="txtPrice">Precio</label>
                    </div>
                </div>
                <div class="col max-w-[50px]">
                    <button type="button" class="btn btn-primary btn-lg mt-1" id="btnAdd">
                        <i class="fa fa-plus"></i>
                    </button>
                </div>
            </div>
        </div>

        <div class="container mt-5 w-2/3 text-center shadow-2xl p-3 border-1 rounded" id="saleDetails">
            <table class="table table-striped table-hover">
                <thead>
                <tr>
                    <th>Producto</th>
                    <th>Talla</th>
                    <th>Precio</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="(detail, index) in details" :key="index">
                    <td>{{ detail.product }}</td>
                    <td>{{ detail.size }}</td>
                    <td>{{ detail.price }}</td>
                </tr>
                <tr v-if="!hasDetails">
                    <td colspan="3" class="text-center">Venta vacia</td>
                </tr>
                </tbody>
            </table>
        </div>

        <div class="container mt-5 w-1/2 text-center" id="saleActions">
            <div class="d-flex justify-content-center">
                <button type="button" class="btn btn-danger my-1 mx-1">Cancelar</button>
                <button type="button" :disabled="!hasDetails" class="btn btn-info my-1 mx-1">Tarjeta</button>
                <button type="button" :disabled="!hasDetails" class="btn btn-success my-1 mx-1">Venta Simple</button>
                <button type="button" :disabled="!hasDetails" class="btn btn-warning my-1 mx-1">Venta Fiscal</button>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
