<template>
    <AdminLayout>
        <div class="w-full p-4 space-y-4 bg-gray-200 rounded-xl">
            <div class="flex justify-between">
                <h3 class="text-2xl font-bold">
                    <i class="fa-solid fa-building-circle-arrow-right"></i> All
                    Users
                </h3>
                <Link :href="route('admin.user.create')">
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
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Avatar</th>
                            <th>Role</th>

                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="text-lg">
                        <tr v-for="user in users">
                            <th>{{ user.id }}</th>
                            <td class="font-bold">{{ user.name }}</td>
                            <td class="font-bold">{{ user.email }}</td>
                            <td class="font-bold">{{ user.phone }}</td>
                            <td class="font-bold">{{ user.phone }}</td>
                            <td class="font-bold">{{ user.role.name }}</td>
                            <td class="flex gap-2">
                                <Link
                                    :href="
                                        route('admin.user.edit', {
                                            user: user.id,
                                        })
                                    "
                                >
                                    <button class="btn btn-primary">
                                        Edit
                                    </button></Link
                                >
                                <button
                                    class="btn btn-warning"
                                    @click="deleteUser(user.id)"
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
    users: Object,
});
const swal = inject("$swal");
const deleteUser = (id) => {
    router.visit(route("admin.user.destroy", id), {
        method: "delete",
        onSuccess: () => {
            swal({
                icon: "success",
                title: "User Deleted",
                text: "User Deleted Successfully",
            });
        },
    });
};
</script>
