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
                            v-model="form.product.name"
                        />
                        <InputError
                            class="mt-2"
                            :message="form.errors['product.name']"
                        />
                    </div>
                    <div class="flex flex-col gap-2">
                        <label class="text-xl font-bold" for="name"
                            >Description</label
                        >
                        <input
                            class="rounded-lg"
                            id="name"
                            type="text"
                            v-model="form.product.description"
                        />
                        <InputError
                            class="mt-2"
                            :message="form.errors['product.description']"
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
                            v-model="form.product.category_id"
                            @change="handleCategoryChange"
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
                            :message="form.errors['product.category_id']"
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
                            v-model="form.product.price"
                        />
                        <InputError
                            class="mt-2"
                            :message="form.errors['product.price']"
                        />
                    </div>
                    <div v-if="!hasVariation" class="flex flex-col gap-2">
                        <label class="text-xl font-bold" for="name"
                            >Stock</label
                        >
                        <input
                            class="rounded-lg"
                            id="name"
                            type="text"
                            v-model="form.product.stock"
                        />
                        <InputError
                            class="mt-2"
                            :message="form.errors['product.stock']"
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
                            @input="handleProductImage"
                        />

                        <InputError
                            class="mt-2"
                            :message="form.errors['product.image']"
                        />
                    </div>
                    <img
                        class="w-40 h-40"
                        ref="productImage"
                        src="https://media.istockphoto.com/id/1409329028/vector/no-picture-available-placeholder-thumbnail-icon-illustration-design.jpg?s=612x612&w=0&k=20&c=_zOuJu755g2eEUioiOUdz_mHKJQJn-tDgIAhQzyeKUQ="
                        alt=""
                    />

                    <!-- Variatoins Section -->
                    <div v-if="form.hasVariation" class="space-y-4">
                        <h3 class="text-xl font-bold">
                            Product Item Variations
                        </h3>
                        <div class="flex flex-col gap-4 rounded-lg">
                            <div
                                class="flex flex-col gap-2 p-6 bg-gray-400 rounded-lg"
                                v-for="(productItem, index) in form.product
                                    .productItems"
                            >
                                <div class="flex flex-col gap-2">
                                    <label class="text-xl font-bold" for="name"
                                        >Product Item Image</label
                                    >
                                    <input
                                        class="rounded-lg"
                                        id="name"
                                        type="file"
                                        @input="
                                            (e) =>
                                                handleVariationProductImage(
                                                    e,
                                                    index
                                                )
                                        "
                                    />
                                    <InputError
                                        class="mt-2"
                                        :message="
                                            form.errors[
                                                `product.productItems.${index}.image`
                                            ]
                                        "
                                    />
                                    <img
                                        :ref="
                                            (e) => (productItemImage[index] = e)
                                        "
                                        class="object-cover w-40 h-40"
                                        src="https://media.istockphoto.com/id/1409329028/vector/no-picture-available-placeholder-thumbnail-icon-illustration-design.jpg?s=612x612&w=0&k=20&c=_zOuJu755g2eEUioiOUdz_mHKJQJn-tDgIAhQzyeKUQ="
                                        alt=""
                                    />
                                </div>
                                <div class="flex flex-col gap-2">
                                    <label class="text-xl font-bold" for="name"
                                        >Stock</label
                                    >
                                    <input
                                        class="rounded-lg"
                                        id="name"
                                        type="text"
                                        v-model="
                                            form.product.productItems[index]
                                                .stock
                                        "
                                    />
                                    <InputError
                                        class="mt-2"
                                        :message="
                                            form.errors[
                                                `product.productItems.${index}.stock`
                                            ]
                                        "
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
                                        v-model="
                                            form.product.productItems[index]
                                                .price
                                        "
                                    />
                                    <InputError
                                        class="mt-2"
                                        :message="
                                            form.errors[
                                                `product.productItems.${index}.price`
                                            ]
                                        "
                                    />
                                </div>
                                <div class="flex flex-col gap-2">
                                    <div
                                        class="flex flex-col gap-2"
                                        v-for="(
                                            variation, Configindex
                                        ) in selectedCategory.variations"
                                    >
                                        <label for="" class="text-xl font-bold"
                                            >{{ variation.name }}
                                        </label>
                                        <select
                                            class="w-full rounded-lg"
                                            v-model="
                                                form.product.productItems[index]
                                                    .productConfigurations[
                                                    Configindex
                                                ].variation_option_id
                                            "
                                        >
                                            <option value="">
                                                Select {{ variation.name }}
                                            </option>
                                            <option
                                                v-for="option in variation.variation_options"
                                                :value="option.id"
                                            >
                                                {{ option.value }}
                                            </option>
                                        </select>

                                        <InputError
                                            class="mt-2"
                                            :message="
                                                form.errors[
                                                    `product.productItems.${index}.productConfigurations.${Configindex}.variation_option_id`
                                                ]
                                            "
                                        />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div
                        v-if="form.hasVariation"
                        class="ml-auto btn btn-info w-fit"
                        @click="addProductItem"
                    >
                        +
                    </div>

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
import { Link, useForm, usePage } from "@inertiajs/vue3";
import { inject, ref } from "vue";

const swal = inject("$swal");
const page = usePage();

const productImage = ref(null);
const productItemImage = ref([]);

// Define props
defineProps({
    categories: Object,
    default: "",
});

let selectedCategory = ref({});
const form = useForm({
    hasVariation: false,
    product: {
        name: "",
        description: "",
        category_id: "",
        image: "",
        price: "",
        stock: "",
        status: 1,
        productItems: [],
    },
    remember: false,
});

// Event handlers

/**
 * Handles the change of the category.
 *
 * @return {void} This function does not return anything.
 */
const handleCategoryChange = () => {
    let categories = page.props.categories;
    let selectectCategoryId = form.product.category_id;
    selectedCategory = categories.find(
        (category) => category.id == selectectCategoryId
    );
    addProductItem();
    console.log(form);
};

/**
 * Generates a product item and adds it to the form's `product.productItems` array.
 *
 * @return {void} This function does not return anything.
 */
const addProductItem = () => {
    // build product configuration
    if (selectedCategory.variations.length > 0) {
        form.hasVariation = true;

        let productConfigurations = selectedCategory.variations.map(
            (variation) => {
                return {
                    prodcut_item_id: "",
                    variation_id: variation.id,
                    variation_option_id: "",
                };
            }
        );
        // Add one Product Items
        form.product.productItems.push({
            product_id: "",
            image: "",
            stock: "",
            price: "",
            productConfigurations,
        });
    } else {
        form.hasVariation = false;
    }
};

/**
 * Handles the change event when a photo is selected.
 *
 * @param {Event} e - The change event object.
 * @return {void} This function does not return anything.
 */
const handleProductImage = (e) => {
    const file = e.target.files[0];
    form.product.image = file;

    console.log(file);

    // Show the image
    if (file) {
        const reader = new FileReader();
        reader.onload = (event) => {
            productImage.value.src = event.target.result;
        };
        reader.readAsDataURL(file);
    }
};

const handleVariationProductImage = (e, index) => {
    const file = e.target.files[0];
    form.product.productItems[index].image = file;
    // Show the image
    if (file) {
        const reader = new FileReader();
        reader.onload = (event) => {
            productItemImage.value[index].src = event.target.result;
        };
        reader.readAsDataURL(file);
    }
};

/**
 * Handles the form submission.
 *
 * @return {void}
 */
const handleSubmit = () => {
    // console the form
    console.log(form);

    // submit form
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
