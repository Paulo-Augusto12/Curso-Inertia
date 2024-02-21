<script>
import { Link } from "@inertiajs/vue3";
export default {
    name: "MenuLayout",
    components: {
        Link,
    },
};
</script>

<template>
    <div class="flex flex-row gap-2">
        <Link
            :href="route('about')"
            :class="{ 'font-bold text-gray-800': $page.url === '/about' }"
            >Sobre nós</Link
        >
        <hr class="bg-gray-700" />
        <Link
            :href="route('posts')"
            :class="{ 'font-bold': $page.url === '/posts' }"
            >Posts</Link
        >
    </div>
</template>
