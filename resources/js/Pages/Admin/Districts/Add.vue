<template>
    <AdminLayout>
        <div class="w-full p-4 space-y-4 bg-gray-200 rounded-xl">
            <div class="flex justify-between">
                <h3 class="text-2xl font-bold">
                    <i class="fa-solid fa-building-circle-arrow-right"></i> Add
                    District
                </h3>
                <Link :href="route('admin.district.all')"
                    ><button class="btn btn-primary">
                        All Districts
                    </button></Link
                >
            </div>
            <div class="py-10">
                <form
                    class="flex flex-col gap-4"
                    @submit.prevent="handleSubmit"
                >
                    <div class="flex flex-col gap-2">
                        <label class="text-xl font-bold" for="name">Name</label>
                        <input
                            class="rounded-lg"
                            id="name"
                            type="text"
                            v-model="form.district"
                        />
                        <InputError
                            class="mt-2"
                            :message="form.errors.district"
                        />
                    </div>

                    <button type="submit" class="btn btn-primary">
                        Add District
                    </button>
                </form>
            </div>
        </div>
    </AdminLayout>
</template>

<script setup>
import InputError from "@/Components/InputError.vue";
import AdminLayout from "@/Layouts/AdminLayout.vue";
import { Link, useForm } from "@inertiajs/vue3";
import { inject } from "vue";

const swal = inject("$swal");

const form = useForm({
    district: "",
    remember: false,
});
const handleSubmit = () => {
    console.log(form);
    form.post(route("admin.district.store"), {
        preserveState: true,
        onFinish: () => form.reset(),
        onSuccess: (data) => {
            form.reset();
            swal({
                icon: "success",
                title: "District Added",
                text: data.props.message,
            });
        },
        onError: (err) => {
            console.log(err);
            swal({
                icon: "error",
                title: "Oops...",
                text: err.district,
            });
        },
    });
};
</script>
