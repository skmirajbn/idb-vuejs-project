<script setup>
import Header from "@/Components/Header.vue";
import Sidebar from "./partials/Sidebar.vue";
</script>

<template>
    <Header :auth="true" />
    <div class="container flex mx-auto">
        <!-- Sidebar -->
        <div class="w-1/4 p-4">
            <Sidebar />
        </div>
        <!-- Main Content -->
        <div>
            <slot />
        </div>
    </div>
</template>
