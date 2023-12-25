<template>
    <div
        class="flex flex-col w-full max-w-md gap-2 p-2 mx-auto bg-emerald-950 rounded-2xl"
    >
        <Disclosure v-slot="{ open }">
            <DisclosureButton
                class="flex justify-between w-full px-4 py-2 text-sm font-medium text-left text-blue-900 bg-blue-100 rounded-lg hover:bg-blue-200 focus:outline-none focus-visible:ring focus-visible:ring-blue-500/75"
            >
                <span class="text-xl"
                    ><i class="fa-solid fa-user"></i> Users</span
                >
                <ChevronUpIcon
                    :class="open ? 'rotate-180 transform' : ''"
                    class="w-5 h-5 text-blue-500"
                />
            </DisclosureButton>
            <DisclosurePanel class="px-4 pt-4 pb-2 text-white">
                <div class="flex flex-col gap-3">
                    <Link :href="route('admin.user.index')" class=""
                        ><i class="mr-2 fa-solid fa-users"></i> All Users
                    </Link>
                    <Link :href="route('admin.user.create')" class=""
                        ><i class="mr-2 fa-solid fa-user-plus"></i>
                        Add User
                    </Link>
                    <Link class=""
                        ><i class="mr-2 fa-solid fa-trash"></i>
                        Trash
                    </Link>
                </div>
            </DisclosurePanel>
        </Disclosure>
        <Disclosure v-slot="{ open }">
            <DisclosureButton
                class="flex justify-between w-full px-4 py-2 text-sm font-medium text-left text-blue-900 bg-blue-100 rounded-lg hover:bg-blue-200 focus:outline-none focus-visible:ring focus-visible:ring-blue-500/75"
            >
                <span class="text-xl"
                    ><i class="fa-solid fa-building-circle-arrow-right"></i>
                    Districts</span
                >
                <ChevronUpIcon
                    :class="open ? 'rotate-180 transform' : ''"
                    class="w-5 h-5 text-blue-500"
                />
            </DisclosureButton>
            <DisclosurePanel class="px-4 pt-4 pb-2 text-white">
                <div class="flex flex-col gap-3">
                    <Link :href="route('admin.district.index')" class=""
                        ><i
                            class="pr-2 fa-solid fa-building-circle-arrow-right"
                        ></i>
                        All Districts
                    </Link>
                    <Link :href="route('admin.district.create')" class=""
                        ><i
                            class="pr-2 fa-solid fa-building-circle-arrow-right"
                        ></i>
                        Add District
                    </Link>
                    <Link class=""
                        ><i class="mr-2 fa-solid fa-trash"></i>
                        Trash
                    </Link>
                </div>
            </DisclosurePanel>
        </Disclosure>
        <Disclosure v-slot="{ open }">
            <DisclosureButton
                class="flex justify-between w-full px-4 py-2 text-sm font-medium text-left text-blue-900 bg-blue-100 rounded-lg hover:bg-blue-200 focus:outline-none focus-visible:ring focus-visible:ring-blue-500/75"
            >
                <span class="text-xl"
                    ><i class="fa-solid fa-tent-arrow-down-to-line"></i>
                    Thanas</span
                >
                <ChevronUpIcon
                    :class="open ? 'rotate-180 transform' : ''"
                    class="w-5 h-5 text-blue-500"
                />
            </DisclosureButton>
            <DisclosurePanel class="px-4 pt-4 pb-2 text-white">
                <div class="flex flex-col gap-3">
                    <Link :href="route('admin.thana.index')" class=""
                        ><i
                            class="pr-2 fa-solid fa-tent-arrow-down-to-line"
                        ></i>
                        All Thanas
                    </Link>
                    <Link :href="route('admin.thana.create')" class=""
                        ><i
                            class="pr-2 fa-solid fa-tent-arrow-down-to-line"
                        ></i>
                        Add Thana
                    </Link>
                    <Link class=""
                        ><i class="pr-2 fa-solid fa-trash"></i>
                        Trash
                    </Link>
                </div>
            </DisclosurePanel>
        </Disclosure>
        <Disclosure v-slot="{ open }">
            <DisclosureButton
                class="flex justify-between w-full px-4 py-2 text-sm font-medium text-left text-blue-900 bg-blue-100 rounded-lg hover:bg-blue-200 focus:outline-none focus-visible:ring focus-visible:ring-blue-500/75"
            >
                <span class="text-xl"
                    ><i class="fa-solid fa-table-list"></i> Categories</span
                >
                <ChevronUpIcon
                    :class="open ? 'rotate-180 transform' : ''"
                    class="w-5 h-5 text-blue-500"
                />
            </DisclosureButton>
            <DisclosurePanel class="px-4 pt-4 pb-2 text-white">
                <div class="flex flex-col gap-3">
                    <Link :href="route('admin.category.index')" class=""
                        ><i class="pr-2 fa-solid fa-table-list"></i> All
                        Categories
                    </Link>
                    <Link :href="route('admin.category.create')" class=""
                        ><i class="pr-2 fa-solid fa-table-list"></i>
                        Add Category
                    </Link>
                    <Link class=""
                        ><i class="mr-2 fa-solid fa-trash"></i>
                        Trash
                    </Link>
                </div>
            </DisclosurePanel>
        </Disclosure>
        <Disclosure v-slot="{ open }">
            <DisclosureButton
                class="flex justify-between w-full px-4 py-2 text-sm font-medium text-left text-blue-900 bg-blue-100 rounded-lg hover:bg-blue-200 focus:outline-none focus-visible:ring focus-visible:ring-blue-500/75"
            >
                <span class="text-xl"
                    ><i class="fa-solid fa-truck-fast"></i> Shipping
                    Methods</span
                >
                <ChevronUpIcon
                    :class="open ? 'rotate-180 transform' : ''"
                    class="w-5 h-5 text-blue-500"
                />
            </DisclosureButton>
            <DisclosurePanel class="px-4 pt-4 pb-2 text-white">
                <div class="flex flex-col gap-3">
                    <Link :href="route('admin.shipping-method.index')" class=""
                        ><i class="pr-2 fa-solid fa-truck-fast"></i> All
                        Shipping Methods
                    </Link>
                    <Link :href="route('admin.shipping-method.create')" class=""
                        ><i class="pr-2 fa-solid fa-truck-fast"></i>
                        Add Shipping Method
                    </Link>
                    <Link class=""
                        ><i class="mr-2 fa-solid fa-trash"></i>
                        Trash
                    </Link>
                </div>
            </DisclosurePanel>
        </Disclosure>
        <Disclosure v-slot="{ open }">
            <DisclosureButton
                class="flex justify-between w-full px-4 py-2 text-sm font-medium text-left text-blue-900 bg-blue-100 rounded-lg hover:bg-blue-200 focus:outline-none focus-visible:ring focus-visible:ring-blue-500/75"
            >
                <span class="text-xl"
                    ><i class="fa-solid fa-user"></i> Users</span
                >
                <ChevronUpIcon
                    :class="open ? 'rotate-180 transform' : ''"
                    class="w-5 h-5 text-blue-500"
                />
            </DisclosureButton>
            <DisclosurePanel class="px-4 pt-4 pb-2 text-white">
                <div class="flex flex-col gap-3">
                    <Link class=""
                        ><i class="mr-2 fa-solid fa-users"></i> All Users
                    </Link>
                    <Link class=""
                        ><i class="mr-2 fa-solid fa-user-plus"></i>
                        Add User
                    </Link>
                    <Link class=""
                        ><i class="mr-2 fa-solid fa-trash"></i>
                        Trash
                    </Link>
                </div>
            </DisclosurePanel>
        </Disclosure>
    </div>
</template>

<script setup>
import { Disclosure, DisclosureButton, DisclosurePanel } from "@headlessui/vue";
import { Link } from "@inertiajs/vue3";
</script>
