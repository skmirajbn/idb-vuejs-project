<template>
    <Head title="Home"></Head>
    <AppLayout>
        <div
            class="min-h-screen hero"
            style="
                background-image: url(https://daisyui.com/images/stock/photo-1507358522600-9f71e620c44e.jpg);
            "
        >
            <div class="hero-overlay bg-opacity-60"></div>
            <div class="text-center hero-content text-neutral-content">
                <div class="max-w-md">
                    <h1 class="mb-5 text-5xl font-bold">IDB Super Shop</h1>
                    <p class="mb-5">
                        Provident cupiditate voluptatem et in. Quaerat fugiat ut
                        assumenda excepturi exercitationem quasi. In deleniti
                        eaque aut repudiandae et a id nisi.
                    </p>
                    <Link href="/shop">
                        <button class="btn btn-primary">Shop Now</button>
                    </Link>
                </div>
            </div>
        </div>
        <section class="py-6">
            <h2 class="py-6 text-3xl font-bold text-center text-primary">
                Latest Products
            </h2>
            <div class="grid grid-cols-4 gap-8">
                <!-- Single Product Card -->
                <ProductCard
                    :product="product"
                    v-for="product in products"
                    :key="product.id"
                ></ProductCard>
            </div>
        </section>
    </AppLayout>
</template>

<script setup>
import { Head, Link } from "@inertiajs/vue3";
import ProductCard from "./../Components/ProductCard.vue";
import AppLayout from "./../Layouts/AppLayout.vue";
defineProps({
    products: Object,
});
</script>

<style scoped></style>
