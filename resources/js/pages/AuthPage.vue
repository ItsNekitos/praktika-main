<template>
    <!-- Main -->
    <div id="main">
        <!-- Post -->
         <div v-if="authtype == 'login'" class="authdiv">
            <LoginComponent :server="server" :successUser="successUser" :changePage="changePage" />
            <a href="#" @click.prevent="this.authtype='register'">Зарегистрироваться</a>
         </div>
         <div v-else class="authdiv">
            <RegisterComponent :server="server" :successUser="successUser" :changePage="changePage" />
            <a href="#" @click.prevent="this.authtype='login'">Вход в аккаунт</a>
         </div>
    </div>
</template>
<script>
import LoginComponent from '@/components/LoginComponent.vue';
import RegisterComponent from '@/components/RegisterComponent.vue';

export default {
    name: 'AuthPage',
    props: ['server', 'changePage', 'PUBLIC', 'user', 'successUser'],
    components: {
        LoginComponent,
        RegisterComponent,
    },
    data() {
        return {
            authtype: 'login',
        };
    },
};
</script>
