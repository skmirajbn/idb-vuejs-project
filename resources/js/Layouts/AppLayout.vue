<template>
    <div class="flex flex-col justify-between min-h-screen">
        <div>
            <Header></Header>
            <div class="container py-6 mx-auto"><slot /></div>
        </div>
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
import Header from "./../Components/Header.vue";
</script>

<style lang="scss" scoped></style>
