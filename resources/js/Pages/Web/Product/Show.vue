<template>
    <Head title="Home"></Head>
    <AppLayout>
        <!-- template of single product page -->

        <div class="py-8 bg-gray-100 dark:bg-gray-800">
            <div class="max-w-6xl px-4 mx-auto sm:px-6 lg:px-8">
                <div class="flex flex-col -mx-4 md:flex-row">
                    <div class="px-4 md:flex-1">
                        <div
                            class="h-[460px] rounded-lg bg-gray-300 dark:bg-gray-700 mb-4"
                        >
                            <img
                                class="object-cover w-full h-full"
                                :src="
                                    route().t.url +
                                    '/storage/images/' +
                                    selectedProductItem?.image
                                "
                                alt="Product Image"
                            />
                        </div>
                        <div class="flex mb-4 -mx-2">
                            <div class="w-1/2 px-2">
                                <button
                                    class="w-full px-4 py-2 font-bold text-white bg-gray-900 rounded-full dark:bg-gray-600 hover:bg-gray-800 dark:hover:bg-gray-700"
                                    @click="addToCart"
                                >
                                    Add to Cart
                                </button>
                            </div>
                            <div class="w-1/2 px-2">
                                <button
                                    class="w-full px-4 py-2 font-bold text-gray-800 bg-gray-200 rounded-full dark:bg-gray-700 dark:text-white hover:bg-gray-300 dark:hover:bg-gray-600"
                                >
                                    Add to Wishlist
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="px-4 md:flex-1">
                        {{ form.product_item_id }}
                        <h2
                            class="mb-2 text-2xl font-bold text-gray-800 dark:text-white"
                        >
                            {{ product.name }}
                        </h2>
                        <p
                            class="mb-4 text-sm text-gray-600 dark:text-gray-300"
                        >
                            {{ product.description }}
                        </p>
                        <div class="flex mb-4">
                            <div class="mr-4">
                                <span
                                    class="font-bold text-gray-700 dark:text-gray-300"
                                    >Price:</span
                                >
                                <span class="text-gray-600 dark:text-gray-300"
                                    >{{ product.price }} taka</span
                                >
                            </div>
                            <div>
                                <span
                                    class="font-bold text-gray-700 dark:text-gray-300"
                                    >Availability:</span
                                >
                                <span class="text-gray-600 dark:text-gray-300"
                                    >In Stock</span
                                >
                            </div>
                        </div>
                        <div class="flex flex-col gap-3">
                            <div
                                v-for="productConfiguration in product
                                    .product_items[0].product_configurations"
                            >
                                <div class="flex flex-col">
                                    <label class="font-bold" for=""
                                        >Select
                                        {{
                                            productConfiguration
                                                .variation_option.variation.name
                                        }}</label
                                    >
                                    <select
                                        class="rounded-lg"
                                        name=""
                                        id=""
                                        @change="handleVariationChange"
                                    >
                                        <option value="">
                                            Select
                                            {{
                                                productConfiguration
                                                    .variation_option.variation
                                                    .name
                                            }}
                                        </option>
                                        <option
                                            :value="variation_option.id"
                                            v-for="variation_option in productConfiguration
                                                .variation_option.variation
                                                .variation_options"
                                        >
                                            {{ variation_option.value }}
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="flex items-center gap-3">
                                <label class="font-bold" for="">Quantity</label>
                                <input
                                    class="w-14"
                                    type="number"
                                    v-model="form.quantity"
                                />
                            </div>
                        </div>
                        <div>
                            <span
                                class="font-bold text-gray-700 dark:text-gray-300"
                                >Product Description:</span
                            >
                            <p
                                class="mt-2 text-sm text-gray-600 dark:text-gray-300"
                            >
                                {{ product.description }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>

<script setup>
import { Head, useForm, usePage } from "@inertiajs/vue3";
import { inject, onMounted, ref } from "vue";
import AppLayout from "./../../../Layouts/AppLayout.vue";
defineProps({
    product: Object,
});
const swal = inject("$swal");
const page = usePage();

const selectedProductItem = ref(null);

const handleVariationChange = (event) => {
    selectedProductItem.value = page.props.product.product_items.find(
        (productItem) => productItem.id == event.target.value
    );
    form.product_item_id = selectedProductItem.value?.id;
};

const form = useForm({
    quantity: 1,
    product_item_id: selectedProductItem.value?.id,
});

onMounted(() => {
    selectedProductItem.value = page.props.product.product_items[0];
    form.product_item_id = selectedProductItem.value?.id;
    console.log(selectedProductItem.value);
});

const addToCart = () => {
    console.log(form);
    form.post(route("cart.store"), {
        preserveState: true,
        onSuccess: (data) => {
            form.reset();
            swal({
                icon: "success",
                title: "Cart Added",
                text: data.props.message,
            });
        },
        onError: (err) => {
            console.log(err);
            swal({
                icon: "error",
                title: "Oops...",
                text: err.cart,
            });
        },
    });
};
</script>

<style scoped></style>
