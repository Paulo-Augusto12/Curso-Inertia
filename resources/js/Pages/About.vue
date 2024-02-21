<script>
import { ref } from "vue";
import MenuLayout from "../Layouts/MenuLayout.vue";
export default {
    name: "AboutPage",
    components: {
        MenuLayout,
    },
    setup() {
        const gihtublink = ref("https://github.com/Paulo-Augusto12");
        const covenantlink = ref("https://covenantit.com.br/");
        return { link: gihtublink, covenantlink };
    },
};
</script>
<template>
    <div class="p-10 flex flex-col justify-around min-h-svh">
        <header class="flex flex-col gap-2">
            <h1 class="font-medium">
                Aplicação desenvolvida seguindo o curso
                <span class="font-bold"
                    >Entenda o Inertia e crie com Laravel, Vue uma SPA
                </span>
            </h1>
            <MenuLayout />
        </header>
        <main class="flex flex-col">
            <p>
                Aplicação desenvolvida para aprofundar o conhecimento sobre as
                seguintes tecnologias:
            </p>
        </main>
        <footer class="flex flex-col gap-2">
            <span
                >Curso da Udemy fornecido por
                <a :href="covenantlink" class="text-gray-700 font-bold"
                    >Covenant</a
                >
            </span>
            <span>
                <span
                    >Desenvolvido por
                    <a :href="link" class="text-gray-700 font-bold"
                        >Paulo Augusot Ribeiro</a
                    >
                </span>
            </span>
        </footer>
    </div>
</template>

<style></style>
