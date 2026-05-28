<template>
    <!-- Main -->
    <div id="main" v-if="recipe">
        <article class="post">
            <header>
                <div class="title">
                    <h2>
                        <a href="#">{{ recipe.name }}</a>
                    </h2>
                    <p v-if="recipe.difficulty == 'Средне'" style="color: white; background-color: rgb(255, 155, 0); width: 25%; border-radius: 5px; display: flex; justify-content: center; margin-top: 5px;">{{ recipe.difficulty }}</p>
                    <p v-if="recipe.difficulty == 'Легко'" style="color: white; background-color: rgb(55, 255, 55); width: 20%; border-radius: 5px; display: flex; justify-content: center;">{{ recipe.difficulty }}</p>
                    <p v-if="recipe.difficulty == 'Сложно'" style="color: white; background-color: rgb(255, 55, 55); width: 25%; border-radius: 5px; display: flex; justify-content: center;">{{ recipe.difficulty }}</p>
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



        <div id="steps">
            
        </div>


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
