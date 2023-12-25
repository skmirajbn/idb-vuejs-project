<template>
    <AdminLayout>
        <div class="w-full p-4 space-y-4 bg-gray-200 rounded-xl">
            <div class="flex justify-between">
                <h3 class="text-2xl font-bold">
                    <i class="fa-solid fa-building-circle-arrow-right"></i> Add
                    User
                </h3>
                <Link :href="route('admin.user.index')"
                    ><button class="btn btn-primary">All Users</button></Link
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
                            v-model="form.user"
                        />
                        <InputError class="mt-2" :message="form.errors.user" />
                    </div>
                    <div class="flex flex-col gap-2">
                        <label class="text-xl font-bold" for="name"
                            >Email</label
                        >
                        <input
                            class="rounded-lg"
                            id="email"
                            type="text"
                            v-model="form.email"
                        />
                        <InputError class="mt-2" :message="form.errors.email" />
                    </div>
                    <div class="flex flex-col gap-2">
                        <label class="text-xl font-bold" for="name"
                            >Password</label
                        >
                        <input
                            class="rounded-lg"
                            id="password"
                            type="password"
                            v-model="form.password"
                        />
                        <InputError
                            class="mt-2"
                            :message="form.errors.password"
                        />
                    </div>
                    <div class="flex flex-col gap-2">
                        <label class="text-xl font-bold" for="name"
                            >Avatar</label
                        >
                        <input class="" id="phone" type="file" />
                        <InputError
                            class="mt-2"
                            :message="form.errors.avatar"
                        />
                    </div>
                    <div class="flex flex-col gap-2">
                        <label class="text-xl font-bold" for="name">Role</label>
                        <select class="rounded-lg" name="role_id" id="role_id">
                            <option value="1">Admin</option>
                            <option value="2">Editor</option>
                            <option value="3">Moderator</option>
                            <option value="4">Super Admin</option>
                        </select>
                        <InputError
                            class="mt-2"
                            :message="form.errors.avatar"
                        />
                    </div>

                    <button type="submit" class="btn btn-primary">
                        Add User
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
    user: "",
    remember: false,
});
const handleSubmit = () => {
    console.log(form);
    form.post(route("admin.user.store"), {
        preserveState: true,
        onFinish: () => form.reset(),
        onSuccess: (data) => {
            form.reset();
            swal({
                icon: "success",
                title: "User Added",
                text: data.props.message,
            });
        },
        onError: (err) => {
            console.log(err);
            swal({
                icon: "error",
                title: "Oops...",
                text: err.user,
            });
        },
    });
};
</script>
