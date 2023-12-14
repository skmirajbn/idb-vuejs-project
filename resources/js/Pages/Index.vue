<script setup>
import { Link } from "@inertiajs/vue3";

import { Head } from "@inertiajs/vue3";

defineProps({});
</script>

<template>
    <Head title="Home"></Head>
    <div class="flex mx-auto max-w-7xl">
        <div class="w-1/4 text-4xl bg-green-400">Logo</div>
        <div class="w-2/4 text-4xl bg-green-400">
            <Link :href="route('login')">Ssh restarted</Link>
        </div>
        <div class="w-1/4 text-4xl bg-green-400">Search</div>
    </div>
</template>

<style scoped></style>
