<script setup>
import NavLink from "@/Components/NavLink.vue";
</script>

<template>
    <NavLink :href="route('dashboard')" :active="route().current('dashboard')">
        Inicio
    </NavLink>
    <NavLink :href="route('sales.index')" :active="route().current('sales.index')">
        Venta
    </NavLink>
    <NavLink :href="route('inventory.index')" :active="route().current('inventory.index')">
        Inventario
    </NavLink>
    <NavLink :href="route('report.index')" :active="route().current('report.index')">
        Reporte
    </NavLink>
</template>
