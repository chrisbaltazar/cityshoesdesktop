<script setup>

import {Head, router, usePage} from "@inertiajs/vue3";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import {ref} from "vue";

const testPrinter = ref(null)

defineProps(['printers'])

const print = () => {
    const allPrinters = usePage().props.printers

    console.log('printers', allPrinters)

    const printer = allPrinters[testPrinter.value]

    console.log('printer', printer)

    alert(`Printing on ${printer.displayName}...`)

    router.get(route('printer.print', printer.displayName));
}

</script>

<template>
    <Head title="Printers"/>

    <h3 class="py-3">All printers detected:</h3>
    <select v-model="testPrinter">
        <option v-for="(printer, index) in printers" :key="index" :value="index">{{printer.displayName}}</option>
    </select>

    <PrimaryButton class="my-4" @click="print">Print</PrimaryButton>
</template>
