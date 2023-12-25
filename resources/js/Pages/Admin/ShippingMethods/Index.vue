<template>
    <AdminLayout>
        <div class="w-full p-4 space-y-4 bg-gray-200 rounded-xl">
            <div class="flex justify-between">
                <h3 class="text-2xl font-bold">
                    <i class="fa-solid fa-building-circle-arrow-right"></i> All
                    Shipping Methods
                </h3>
                <Link :href="route('admin.shipping-method.create')">
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
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="text-lg">
                        <tr v-for="shippingMethod in shippingMethods">
                            <th>{{ shippingMethod.id }}</th>
                            <td class="font-bold">{{ shippingMethod.name }}</td>
                            <td class="flex gap-2">
                                <Link
                                    :href="
                                        route(
                                            'admin.shipping-method.edit',
                                            shippingMethod.id
                                        )
                                    "
                                >
                                    <button class="btn btn-primary">
                                        Edit
                                    </button></Link
                                >
                                <button
                                    class="btn btn-warning"
                                    @click="
                                        deleteShippingMethod(shippingMethod.id)
                                    "
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
    shippingMethods: Object,
});
const swal = inject("$swal");
const deleteShippingMethod = (id) => {
    router.visit(route("admin.shipping-method.destroy", id), {
        method: "delete",
        onSuccess: () => {
            swal({
                icon: "success",
                title: "ShippingMethod Deleted",
                text: "ShippingMethod Deleted Successfully",
            });
        },
    });
};
</script>
