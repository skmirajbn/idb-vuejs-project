<template>
    <AppLayout>
        <div class="w-full p-4 space-y-4 bg-gray-200 rounded-xl">
            <div class="flex justify-between">
                <h3 class="text-2xl font-bold">
                    <i class="fa-solid fa-building-circle-arrow-right"></i>
                    Orders
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
                            <th>Total Products</th>
                            <th>Attributes</th>

                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody class="text-lg">
                        <tr v-for="order in orders">
                            <th>{{ order.id }}</th>
                            <td class="font-bold">
                                {{ order.order_products.length }}
                            </td>
                            <td>sdg</td>

                            <td class="flex gap-2">
                                <Link :href="route('order.show', order.id)"
                                    ><button class="btn btn-primary">
                                        View
                                    </button></Link
                                >
                            </td>
                        </tr>
                        <!-- row 3 -->
                    </tbody>
                </table>
            </div>
        </div>
    </AppLayout>
</template>

<script setup>
import { Link } from "@inertiajs/vue3";
import AppLayout from "../../../Layouts/AppLayout.vue";

defineProps({
    orders: Array,
});
</script>

<style lang="scss" scoped></style>
