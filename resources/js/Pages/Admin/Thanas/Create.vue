<template>
    <AdminLayout>
        <div class="w-full p-4 space-y-4 bg-gray-200 rounded-xl">
            <div class="flex justify-between">
                <h3 class="text-2xl font-bold">
                    <i class="fa-solid fa-tent-arrow-down-to-line"></i> Add
                    Thana
                </h3>
                <Link :href="route('admin.thana.index')"
                    ><button class="btn btn-primary">All Thanas</button></Link
                >
            </div>
            <div class="py-10">
                <form
                    class="flex flex-col gap-4"
                    @submit.prevent="handleSubmit"
                >
                    <div class="flex flex-col gap-2">
                        <label class="text-xl font-bold" for="name"
                            >Select District</label
                        >
                        <select
                            class="rounded-lg"
                            name=""
                            id=""
                            v-model="form.district_id"
                        >
                            <option value="">Select District</option>
                            <option
                                v-for="district in districts"
                                :value="district.id"
                            >
                                {{ district.name }}
                            </option>
                        </select>
                        <InputError
                            class="mt-2"
                            :message="form.errors.district_id"
                        />
                    </div>
                    <div class="flex flex-col gap-2">
                        <label class="text-xl font-bold" for="name">Name</label>
                        <input
                            class="rounded-lg"
                            id="name"
                            type="text"
                            v-model="form.thana"
                            placeholder="Enter Thana Name"
                        />
                        <InputError class="mt-2" :message="form.errors.thana" />
                    </div>
                    <div class="flex flex-col gap-2">
                        <label class="text-xl font-bold" for="name"
                            >Delivery Charge (Tk.)</label
                        >
                        <input
                            class="rounded-lg"
                            id="name"
                            type="text"
                            v-model="form.delivery_charge"
                            placeholder="Enter Delivery Charge"
                        />
                        <InputError
                            class="mt-2"
                            :message="form.errors.delivery_charge"
                        />
                    </div>

                    <button type="submit" class="btn btn-primary">
                        Add Thana
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
    districts: Object,
    default: "",
});

const swal = inject("$swal");

const form = useForm({
    thana: "",
    district_id: "",
    delivery_charge: "",
    remember: true,
});

const handleSubmit = () => {
    console.log(form);
    form.post(route("admin.thana.store"), {
        preserveState: true,
        onSuccess: (data) => {
            form.reset();
            swal({
                icon: "success",
                title: "Thana Added",
                text: data.props.message,
            });
        },
        onError: (err) => {
            swal({
                icon: "error",
                title: "Oops...",
                text: err.thana
                    ? err.thana
                    : err.district_id
                    ? err.district_id
                    : err.delivery_charge
                    ? err.delivery_charge
                    : "",
            });
        },
    });
};
</script>
