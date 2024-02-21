<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
</script>
<script>
import { Link, router } from "@inertiajs/vue3";
export default {
    props: {
        posts: Object,
    },
    components: {
        Link,
    },
    data() {
        const destroy = (id) => {
            if (
                confirm(
                    "Are you sure you want to delete this post ? This action cannot be reversed"
                )
            ) {
                router.delete(route("post.delete", id), {
                    preserveScroll: true,
                });
            }
        };

        return { destroy };
    },
};
</script>

<template>
    <AppLayout title="Dashboard">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Olá {{ $page.props.user.name }} confira a Listagem de Posts
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div
                    class="bg-white overflow-hidden flex flex-col gap-4 shadow-xl sm:rounded-lg p-4"
                >
                    <Link :href="route('create')">
                        <button
                            class="bg-green-600 p-4 w-32 rounded-md hover:opacity-75"
                            type="submit"
                        >
                            <span class="text-white"> Novo post </span>
                        </button>
                    </Link>
                    <div v-if="$page.props.flash.message">
                        <span class="text-blue-600 font-medium">
                            {{ $page.props.flash.message }}
                        </span>
                    </div>
                    <table class="table-auto w-full border-gray-700 border">
                        <thead class="border border-gray-700">
                            <tr class="divide-x divide-gray-700">
                                <th>Id</th>
                                <th>Titulo</th>
                                <th>Conteúdo</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody
                            class="border border-gray-700 divide-y divide-gray-700"
                        >
                            <tr
                                v-for="post in posts"
                                :key="post.id"
                                class="divide-x divide-gray-700"
                            >
                                <td align="center">
                                    {{ post.id }}
                                </td>
                                <td align="center">{{ post.title }}</td>
                                <td align="left" class="p-4">
                                    <p class="text-ellipsis overflow-hidden">
                                        {{ post.content }}
                                    </p>
                                </td>
                                <td>
                                    <Link
                                        class="p-2 bg-blue-600 rounded-md"
                                        :href="route('edit-post', post.id)"
                                    >
                                        <span class="text-sm text-white">
                                            Edit
                                        </span>
                                    </Link>
                                </td>
                                <td>
                                    <button
                                        @click="destroy(post.id)"
                                        class="p-2 bg-red-600 rounded-md"
                                        :href="route('edit-post', post.id)"
                                    >
                                        <span class="text-sm text-white">
                                            Delete
                                        </span>
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
