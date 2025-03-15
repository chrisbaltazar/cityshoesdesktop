<script setup>
import NavLink from "@/Components/NavLink.vue";
</script>

<template>
    <NavLink :href="route('dashboard')" :active="route().current('dashboard')">
        Dashboard
    </NavLink>
    <NavLink :href="route('inventory')" :active="route().current('inventory')">
        Inventario
    </NavLink>
</template>
