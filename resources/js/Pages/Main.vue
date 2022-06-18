<script setup>
import { Head, Link } from "@inertiajs/inertia-vue3";
import BreezeDropdown from "@/Components/Dropdown.vue";
import BreezeDropdownLink from "@/Components/DropdownLink.vue";
import Gallery from "@/Pages/Gallery";

defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    photos: Array,
});
</script>

<template>
    <Head title="VueGallery" />

    <div class="">
        <div
            class="bg-gray-800 flex justify-between p-4 items-center shadow-sm"
        >
            <Link href="/" class="text-white font-bold text-2xl"
                >VueGallery</Link
            >
            <div v-if="canLogin" class="flex space-x-4 items-center">
                <Link
                    v-if="$page.props.auth.user"
                    :href="route('photos.create')"
                    class="text-sm text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md font-bold"
                >
                    + Add Photo
                </Link>

                <BreezeDropdown
                    v-if="$page.props.auth.user"
                    align="right"
                    width="48"
                >
                    <template #trigger>
                        <span class="inline-flex rounded-md">
                            <button
                                type="button"
                                class="inline-flex items-center bg-gray-900 text-white px-3 py-2 border border-transparent text-sm leading-4 font-bold rounded-md text-gray-500 bg-white hover:text-white focus:outline-none transition ease-in-out duration-150"
                            >
                                {{ $page.props.auth.user.name }}

                                <svg
                                    class="ml-2 -mr-0.5 h-4 w-4"
                                    xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20"
                                    fill="currentColor"
                                >
                                    <path
                                        fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd"
                                    />
                                </svg>
                            </button>
                        </span>
                    </template>

                    <template #content>
                        <BreezeDropdownLink
                            :href="route('logout')"
                            method="post"
                            as="button"
                        >
                            Log Out
                        </BreezeDropdownLink>
                    </template>
                </BreezeDropdown>

                <template v-else>
                    <Link
                        :href="route('login')"
                        class="text-sm text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md font-bold"
                    >
                        Log in
                    </Link>

                    <Link
                        v-if="canRegister"
                        :href="route('register')"
                        class="text-sm text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md font-bold"
                    >
                        Register
                    </Link>
                </template>
            </div>
        </div>

        <Gallery :photos="photos" />
    </div>
</template>
