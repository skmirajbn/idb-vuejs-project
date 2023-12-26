<template>
    <AdminLayout>
        <div class="w-full p-4 space-y-4 bg-gray-200 rounded-xl">
            <div class="flex justify-between">
                <h3 class="text-2xl font-bold">
                    <i class="fa-solid fa-building-circle-arrow-right"></i> Add
                    Product Item
                </h3>
                <Link :href="route('admin.productItem.index')"
                    ><button class="btn btn-primary">
                        All Product Items
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
                            >Product</label
                        >
                        <select
                            class="rounded-lg"
                            name=""
                            id=""
                            v-model="form.product_id"
                            @change="handleProductChange"
                        >
                            <option value="">Select Product</option>
                            <option
                                :value="product.id"
                                v-for="product in products"
                            >
                                {{ product.name }}
                            </option>
                        </select>
                        <InputError
                            class="mt-2"
                            :message="form.errors.product_id"
                        />
                    </div>
                    <div class="flex flex-col gap-2">
                        <label class="text-xl font-bold" for="name"
                            >Product Image</label
                        >
                        <input
                            class=""
                            id="name"
                            type="file"
                            @change="handlePhotoChange"
                        />
                        <InputError class="mt-2" :message="form.errors.image" />
                    </div>
                    <img
                        class="w-40 h-40"
                        ref="imageSrc"
                        src="https://media.istockphoto.com/id/1409329028/vector/no-picture-available-placeholder-thumbnail-icon-illustration-design.jpg?s=612x612&w=0&k=20&c=_zOuJu755g2eEUioiOUdz_mHKJQJn-tDgIAhQzyeKUQ="
                        alt=""
                    />

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
                            >Stock</label
                        >
                        <input
                            class="rounded-lg"
                            id="name"
                            type="text"
                            v-model="form.stock"
                        />
                        <InputError class="mt-2" :message="form.errors.stock" />
                    </div>
                    <div class="flex flex-col gap-2">
                        <label class="text-xl font-bold" for="name"
                            >Variation</label
                        >
                        <select
                            class="rounded-lg"
                            name=""
                            id=""
                            v-model="form.variation_id"
                            @change="handleVariationChange"
                        >
                            <option value="">Select Variation</option>
                            <option
                                :value="variation.id"
                                v-for="variation in variations"
                            >
                                {{ variation.name }}
                            </option>
                        </select>
                        <InputError class="mt-2" :message="form.errors.stock" />
                    </div>
                    <div class="flex flex-col gap-2">
                        <label class="text-xl font-bold" for="name"
                            >Variation Options</label
                        >
                        <select class="rounded-lg" name="" id="">
                            <option value="">Select Variation Options</option>
                            <option
                                :value="variationOption.id"
                                v-for="variationOption in variationOptions"
                            >
                                {{ variationOption.value }}
                            </option>
                        </select>
                        <InputError class="mt-2" :message="form.errors.stock" />
                    </div>

                    <button type="submit" class="btn btn-primary">
                        Add Product Item
                    </button>
                </form>
            </div>
        </div>
    </AdminLayout>
</template>

<script setup>
import InputError from "@/Components/InputError.vue";
import AdminLayout from "@/Layouts/AdminLayout.vue";
import { Link, useForm, usePage } from "@inertiajs/vue3";
import { inject, ref } from "vue";

defineProps({
    products: Object,
});

const page = usePage();

const swal = inject("$swal");

const imageSrc = ref(null);
const variations = ref([]);
const variationOptions = ref([]);

const form = useForm({
    product_id: "",
    image: "",
    stock: "",
    price: "",
    variation_id: "",
    remember: true,
});

const handleVariationChange = (e) => {
    const variationID = e.target.value;
    const variation = variations.value.find((v) => v.id == variationID);
    variationOptions.value = variation.variation_options;
};

const handleProductChange = (e) => {
    const productID = e.target.value;
    const product = page.props.products.find((p) => p.id == productID);
    variations.value = product.category.variations;

    console.log(form);
};

const handlePhotoChange = (e) => {
    const file = e.target.files[0];
    form.image = file;

    // show the image
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
    form.post(route("admin.productItem.store"), {
        preserveState: true,
        onFinish: () => form.reset(),
        onSuccess: (data) => {
            form.reset();
            swal({
                icon: "success",
                title: "Product Item Added",
                text: data.props.message,
            });
        },
        onError: (err) => {
            console.log(err);
            swal({
                icon: "error",
                title: "Oops...",
                text: err.productItem,
            });
        },
    });
};
</script>
