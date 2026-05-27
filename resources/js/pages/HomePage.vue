<template>
    <!-- Main -->
    <div id="main">
        <div class="sidediv"></div>
        <div id="mainblock">
            <section id="sidebar">
                <!-- Intro -->
                <section id="intro">
                    <header>
                        <p>Фильтрация</p>
                    </header>
                </section>
            </section>
            <!-- Post -->
            <div id="recipeslist">
                <template v-for="recipe in recipes">
                    <PostComponent :recipe="recipe" :changePage="changePage" :PUBLIC="PUBLIC" :likeArray="likeArray" />
                </template>
            </div>

            <!-- Pagination -->
            <!-- <ul class="actions pagination">
            <li>
                <a
                    href="#"
                    @click.prevent="recipesHome(recipes.current_page - 1)"
                    :class="{ disabled: recipes.current_page == 1 }"
                    class="button big previous"
                    >Previous Page</a
                >
            </li>
            <li>
                <a
                    href="#"
                    @click.prevent="recipesHome(recipes.current_page + 1)"
                    :class="{ disabled: recipes.current_page == recipes.last_page }"
                    class="button big next"
                    >Next Page</a
                >
            </li>
        </ul> -->
        </div>
        <div class="sidediv"></div>
    </div>
</template>
<script>
import PostComponent from '@/components/PostComponent.vue';
import SidebarComponent from '@/components/SidebarComponent.vue';

export default {
    name: 'HomePage',
    props: ['server', 'changePage', 'PUBLIC', 'user'],
    components: {
        PostComponent,
        SidebarComponent,
    },
    data() {
        return {
            recipes: [],
        };
    },
    mounted() {
        this.recipesHome();
    },
    methods: {
        recipesHome() {
            this.server('recipesHome', 'GET', null, this.user.id)
                .then((result) => {
                    this.recipes = result.recipes;
                })
                .catch((error) => console.log('error', error));
        },
    },
};
</script>
