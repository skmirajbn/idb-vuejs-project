<template>
    <AdminLayout>
        <div class="w-full p-4 space-y-4 bg-gray-200 rounded-xl">
            <div class="flex justify-between">
                <h3 class="text-2xl font-bold">
                    <i class="fa-solid fa-table-list"></i> Update Category
                </h3>
                <Link :href="route('admin.category.index')"
                    ><button class="btn btn-primary">
                        All Categories
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
                            >Parent Category</label
                        >
                        <select
                            class="rounded-lg"
                            v-model="form.parent_category_id"
                        >
                            <option value="">Select Parent Category</option>
                            <option :value="null">No Parent</option>
                            <option
                                :value="category.id"
                                v-for="category in categories"
                            >
                                {{ category.name }}
                            </option>
                        </select>
                        <InputError
                            class="mt-2"
                            :message="form.errors.parent_category_id"
                        />
                    </div>
                    <div class="flex flex-col gap-2">
                        <label class="text-xl font-bold" for="name"
                            >Category Name</label
                        >
                        <input
                            class="rounded-lg"
                            id="name"
                            type="text"
                            v-model="form.category"
                            placeholder="Enter Category Name"
                        />
                        <InputError
                            class="mt-2"
                            :message="form.errors.category"
                        />
                    </div>
                    <div class="flex flex-col gap-2">
                        <label class="text-xl font-bold" for="name"
                            >Category Image</label
                        >
                        <div class="flex flex-col gap-2">
                            <input
                                id="name"
                                type="file"
                                @input="handleImageInput"
                            />
                            <!-- Category image show -->
                            <img
                                class="w-20 h-20"
                                ref="imageSrc"
                                src="https://cdn3.iconfinder.com/data/icons/design-n-code/100/272127c4-8d19-4bd3-bd22-2b75ce94ccb4-512.png"
                                alt=""
                            />
                        </div>
                        <InputError class="mt-2" :message="form.errors.image" />
                    </div>
                    <div class="flex flex-col gap-2">
                        <label class="text-xl font-bold" for="name"
                            >Description</label
                        >
                        <textarea
                            class="rounded-lg"
                            v-model="form.description"
                        ></textarea>
                        <InputError
                            class="mt-2"
                            :message="form.errors.description"
                        />
                    </div>

                    <button type="submit" class="btn btn-primary">
                        Update Category
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
import { inject, onMounted, ref } from "vue";

defineProps({
    categories: Object,
    default: "",
});

const swal = inject("$swal");
const imageSrc = ref(null);
const page = usePage();

onMounted(() => {
    imageSrc.value.src =
        route().t.url + "/storage/images/" + page.props.category.image;
});
const form = useForm({
    category: page.props.category.name,
    parent_category_id: page.props.category.parent_category_id,
    image: null,
    description: page.props.category.description,
    remember: true,
    _method: "PUT",
});

const handleImageInput = (event) => {
    const file = event.target.files[0];
    // update the form
    form.image = file || null;

    // Show the image
    if (file) {
        let reader = new FileReader();
        reader.onload = (event) => {
            // update the image view
            imageSrc.value.src = event.target.result;
        };
        reader.readAsDataURL(event.target.files[0]);
    }
};
const id = page.props.category.id;
const handleSubmit = () => {
    form.post(route("admin.category.update", id), {
        preserveState: true,
        onSuccess: (data) => {
            swal({
                icon: "success",
                title: "Category Updateed",
                text: data.props.message,
            });
            router.replace(route("admin.category.edit", id));
        },
        onError: (err) => {
            const errorMessage =
                err.category ||
                err.delivery_charge ||
                err.image ||
                err.description;
            swal({
                icon: "error",
                title: "Oops...",
                text: errorMessage,
            });
            // router.replace(route("admin.category.edit", id));
        },
    });
    console.log(form);
};
</script>
