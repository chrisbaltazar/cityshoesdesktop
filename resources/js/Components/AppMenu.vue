<script setup>
import NavLink from "@/Components/NavLink.vue";
</script>

<template>
    <NavLink :href="route('dashboard')" :active="route().current('dashboard')">
        Inicio
    </NavLink>
    <NavLink :href="route('sales')" :active="route().current('sales')">
        Venta
    </NavLink>
    <NavLink :href="route('inventory')" :active="route().current('inventory')">
        Inventario
    </NavLink>
</template>
