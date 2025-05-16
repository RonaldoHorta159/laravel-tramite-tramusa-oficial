<script setup>
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import { usePage } from '@inertiajs/vue3';

const page = usePage();
</script>

<template>
    <div>
        <button v-if="page.props.user.permissions.includes('create role')" >Manage rols</button>
        <button v-if="page.props.user.permissions.includes('create document')" >Manage documents</button>
    </div>
</template>

<style>
button{
    background-color: green;
    color: white;
    padding: 20px;
    margin: 5px;
}
</style>
