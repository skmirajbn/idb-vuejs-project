<script setup>
import Header from "@/Components/Header.vue";
import Sidebar from "./partials/Sidebar.vue";
</script>

<template>
    <div class="flex flex-col justify-between min-h-screen bg-gray-400">
        <div>
            <Header :auth="true" />
            <div class="container flex mx-auto">
                <!-- Sidebar -->
                <div class="w-1/4 p-2">
                    <Sidebar />
                </div>
                <!-- Main Content -->
                <div class="w-3/4 p-2">
                    <slot />
                </div>
            </div>
        </div>
        <footer class="py-3 font-bold text-center text-white bg-emerald-600">
            This is Designed by Sk Miraj
        </footer>
    </div>
</template>
