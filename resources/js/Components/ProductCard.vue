<template>
    <div class="shadow-xl card bg-base-100">
        <figure>
            <img
                class="object-cover w-full h-60"
                :src="route().t.url + '/storage/images/' + product.image"
                alt="Shoes"
            />
        </figure>
        <div class="card-body">
            <h2 class="card-title">{{ product.name }}</h2>
            <!-- <div class="text-secondary">
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
            </div>
            <div>
                <span class="mr-2 line-through btn btn-xs">
                    <s>$49.99</s>
                    <span
                        class="absolute top-0 right-0 w-full h-full rotate-45 opacity-25"
                    ></span>
                </span>
            </div> -->
            <div class="flex gap-3">
                <div class="flex flex-col gap-3">
                    <h2 class="btn btn-sm btn-secondary w-fit">
                        Tk. {{ product.price }}
                    </h2>
                    <h3 class="p-2 bg-gray-300 rounded-lg w-fit">
                        <i class="fa-solid fa-filter"></i>
                        {{ product.product_items?.length }}
                    </h3>
                </div>
                <h3 class="btn btn-sm">{{ product.category.name }}</h3>
            </div>

            <div class="justify-end card-actions">
                <Link :href="route('web.product.show', product.id)">
                    <button class="btn btn-primary">View More</button></Link
                >
            </div>
        </div>
    </div>
</template>

<script setup>
import { Link } from "@inertiajs/vue3";

defineProps({
    product: Object,
});
</script>

<style lang="scss" scoped></style>
