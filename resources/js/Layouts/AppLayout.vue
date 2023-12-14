<template>
    <div class="min-h-screen">
        <header class="bg-emerald-500">
            <div class="container flex items-center py-2 mx-auto">
                <div class="w-1/6 text-2xl">
                    <Link href="/login">Logo</Link>
                </div>
                <div class="flex items-center w-4/6 gap-3">
                    <Link href="/">
                        <button class="btn btn-primary btn-sm">Home</button>
                    </Link>
                    <Link href="/about">
                        <button class="btn btn-primary btn-sm">About</button>
                    </Link>
                    <Link href="/">
                        <button class="btn btn-primary btn-sm">Home</button>
                    </Link>
                    <a href="https://laravelvueidb.skmiraj.online">
                        <button class="btn btn-primary btn-sm">
                            Live Link
                        </button>
                    </a>
                </div>
                <div class="flex items-center justify-end w-1/6 gap-3">
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
                            <li><a>Profile</a></li>
                            <li><a>Logout</a></li>
                        </ul>
                    </details>
                </div>
            </div>
        </header>
        <div class="container py-6 mx-auto"><slot /></div>
        <footer class="p-10 footer bg-base-200 text-base-content">
            <nav>
                <header class="footer-title">Services</header>
                <a class="link link-hover">Branding</a>
                <a class="link link-hover">Design</a>
                <a class="link link-hover">Marketing</a>
                <a class="link link-hover">Advertisement</a>
            </nav>
            <nav>
                <header class="footer-title">Company</header>
                <a class="link link-hover">About us</a>
                <a class="link link-hover">Contact</a>
                <a class="link link-hover">Jobs</a>
                <a class="link link-hover">Press kit</a>
            </nav>
            <nav>
                <header class="footer-title">Legal</header>
                <a class="link link-hover">Terms of use</a>
                <a class="link link-hover">Privacy policy</a>
                <a class="link link-hover">Cookie policy</a>
            </nav>
            <form>
                <header class="footer-title">Newsletter</header>
                <fieldset class="form-control w-80">
                    <label class="label">
                        <span class="label-text">Enter your email address</span>
                    </label>
                    <div class="join">
                        <input
                            type="text"
                            placeholder="username@site.com"
                            class="input input-bordered join-item"
                        />
                        <button class="btn btn-primary join-item">
                            Subscribe
                        </button>
                    </div>
                </fieldset>
            </form>
        </footer>
    </div>
</template>

<script setup>
import { Link } from "@inertiajs/vue3";
</script>

<style lang="scss" scoped></style>
