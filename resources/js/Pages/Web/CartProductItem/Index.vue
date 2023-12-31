<template>
    <AppLayout>
        <div class="w-full p-4 space-y-4 bg-gray-200 rounded-xl">
            <div class="flex justify-between">
                <h3 class="text-2xl font-bold">
                    <i class="fa-solid fa-building-circle-arrow-right"></i> All
                    Cart Products
                </h3>
                <Link :href="route('admin.district.create')">
                    <button class="block btn btn-primary">
                        Add New <i class="fa-solid fa-plus"></i>
                    </button>
                </Link>
            </div>
            <div class="overflow-x-auto">
                <table class="table">
                    <!-- head -->
                    <thead class="text-xl text-white bg-emerald-600">
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Attributes</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="text-lg">
                        <tr v-for="cartproductItem in productItems">
                            <th>{{ cartproductItem.id }}</th>
                            <td class="font-bold">
                                {{ cartproductItem.product_item.product.name }}
                            </td>
                            <td>
                                <span
                                    v-for="productConfiguration in cartproductItem
                                        .product_item.product_configurations"
                                    >{{
                                        productConfiguration.variation_option
                                            .variation.name
                                    }}
                                    :
                                    {{
                                        productConfiguration.variation_option
                                            .value
                                    }}
                                </span>
                            </td>
                            <td>
                                <img
                                    class="object-cover w-20 h-20"
                                    :src="
                                        route().t.url +
                                        '/storage/images/' +
                                        cartproductItem.product_item.image
                                    "
                                    alt=""
                                />
                            </td>
                            <td class="flex gap-2">
                                <Link>
                                    <button class="btn btn-primary">
                                        Edit
                                    </button></Link
                                >
                                <button
                                    class="btn btn-warning"
                                    @click="deleteDistrict(district.id)"
                                >
                                    Delete
                                </button>
                            </td>
                        </tr>
                        <!-- row 3 -->
                    </tbody>
                </table>
            </div>
            <button class="block mx-auto btn btn-primary" @click="createOrder">
                Create Order
            </button>
        </div>
    </AppLayout>
</template>

<script setup>
import { router } from "@inertiajs/vue3";
import AppLayout from "../../../Layouts/AppLayout.vue";

defineProps({
    productItems: Array,
});

const createOrder = () => {
    console.log("clicked");
    router.visit(route("cart.createOrder"), {
        method: "post",
    });
};
</script>
