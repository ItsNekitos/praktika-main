<template>
    <header id="header">
        <h1><a href="#" @click.prevent="changePage('HomePage')">CookHelper</a></h1>
        <nav class="main">
            <input type="search" placeholder="Поиск рецептов..." />
            <div v-if="isUser" class="dropdown">
                <button class="dropbtn">Меню</button>
                <div class="dropdown-content">
                    <a v-if="user.role == 'admin'" href="#" @click.prevent="changePage('AdminPage')">Панель</a>
                    <a v-else href="#" @click.prevent="changePage('UserPage')">Профиль</a>
                    <a href="#" @click.prevent="logout()">Выйти</a>
                </div>
            </div>
            <div class="dropdown" v-else>
                <button class="dropbtn" @click.prevent="changePage('AuthPage')">Войти</button>
            </div>
        </nav>
    </header>
</template>

<script>
export default {
    name: 'HeaderComponent',
    props: ['isUser', 'user', 'changePage', 'PUBLIC', 'logout'],
};
</script>
