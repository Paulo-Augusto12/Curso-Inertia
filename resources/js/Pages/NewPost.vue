<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
</script>

<script>
import { Head, Link, useForm } from "@inertiajs/vue3";
export default {
    props: {
        posts: Object,
        errors: Object,
    },

    components: {
        Link,
        Head,
    },

    data() {
        const form = useForm({
            title: "",
            content: "",
        });

        return {
            form,
        };
    },
};
</script>

<template>
    <Head>
        <title>Novo Post</title>
    </Head>
    <AppLayout title="Dashboard">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                LISTAGEM DE POSTAGENS
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div>
                        <form @submit.prevent="form.post(route('posts.store'))">
                            <div
                                class="shadow sm:rounded-md sm:overflow-hidden"
                            >
                                <div
                                    class="bg-white py-6 px-4 space-y-6 sm:p-6"
                                >
                                    <div class="grid grid-cols-6 gap-6">
                                        <div class="col-span-6 sm:col-span-3">
                                            <label
                                                for="title"
                                                class="block text-sm font-medium text- gray-700"
                                                >Título</label
                                            >
                                            <input
                                                v-model="form.title"
                                                type="text"
                                                name="title"
                                                id="title"
                                                autocomplete="title"
                                                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                            />
                                            <div
                                                vi-if="errors.title"
                                                class="text-red-600"
                                            >
                                                {{ errors.title }}
                                            </div>
                                        </div>
                                        <div class="col-span-6">
                                            <label
                                                for="content"
                                                class="block text-sm font-medium text-gray-700"
                                                >Descrição</label
                                            >
                                            <textarea
                                                v-model="form.content"
                                                id="content"
                                                name="content"
                                                rows="3"
                                                class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md"
                                                placeholder=""
                                            />
                                            <div
                                                vi-if="errors.content"
                                                class="text-red-600"
                                            >
                                                {{ errors.content }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div
                                    class="px-4 py-3 bg-gray-50 text-right sm:px-6"
                                >
                                    <button
                                        type="submit"
                                        class="bg-indigo-600 border border-transparent rounded-md shadow-sm py-2 px-4 inline-flex justify-center text-sm font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                    >
                                        Criar Post
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
