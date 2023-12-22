<template>
    <AdminLayout>
        <div class="w-full p-4 space-y-4 bg-gray-200 rounded-xl">
            <div class="flex justify-between">
                <h3 class="text-2xl font-bold">
                    <i class="fa-solid fa-tent-arrow-down-to-line"></i> Update
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
                        Update Thana
                    </button>
                </form>
            </div>
        </div>
    </AdminLayout>
</template>

<script setup>
import InputError from "@/Components/InputError.vue";
import AdminLayout from "@/Layouts/AdminLayout.vue";
import { Link, router, useForm, usePage } from "@inertiajs/vue3";
import { inject } from "vue";

defineProps({
    districts: Object,
    thana: Object,
    default: "",
});
const page = usePage();

const swal = inject("$swal");

const form = useForm({
    thana: page.props.thana.name,
    district_id: page.props.thana.district_id,
    delivery_charge: page.props.thana.delivery_charge,
    remember: true,
});

const id = page.props.thana.id;
const handleSubmit = () => {
    form.put(route("admin.thana.update", id), {
        preserveState: true,
        onSuccess: (data) => {
            form.reset();
            console.log(router);
            swal({
                icon: "success",
                title: "Thana Updated",
                text: data.props.message,
            });
            router.replace(route("admin.thana.edit", id));
        },
        onError: (err) => {
            let errorMessage =
                err.thana || err.district_id || err.delivery_charge || "";
            swal({
                icon: "error",
                title: "Oops...",
                text: errorMessage,
            });
            router.replace(route("admin.thana.edit", id));
        },
    });
};
</script>
