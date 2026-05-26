<template>
        <article class="post">
            <header>
                <div class="title">
                    <h2><a href="#" @click.prevent="changePage('SinglePage', recipe.id)">{{ recipe.name }}</a></h2>
                    <p>{{ recipe.difficulty }}</p>
                </div>
            </header>
            <a href="#" @click.prevent="changePage('SinglePage', recipe.id)" class="image featured"><img :src="PUBLIC + recipe.photo" alt="" /></a>
            <p>
                {{ recipe.description }}
            </p>
            <footer>
                <ul class="actions">
                    <li><a href="#" @click.prevent="changePage('SinglePage', recipe.id)" class="button big">Continue Reading</a></li>
                </ul>
            </footer>
        </article>
</template>


<script>

export default {
    name: 'PostComponent',
    props: ['post', 'changePage', 'PUBLIC', 'likeArray'],
};
</script>
