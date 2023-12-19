<script setup>
import Header from "@/Components/Header.vue";
import { Disclosure, DisclosureButton, DisclosurePanel } from "@headlessui/vue";
import { ChevronUpIcon } from "@heroicons/vue/20/solid";
import { Link } from "@inertiajs/vue3";
</script>

<template>
    <Header auth="true" />
    <div class="container flex mx-auto">
        <!-- Sidebar -->
        <div class="w-1/4 p-4">
            <div class="w-full px-4">
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
                                <Link class=""
                                    ><i class="mr-2 fa-solid fa-users"></i> All
                                    Users
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
                                    ><i class="mr-2 fa-solid fa-users"></i> All
                                    Users
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
            </div>
        </div>
        <!-- Main Content -->
        <div>
            <slot />
        </div>
    </div>
</template>
