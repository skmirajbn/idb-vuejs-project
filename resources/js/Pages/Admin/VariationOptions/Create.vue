<template>
    <AdminLayout>
        <div class="w-full p-4 space-y-4 bg-gray-200 rounded-xl">
            <div class="flex justify-between">
                <h3 class="text-2xl font-bold">
                    <i class="fa-solid fa-building-circle-arrow-right"></i> Add
                    Variation Option
                </h3>
                <Link :href="route('admin.variationOption.index')"
                    ><button class="btn btn-primary">
                        All Variation Options
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
                            >Variations</label
                        >
                        <select
                            class="rounded-lg"
                            name=""
                            id=""
                            v-model="form.variation_id"
                        >
                            <option value="">Select Variation</option>
                            <option
                                :value="variation.id"
                                v-for="variation in variations"
                            >
                                {{ variation.name }}
                            </option>
                        </select>
                        <InputError class="mt-2" :message="form.errors.value" />
                    </div>
                    <div class="flex flex-col gap-2">
                        <label class="text-xl font-bold" for="name">Name</label>
                        <input
                            class="rounded-lg"
                            id="name"
                            type="text"
                            v-model="form.value"
                        />
                        <InputError class="mt-2" :message="form.errors.value" />
                    </div>

                    <button type="submit" class="btn btn-primary">
                        Add Variation Option
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
    variations: Object,
});

const swal = inject("$swal");

const form = useForm({
    value: "",
    variation_id: "",
    remember: false,
});
const handleSubmit = () => {
    console.log(form);
    form.post(route("admin.variationOption.store"), {
        preserveState: true,
        onFinish: () => form.reset(),
        onSuccess: (data) => {
            form.reset();
            swal({
                icon: "success",
                title: "Variation Option Added",
                text: data.props.message,
            });
        },
        onError: (err) => {
            console.log(err);
            swal({
                icon: "error",
                title: "Oops...",
                text: err.value,
            });
        },
    });
};
</script>
