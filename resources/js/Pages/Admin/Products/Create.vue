<template>
    <AdminLayout>
        <div class="w-full p-4 space-y-4 bg-gray-200 rounded-xl">
            <div class="flex justify-between">
                <h3 class="text-2xl font-bold">
                    <i class="fa-solid fa-building-circle-arrow-right"></i> Add
                    Product
                </h3>
                <Link :href="route('admin.product.index')"
                    ><button class="btn btn-primary">All Products</button></Link
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
                            v-model="form.name"
                        />
                        <InputError class="mt-2" :message="form.errors.name" />
                    </div>
                    <div class="flex flex-col gap-2">
                        <label class="text-xl font-bold" for="name"
                            >Description</label
                        >
                        <input
                            class="rounded-lg"
                            id="name"
                            type="text"
                            v-model="form.description"
                        />
                        <InputError
                            class="mt-2"
                            :message="form.errors.description"
                        />
                    </div>
                    <div class="flex flex-col gap-2">
                        <label class="text-xl font-bold" for="name"
                            >Category</label
                        >
                        <select
                            class="rounded-lg"
                            name=""
                            id=""
                            v-model="form.category_id"
                        >
                            <option value=""></option>
                            <option
                                :value="category.id"
                                v-for="category in categories"
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
                        <label class="text-xl font-bold" for="name"
                            >Price</label
                        >
                        <input
                            class="rounded-lg"
                            id="name"
                            type="text"
                            v-model="form.price"
                        />
                        <InputError class="mt-2" :message="form.errors.price" />
                    </div>

                    <div class="flex flex-col gap-2">
                        <label class="text-xl font-bold" for="name"
                            >Image</label
                        >
                        <input
                            class=""
                            id="name"
                            type="file"
                            @input="handlePhotoChange"
                        />
                        <InputError class="mt-2" :message="form.errors.image" />
                    </div>
                    <img
                        class="w-40 h-40"
                        ref="imageSrc"
                        src="https://media.istockphoto.com/id/1409329028/vector/no-picture-available-placeholder-thumbnail-icon-illustration-design.jpg?s=612x612&w=0&k=20&c=_zOuJu755g2eEUioiOUdz_mHKJQJn-tDgIAhQzyeKUQ="
                        alt=""
                    />

                    <button type="submit" class="btn btn-primary">
                        Add Product
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
import { inject, ref } from "vue";

const swal = inject("$swal");
const imageSrc = ref(null);

defineProps({
    categories: Object,
    default: "",
});

const form = useForm({
    name: "",
    description: "",
    category_id: "",
    image: "",
    price: "",
    status: 1,
    stock: "",

    remember: false,
});

const handlePhotoChange = (e) => {
    const file = e.target.files[0];
    form.image = file;

    // Show the image
    if (file) {
        const reader = new FileReader();
        reader.onload = (event) => {
            imageSrc.value.src = event.target.result;
        };
        reader.readAsDataURL(file);
    }
};
const handleSubmit = () => {
    console.log(form);
    form.post(route("admin.product.store"), {
        preserveState: true,

        onSuccess: (data) => {
            form.reset();
            swal({
                icon: "success",
                title: "Product Added",
                text: data.props.message,
            });
        },
        onError: (err) => {
            console.log(err);
            swal({
                icon: "error",
                title: "Oops...",
                text: err.product,
            });
        },
    });
};
</script>
