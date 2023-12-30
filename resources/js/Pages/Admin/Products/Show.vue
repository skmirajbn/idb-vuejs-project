<template>
    <AdminLayout>
        <div class="w-full p-4 space-y-4 bg-gray-200 rounded-xl">
            <div class="flex justify-between">
                <h3 class="text-2xl font-bold">
                    <i class="fa-solid fa-building-circle-arrow-right"></i>
                    Product Variations
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
                            <th
                                v-for="product_configuration in product
                                    .product_items[0].product_configurations"
                            >
                                {{
                                    product_configuration.variation_option
                                        .variation.name
                                }}
                            </th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="text-lg">
                        <tr
                            v-for="(
                                productItem, index
                            ) in product.product_items"
                        >
                            <th>{{ productItem.id }}</th>
                            <td class="font-bold">{{ product.name }}</td>
                            <td
                                v-for="product_configuration in product
                                    .product_items[index]
                                    .product_configurations"
                            >
                                {{
                                    product_configuration.variation_option.value
                                }}
                            </td>
                            <td>
                                <img
                                    class="object-cover rounded-lg w-14 h-14"
                                    :src="
                                        route().t.url +
                                        '/storage/images/' +
                                        productItem.image
                                    "
                                    alt=""
                                />
                            </td>
                            <td class="flex gap-2">
                                <Link
                                    :href="
                                        route('admin.productItem.edit', {
                                            product_item: productItem.id,
                                        })
                                    "
                                >
                                    <button class="btn btn-primary">
                                        Edit
                                    </button></Link
                                >
                                <button
                                    class="btn btn-warning"
                                    @click="deleteProductItem(district.id)"
                                >
                                    Delete
                                </button>
                            </td>
                        </tr>
                        <!-- row 3 -->
                    </tbody>
                </table>
            </div>
        </div>
    </AdminLayout>
</template>

<script setup>
import AdminLayout from "@/Layouts/AdminLayout.vue";
import { Link, router } from "@inertiajs/vue3";
import { inject } from "vue";
defineProps({
    category: Object,
    product: Object,
});
const swal = inject("$swal");
const deleteProductItem = (id) => {
    router.visit(route("admin.district.destroy", id), {
        method: "delete",
        onSuccess: () => {
            swal({
                icon: "success",
                title: "ProductItem Deleted",
                text: "ProductItem Deleted Successfully",
            });
        },
    });
};
</script>
