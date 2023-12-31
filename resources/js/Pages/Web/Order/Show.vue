<template>
    <AppLayout>
        <div class="w-full p-4 space-y-4 bg-gray-200 rounded-xl">
            <div class="flex justify-between">
                <h3 class="text-2xl font-bold">
                    <i class="fa-solid fa-building-circle-arrow-right"></i>
                    Ordered Products
                </h3>
                <Link :href="route('admin.productItem.create')">
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
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Sub Total</th>
                            <th>Image</th>
                        </tr>
                    </thead>
                    <tbody class="text-lg">
                        <tr v-for="orderProduct in order.order_products">
                            <th>{{ orderProduct.id }}</th>
                            <td class="font-bold">
                                {{ orderProduct.product_item.product.name }}
                            </td>
                            <td class="font-bold">
                                {{ orderProduct.product_item.price }}
                            </td>
                            <td class="font-bold">
                                {{ orderProduct.quantity }}
                            </td>

                            <td class="font-bold">
                                {{
                                    orderProduct.product_item.price *
                                    orderProduct.quantity
                                }}
                            </td>

                            <td>
                                <img
                                    class="object-cover rounded-lg w-14 h-14"
                                    :src="
                                        route().t.url +
                                        '/storage/images/' +
                                        orderProduct.product_item.image
                                    "
                                    alt=""
                                />
                            </td>
                        </tr>
                        <!-- row 3 -->
                    </tbody>
                </table>
                <!-- Total amoun twill be all product and quantity multiple then add them all -->
                Total: {{ order.price }}

                <button class="block mx-auto btn btn-primary">Print</button>
            </div>
        </div>
    </AppLayout>
</template>

<script setup>
import AppLayout from "../../../Layouts/AppLayout.vue";

defineProps({
    order: Object,
});
</script>
