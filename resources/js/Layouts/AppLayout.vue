<template>
    <div class="min-h-screen">
        <header class="bg-info">
            <div class="container flex mx-auto">
                <div class="w-1/4 text-2xl">
                    <Link href="/login">Logo</Link>
                </div>
                <div class="w-2/4 text-4xl">
                    <button class="btn btn-primary btn-md">Home</button>
                </div>
                <div class="w-1/4 text-4xl">Search</div>
            </div>
        </header>
        <slot />
        <footer class="py-2 bg-secondary">footer</footer>
    </div>
</template>

<script setup>
import { Link } from "@inertiajs/vue3";
</script>

<style lang="scss" scoped></style>
