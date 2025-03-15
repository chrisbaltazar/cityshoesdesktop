<script setup>
    import {Head} from '@inertiajs/vue3';
    import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
</script>

<template>
    <Head title="Inventory" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800">Inventario general</h2>
        </template>


    </AuthenticatedLayout>
</template>
