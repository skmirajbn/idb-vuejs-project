<template>
    <AdminLayout>
        <div class="w-full p-4 space-y-4 bg-gray-200 rounded-xl">
            <div class="flex justify-between">
                <h3 class="text-2xl font-bold">
                    <i class="fa-solid fa-building-circle-arrow-right"></i> All
                    Products
                </h3>
                <Link :href="route('admin.product.create')">
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
                            <th>Description</th>
                            <th>Price</th>
                            <th>Category</th>
                            <th>Variations</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="text-lg">
                        <tr v-for="product in products">
                            <th>{{ product.id }}</th>
                            <td class="font-bold">{{ product.name }}</td>
                            <td class="font-bold">{{ product.description }}</td>
                            <td class="font-bold">{{ product.price }}</td>
                            <td class="font-bold">
                                {{ product.category.name }}
                            </td>
                            <td class="font-bold">
                                {{ product.product_items.length }}
                                <Link
                                    :href="
                                        route('admin.product.show', {
                                            product: product.id,
                                        })
                                    "
                                    ><i class="pl-2 fa-solid fa-eye"></i
                                ></Link>
                            </td>
                            <td>
                                <img
                                    class="object-cover rounded-lg w-14 h-14"
                                    :src="
                                        route().t.url +
                                        '/storage/images/' +
                                        product.image
                                    "
                                />
                            </td>
                            <td class="flex gap-2">
                                <Link
                                    :href="
                                        route('admin.product.edit', {
                                            product: product.id,
                                        })
                                    "
                                >
                                    <button class="btn btn-primary">
                                        Edit
                                    </button></Link
                                >
                                <button
                                    class="btn btn-warning"
                                    @click="deleteProduct(product.id)"
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
    products: Object,
});
const swal = inject("$swal");
const deleteProduct = (id) => {
    router.visit(route("admin.product.destroy", id), {
        method: "delete",
        onSuccess: () => {
            swal({
                icon: "success",
                title: "Product Deleted",
                text: "Product Deleted Successfully",
            });
        },
    });
};
</script>
