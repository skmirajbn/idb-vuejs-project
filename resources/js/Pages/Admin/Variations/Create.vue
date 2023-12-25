<template>
    <AdminLayout>
        <div class="w-full p-4 space-y-4 bg-gray-200 rounded-xl">
            <div class="flex justify-between">
                <h3 class="text-2xl font-bold">
                    <i class="fa-solid fa-building-circle-arrow-right"></i> Add
                    Variation
                </h3>
                <Link :href="route('admin.variation.index')"
                    ><button class="btn btn-primary">
                        All Variations
                    </button></Link
                >
            </div>
            <div class="py-10">
                <form
                    class="flex flex-col gap-4"
                    @submit.prevent="handleSubmit"
                >
                    <div class="flex flex-col gap-2">
                        <label class="text-xl font-bold" for="name"
                            >Category</label
                        >
                        <select
                            v-model="form.category_id"
                            class="rounded-lg"
                            name=""
                            id=""
                        >
                            <option value="">Select Category</option>
                            <option
                                v-for="category in categories"
                                :value="category.id"
                            >
                                {{ category.name }}
                            </option>
                        </select>
                        <InputError
                            class="mt-2"
                            :message="form.errors.category_id"
                        />
                    </div>
                    <div class="flex flex-col gap-2">
                        <label class="text-xl font-bold" for="name">Name</label>
                        <input
                            class="rounded-lg"
                            id="name"
                            type="text"
                            v-model="form.name"
                        />
                        <InputError class="mt-2" :message="form.errors.name" />
                    </div>

                    <button type="submit" class="btn btn-primary">
                        Add Variation
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

defineProps({
    categories: Object,
    default: "",
});

const swal = inject("$swal");

const form = useForm({
    name: "",
    category_id: null,
    remember: false,
});
const handleSubmit = () => {
    console.log(form);
    form.post(route("admin.variation.store"), {
        preserveState: true,
        onFinish: () => form.reset(),
        onSuccess: (data) => {
            form.reset();
            swal({
                icon: "success",
                title: "Variation Added",
                text: data.props.message,
            });
        },
        onError: (err) => {
            console.log(err);
            swal({
                icon: "error",
                title: "Oops...",
                text: err.variation,
            });
        },
    });
};
</script>
