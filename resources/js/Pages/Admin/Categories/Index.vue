<template>
    <AdminLayout>
        <div class="w-full p-4 space-y-4 bg-gray-200 rounded-xl">
            <div class="flex justify-between">
                <h3 class="text-2xl font-bold">
                    <i class="fa-solid fa-table-list"></i> All Categories
                </h3>
                <Link :href="route('admin.category.create')">
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
                            <th>Category Name</th>
                            <th>Parent Category Name</th>
                            <th>Description</th>
                            <th>Image</th>
                            <th>View</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="text-lg">
                        <tr v-for="category in categories">
                            <th>{{ category.id }}</th>
                            <td class="font-bold">{{ category.name }}</td>
                            <td class="font-bold">
                                {{
                                    category.parent_category
                                        ? category.parent_category.name
                                        : "No Parent"
                                }}
                            </td>
                            <td class="font-bold">
                                {{ category.description }}
                            </td>
                            <td class="font-bold">
                                <img
                                    class="object-cover rounded-lg w-14 h-14"
                                    :src="'/storage/images/' + category.image"
                                    alt=""
                                />
                            </td>
                            <td>
                                <Link
                                    :href="
                                        route(
                                            'admin.category.show',
                                            category.id
                                        )
                                    "
                                >
                                    <button class="font-bold btn btn-info">
                                        <i class="fa-solid fa-eye"></i>
                                    </button>
                                </Link>
                            </td>
                            <td class="flex gap-2">
                                <Link
                                    :href="
                                        route('admin.category.edit', {
                                            category: category.id,
                                        })
                                    "
                                >
                                    <button class="btn btn-primary">
                                        Edit
                                    </button></Link
                                >
                                <button
                                    class="btn btn-warning"
                                    @click="deleteCategory(category.id)"
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
    categories: Object,
});

const swal = inject("$swal");
const deleteCategory = (id) => {
    router.visit(route("admin.category.destroy", id), {
        method: "delete",
        onSuccess: () => {
            swal({
                icon: "success",
                title: "Category Deleted",
                text: "Category Deleted Successfully",
            });
        },
    });
};
</script>
