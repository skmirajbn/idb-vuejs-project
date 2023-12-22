<template>
    <AdminLayout>
        <div class="w-full p-4 space-y-4 bg-gray-200 rounded-xl">
            <div class="flex justify-between">
                <h3 class="text-2xl font-bold">
                    <i class="fa-solid fa-tent-arrow-down-to-line"></i> All
                    Thanas
                </h3>
                <Link :href="route('admin.thana.create')">
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
                            <th>Thana Name</th>
                            <th>District Name</th>
                            <th>Delivery Charge</th>
                            <th>View</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="text-lg">
                        <tr v-for="thana in thanas">
                            <th>{{ thana.id }}</th>
                            <td class="font-bold">{{ thana.name }}</td>
                            <td class="font-bold">{{ thana.district.name }}</td>
                            <td class="font-bold">
                                {{ thana.delivery_charge }}
                            </td>
                            <td>
                                <Link
                                    :href="route('admin.thana.show', thana.id)"
                                >
                                    <button class="font-bold btn btn-info">
                                        <i class="fa-solid fa-eye"></i>
                                    </button>
                                </Link>
                            </td>
                            <td class="flex gap-2">
                                <Link
                                    :href="
                                        route('admin.thana.edit', {
                                            thana: thana.id,
                                        })
                                    "
                                >
                                    <button class="btn btn-primary">
                                        Edit
                                    </button></Link
                                >
                                <button
                                    class="btn btn-warning"
                                    @click="deleteThana(thana.id)"
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
    thanas: Object,
});
const swal = inject("$swal");
const deleteThana = (id) => {
    router.visit(route("admin.thana.destroy", id), {
        method: "delete",
        onSuccess: () => {
            swal({
                icon: "success",
                title: "Thana Deleted",
                text: "Thana Deleted Successfully",
            });
        },
    });
};
</script>
