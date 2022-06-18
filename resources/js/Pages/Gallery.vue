<template>
    <div class="grid place-content-center mt-8">
        <div
            v-if="photos.length === 0"
            class="text-center bg-gray-100 px-48 py-24 rounded-lg border border-gray-200 border-dashed border-4"
        >
            <h2>Sorry, no images to show.</h2>
        </div>
    </div>
</template>

<script setup>
const props = defineProps({
    photos: Array,
});
</script>
