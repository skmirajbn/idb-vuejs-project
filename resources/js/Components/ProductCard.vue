<template>
    <div class="shadow-xl card bg-base-100">
        <figure>
            <img
                :src="route().t.url + '/storage/images/' + product.image"
                alt="Shoes"
            />
        </figure>
        <div class="card-body">
            <h2 class="card-title">{{ product.name }}</h2>
            <div class="text-secondary">
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
            </div>
            <div>
                <h2 class="btn btn-sm btn-secondary">
                    Tk. {{ product.price }}
                </h2>
            </div>

            <div class="justify-end card-actions">
                <button class="btn btn-primary">Buy Now</button>
            </div>
        </div>
    </div>
</template>

<script setup>
defineProps({
    product: Object,
});
</script>

<style lang="scss" scoped></style>
