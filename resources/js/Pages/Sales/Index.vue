<script setup>
import {Head} from '@inertiajs/vue3';
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import {ref, computed} from "vue";

defineProps([
    'sizes',
])

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

const addDetail = () => {
    if (info.value.product && info.value.size && info.value.price) {
        const detailRow = {...info.value}
        delete detailRow.salesman;
        details.value.push(detailRow);
        clear();
    }
}

const clear = (reset = false) => {
    info.value = {}
    if (reset) {
        details.value = [];
    }
}

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
                        <select class="form-control" v-model="info.size" id="cmbSize">
                            <option v-for="size in sizes" :value="size" :key="size">{{ size }}</option>
                        </select>
                        <label for="cmbSize">Talla</label>
                    </div>
                </div>
                <div class="col">
                    <div class="form-floating">
                        <input type="number" step="1" class="form-control" v-model="info.price" id="txtPrice" placeholder="Precio">
                        <label for="txtPrice">Precio</label>
                    </div>
                </div>
                <div class="col max-w-[50px]">
                    <button type="button" class="btn btn-primary btn-lg mt-1" id="btnAdd" @click="addDetail">
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
                    <th>Borrar</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="(detail, index) in details" :key="index">
                    <td>{{ detail.product }}</td>
                    <td>{{ detail.size }}</td>
                    <td>{{ detail.price }}</td>
                    <td>
                        <button type="button" class="btn btn-sm btn-danger" @click="details.splice(index, 1)">
                            <i class="fa fa-trash"></i>
                        </button>
                    </td>
                </tr>
                <tr v-if="!hasDetails">
                    <td colspan="4" class="text-center">Venta vacia</td>
                </tr>
                </tbody>
            </table>
        </div>

        <div class="container mt-5 w-1/2 text-center" id="saleActions">
            <div class="d-flex justify-content-center">
                <button type="button" class="btn btn-danger my-1 mx-1" @click="clear(true)">Cancelar</button>
                <button type="button" :disabled="!hasDetails" class="btn btn-info my-1 mx-1">Tarjeta</button>
                <button type="button" :disabled="!hasDetails" class="btn btn-success my-1 mx-1">Venta Simple</button>
                <button type="button" :disabled="!hasDetails" class="btn btn-warning my-1 mx-1">Venta Fiscal</button>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
