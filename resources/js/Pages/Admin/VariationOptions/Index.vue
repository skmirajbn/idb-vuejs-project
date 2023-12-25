<template>
    <AdminLayout>
        <div class="w-full p-4 space-y-4 bg-gray-200 rounded-xl">
            <div class="flex justify-between">
                <h3 class="text-2xl font-bold">
                    <i class="fa-solid fa-building-circle-arrow-right"></i> All
                    Variation Options
                </h3>
                <Link :href="route('admin.variationOption.create')">
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
                            <th>Variation</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="text-lg">
                        <tr v-for="variationOption in variationOptions">
                            <th>{{ variationOption.id }}</th>
                            <td class="font-bold">
                                {{ variationOption.value }}
                            </td>
                            <td class="font-bold">
                                {{ variationOption.variation.name }}
                            </td>
                            <td class="flex gap-2">
                                <Link
                                    :href="
                                        route('admin.variationOption.edit', {
                                            variation_option:
                                                variationOption.id,
                                        })
                                    "
                                >
                                    <button class="btn btn-primary">
                                        Edit
                                    </button></Link
                                >
                                <button
                                    class="btn btn-warning"
                                    @click="
                                        deleteVariationOption(
                                            variationOption.id
                                        )
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
    variationOptions: Object,
});
const swal = inject("$swal");
const deleteVariationOption = (id) => {
    router.visit(route("admin.variationOption.destroy", id), {
        method: "delete",
        onSuccess: () => {
            swal({
                icon: "success",
                title: "District Deleted",
                text: "District Deleted Successfully",
            });
        },
    });
};
</script>
