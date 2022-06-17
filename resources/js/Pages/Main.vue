<script setup>
import { Head, Link } from '@inertiajs/inertia-vue3';
import Gallery from "@/Pages/Gallery";

defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    laravelVersion: String,
    phpVersion: String,
})
</script>

<template>
    <Head title="VueGallery" />

    <div class="">
        <div class="bg-gray-800 flex justify-between p-4 items-center">
            <Link href="/" class="text-white font-bold text-2xl">VueGallery</Link>
            <div v-if="canLogin" class="">
                <Link v-if="$page.props.auth.user" :href="route('dashboard')" class="text-sm text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md font-bold">
                    Dashboard
                </Link>

                <template v-else>
                    <Link :href="route('login')" class="text-sm text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md font-bold">
                        Log in
                    </Link>

                    <Link v-if="canRegister" :href="route('register')" class="text-sm text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md font-bold">
                        Register
                    </Link>
                </template>
            </div>
        </div>

        <Gallery />
    </div>
</template>
