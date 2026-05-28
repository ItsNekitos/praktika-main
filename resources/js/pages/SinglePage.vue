<template>
    <!-- Main -->
    <div id="main" v-if="recipe">
        <!-- Post -->
        <article class="post">
            <header>
                <div class="title">
                    <h2>
                        <a href="#">{{ recipe.name }}</a>
                    </h2>
                    <p>{{ recipe.difficulty }}</p>
                </div>
            </header>
            <span class="image featured"><img :src="PUBLIC + recipe.photo" alt="" /></span>
            <p>
                {{ recipe.cooktime }}
            </p>
            <p>
                {{ recipe.description }}
            </p>
            <footer>
                <ul class="stats">
                    <li v-if="isAdmin"><a href="#" @click.prevent="changePage('PostAdd', post.id)">Edit</a></li>
                    <li v-if="isAdmin"><a href="#" class="red">Delete</a></li>
                    <li v-if="isAdmin"><a href="#" class="red">Blocked</a></li>
                </ul>
            </footer>
        </article>


    </div>
</template>
<script>
export default {
    name: 'SinglePage',
    props: ['pageId', 'server', 'PUBLIC', 'changePage', 'isUser'],
    data() {
        return {
            recipe: null,
            errors: {},
            isAdmin: false,
        };
    },
    mounted() {
        this.recipeUser();
    },
    methods: {
        recipeUser() {
            this.server('recipe/' + this.pageId)
                .then((result) => {
                    this.recipe = result.recipe;
                    this.isAdmin = result.isAdmin;
                })
                .catch((error) => console.log('error', error));
        },
    },
};
</script>
