<template>
    <AdminLayout>
        <div class="w-full p-4 space-y-4 bg-gray-200 rounded-xl">
            <div class="flex justify-between">
                <h3 class="text-2xl font-bold">
                    <i class="fa-solid fa-tent-arrow-down-to-line"></i> Thana
                    Info
                </h3>
                <Link :href="route('admin.thana.index')">
                    <button class="block btn btn-primary">
                        Show All <i class="fa-solid fa-plus"></i>
                    </button>
                </Link>
            </div>
            <div class="overflow-x-auto">
                <div class="overflow-x-auto">
                    <table class="table text-xl table-zebra w-fit">
                        <tr>
                            <td class="text-white bg-emerald-600">Thana ID</td>
                            <td>{{ thana.id }}</td>
                        </tr>
                        <tr>
                            <td class="text-white bg-emerald-600">
                                Thana Name
                            </td>
                            <td>{{ thana.name }}</td>
                        </tr>

                        <tr>
                            <td class="text-white bg-emerald-600">
                                District ID
                            </td>
                            <td>{{ thana.district.id }}</td>
                        </tr>
                        <tr>
                            <td class="text-white bg-emerald-600">
                                District Name
                            </td>
                            <td>{{ thana.district.name }}</td>
                        </tr>

                        <tr>
                            <td class="text-white bg-emerald-600">
                                Delivery Charge
                            </td>
                            <td>{{ thana.delivery_charge }} Tk.</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </AdminLayout>
</template>

<script setup>
import AdminLayout from "@/Layouts/AdminLayout.vue";
import { Link } from "@inertiajs/vue3";

defineProps({
    thana: Object,
});
</script>
