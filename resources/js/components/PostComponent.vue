<template>
    <article class="recipe">
        <header>
            <a href="#" @click.prevent="changePage('SinglePage', recipe.id)" class="image featured"><img width="100%" height="250px" :src="PUBLIC + recipe.photo" alt="" /></a>
            <div class="title" style="padding-left: 10px;">
                <h2>
                    <a href="#" @click.prevent="changePage('SinglePage', recipe.id)">{{ recipe.name }}</a>
                </h2>
                <p v-if="recipe.difficulty == 'Средне'" style="color: white; background-color: rgb(255, 155, 0); width: 25%; border-radius: 5px; display: flex; justify-content: center; margin-top: 5px;">{{ recipe.difficulty }}</p>
                <p v-if="recipe.difficulty == 'Легко'" style="color: white; background-color: rgb(55, 255, 55); width: 20%; border-radius: 5px; display: flex; justify-content: center;">{{ recipe.difficulty }}</p>
                <p v-if="recipe.difficulty == 'Сложно'" style="color: white; background-color: rgb(255, 55, 55); width: 25%; border-radius: 5px; display: flex; justify-content: center;">{{ recipe.difficulty }}</p>
                <p style="font-size: 16px; color: rgb(125, 125, 125); margin-top: 5px;">{{ recipe.cooktime }} мин.</p>
                <p style="margin-bottom: 10px;">{{ recipe.description }}</p>
                <!-- <p>{{ recipe.category.name }}</p> -->
            </div>
        </header>
        <footer style="padding-left: 10px;">
            <a href="#" style="width: 100px; height: 30px; display: flex; align-items: center; justify-content: center; border-radius: 5px;" @click.prevent="changePage('SinglePage', recipe.id)" class="button big">Посмотреть</a>
        </footer>
    </article>
</template>

<script>
export default {
    name: 'PostComponent',
    props: ['recipe', 'changePage', 'PUBLIC'],
};
</script>
