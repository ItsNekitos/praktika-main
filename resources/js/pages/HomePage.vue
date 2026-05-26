<template>
    <!-- Main -->
    <div id="main">
        <!-- Post -->
        <template v-for="recipe in recipes.data">
            <PostComponent :recipe="recipe" :changePage="changePage" :PUBLIC="PUBLIC" :likeArray="likeArray" />
        </template>

        <!-- Pagination -->
        <!-- <ul class="actions pagination">
            <li>
                <a
                    href="#"
                    @click.prevent="postsHome(posts.current_page - 1)"
                    :class="{ disabled: posts.current_page == 1 }"
                    class="button big previous"
                    >Previous Page</a
                >
            </li>
            <li>
                <a
                    href="#"
                    @click.prevent="postsHome(posts.current_page + 1)"
                    :class="{ disabled: posts.current_page == posts.last_page }"
                    class="button big next"
                    >Next Page</a
                >
            </li>
        </ul> -->
    </div>

    <section id="sidebar">
        <!-- Intro -->
        <section id="intro">
            <header>
                <p>Фильтрация</p>
            </header>
        </section>
    </section>
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
        recipesHome(page = 1) {
            this.server('recipesHome/?page=' + page, 'GET', null, this.user.id)
                .then((result) => {
                    this.recipes = result.recipes;
                })
                .catch((error) => console.log('error', error));
        },
    },
};
</script>
