<script>
import { Head, Link } from "@inertiajs/vue3";
import MenuLayout from "../Layouts/MenuLayout.vue";
export default {
    name: "HomePage",
    props: {
        posts: Object,
    },
    components: {
        Link,
        MenuLayout,
        Head,
    },
};
</script>

<template>
    <Head> <title>Home</title> </Head>
    <div class="p-10 flex flex-col gap-4">
        <div class="flex flex-row justify-between items-center">
            <h2 class="font-medium">Confira os posts existentes no sistema</h2>
            <MenuLayout />
        </div>
        <table class="table-auto w-full border-gray-700 border">
            <thead class="border border-gray-700">
                <tr class="divide-x divide-gray-700">
                    <th>Id</th>
                    <th>Title</th>
                    <th>Content</th>
                </tr>
            </thead>
            <tbody class="border border-gray-700 divide-y divide-gray-700">
                <tr
                    v-for="post in posts"
                    :key="post.id"
                    class="divide-x divide-gray-700"
                >
                    <td align="center">{{ post.id }}</td>
                    <td align="center">{{ post.title }}</td>
                    <td align="left" class="p-4">
                        <p class="text-ellipsis overflow-hidden">
                            {{ post.content }}
                        </p>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<style lang="scss" scoped></style>
