<template>
    <div class="text-white bg-blue-800">Social</div>
    <header class="sticky top-0 z-20 bg-emerald-500">
        <div class="container flex items-center py-2 mx-auto">
            <div class="flex w-1/6 gap-3 text-2xl">
                <Link href="/login">Logo</Link>
                <label class="swap swap-rotate">
                    <!-- this hidden checkbox controls the state -->
                    <input type="checkbox" class="hidden" />

                    <!-- sun icon -->
                    <svg
                        class="fill-current w-7 h-7 swap-on"
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 24 24"
                    >
                        <path
                            d="M5.64,17l-.71.71a1,1,0,0,0,0,1.41,1,1,0,0,0,1.41,0l.71-.71A1,1,0,0,0,5.64,17ZM5,12a1,1,0,0,0-1-1H3a1,1,0,0,0,0,2H4A1,1,0,0,0,5,12Zm7-7a1,1,0,0,0,1-1V3a1,1,0,0,0-2,0V4A1,1,0,0,0,12,5ZM5.64,7.05a1,1,0,0,0,.7.29,1,1,0,0,0,.71-.29,1,1,0,0,0,0-1.41l-.71-.71A1,1,0,0,0,4.93,6.34Zm12,.29a1,1,0,0,0,.7-.29l.71-.71a1,1,0,1,0-1.41-1.41L17,5.64a1,1,0,0,0,0,1.41A1,1,0,0,0,17.66,7.34ZM21,11H20a1,1,0,0,0,0,2h1a1,1,0,0,0,0-2Zm-9,8a1,1,0,0,0-1,1v1a1,1,0,0,0,2,0V20A1,1,0,0,0,12,19ZM18.36,17A1,1,0,0,0,17,18.36l.71.71a1,1,0,0,0,1.41,0,1,1,0,0,0,0-1.41ZM12,6.5A5.5,5.5,0,1,0,17.5,12,5.51,5.51,0,0,0,12,6.5Zm0,9A3.5,3.5,0,1,1,15.5,12,3.5,3.5,0,0,1,12,15.5Z"
                        />
                    </svg>

                    <!-- moon icon -->
                    <svg
                        class="fill-current w-7 h-7 swap-off"
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 24 24"
                    >
                        <path
                            d="M21.64,13a1,1,0,0,0-1.05-.14,8.05,8.05,0,0,1-3.37.73A8.15,8.15,0,0,1,9.08,5.49a8.59,8.59,0,0,1,.25-2A1,1,0,0,0,8,2.36,10.14,10.14,0,1,0,22,14.05,1,1,0,0,0,21.64,13Zm-9.5,6.69A8.14,8.14,0,0,1,7.08,5.22v.27A10.15,10.15,0,0,0,17.22,15.63a9.79,9.79,0,0,0,2.1-.22A8.11,8.11,0,0,1,12.14,19.73Z"
                        />
                    </svg>
                </label>
            </div>
            <div v-if="!auth" class="flex items-center w-3/6 gap-3">
                <Link href="/">
                    <button class="btn btn-primary btn-sm">Home</button>
                </Link>
                <Link href="/about">
                    <button class="btn btn-primary btn-sm">About</button>
                </Link>
                <Link href="/">
                    <button class="btn btn-primary btn-sm">Contact</button>
                </Link>
                <Link href="/">
                    <button class="btn btn-primary btn-sm">Social</button>
                </Link>
                <Link :href="route('register')">
                    <button class="btn btn-primary btn-sm">Register</button>
                </Link>
                <Link :href="route('login')">
                    <button class="btn btn-primary btn-sm">Login</button>
                </Link>
                <a href="https://laravelvueidb.skmiraj.online">
                    <button class="btn btn-primary btn-sm">Live Link</button>
                </a>
            </div>
            <div class="flex items-center w-3/6 gap-3" v-else>
                <Link href="/dashboard">
                    <button class="btn btn-primary btn-sm">Dashboard</button>
                </Link>
                <Link href="/profile">
                    <button class="btn btn-primary btn-sm">Profile</button>
                </Link>
                <Link href="/">
                    <button class="btn btn-primary btn-sm">FrontPage</button>
                </Link>
                <a href="https://laravelvueidb.skmiraj.online">
                    <button class="btn btn-primary btn-sm">Live Link</button>
                </a>
            </div>
            <div class="flex items-center justify-end w-2/6 gap-3">
                <div class="flex items-center gap-3" v-if="user">
                    <div class="avatar">
                        <div class="w-10 rounded-full">
                            <img
                                src="https://daisyui.com/images/stock/photo-1534528741775-53994a69daeb.jpg"
                            />
                        </div>
                    </div>
                    <details class="dropdown">
                        <summary class="btn btn-sm btn-primary">
                            Sk Miraj
                            <i class="fa-solid fa-angle-down"></i>
                        </summary>
                        <ul
                            class="p-2 shadow menu dropdown-content z-[1] bg-base-100 rounded-box w-52"
                        >
                            <li><Link href="/profile">Profile</Link></li>
                            <li><Link href="/dashboard">Dashboard</Link></li>
                            <li>
                                <Link
                                    :href="route('logout')"
                                    method="post"
                                    as="button"
                                    >Logout</Link
                                >
                            </li>
                        </ul>
                    </details>
                </div>
                <div v-else>
                    <Link href="/login">
                        <button class="btn btn-secondary btn-sm">Login</button>
                    </Link>
                </div>
                <Link href="/cart">
                    <div class="flex items-center gap-2">
                        <h3 class="font-bold">Cart</h3>
                        <i
                            class="text-2xl fa-solid fa-cart-shopping text-secondary"
                        ></i>
                    </div>
                </Link>
            </div>
        </div>
    </header>
</template>

<script setup>
import { Link, usePage } from "@inertiajs/vue3";

defineProps({
    auth: Boolean,
});

const user = usePage().props.auth.user;
</script>

<style lang="scss" scoped></style>
