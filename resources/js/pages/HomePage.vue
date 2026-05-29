<template>
    <!-- Main -->
    <div id="main">
        <div class="sidediv"></div>
        <div id="mainblock">
            <div style="display: flex; align-items: center; justify-content: center; margin-bottom: 50px;">
                <h1>Рецепты</h1>
            </div>
            <div id="recipfilt">
                <section id="sidebar">
                    <!-- Intro -->
                    <section id="intro">
                        <header>
                            <h1>Фильтрация</h1>
                        </header>
                        <div>
                            <h4>Категория</h4>
                            <div v-for="category in categories">
                                <a href="#" @click.prevent="catalogFilter(category.id)">{{ category.name }}</a>
                            </div>
                        </div>
                        <div>
                            <h4>Время</h4>
                        </div>
                        <div>
                            <h4>Сложность</h4>
                        </div>
                    </section>
                </section>
                <div id="recipeslist">
                    <template v-for="recipe in recipes">
                        <PostComponent :recipe="recipe" :changePage="changePage" :PUBLIC="PUBLIC"/>
                    </template>
                </div>
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
            categories: [],
        };
    },
    mounted() {
        this.recipesHome();
    },
    methods: {
        recipesHome() {
            this.server('recipesHome', 'GET', null)
                .then((result) => {
                    this.recipes = result.recipes;
                    console.log(result);
                    this.categories = result.categories;
                })
                .catch((error) => console.log('error', error));
        },
        catalogFilter(id) {
            this.server('catalogFilter/' + id, 'GET', null)
                .then((result) => {
                    this.recipes = result.recipes;
                    this.categories = result.categories;
                })
                .catch((error) => console.log('error', error));
        },
    },
};
</script>
