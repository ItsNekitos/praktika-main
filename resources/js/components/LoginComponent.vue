<template>
    <p class="authtext">Вход</p>
    <input type="text" placeholder="Email" v-model="email" /><br />
    <p class="red" v-if="errors.email">
        {{ errors.email.join('. ') }}
    </p>
    <input type="password" placeholder="Password" v-model="password" /><br />
    <p class="red" v-if="errors.password">
        {{ errors.password.join('. ') }}
    </p>
    <button type="submit" @click="login" class="authbutton">Войти</button>
</template>
<script>
export default {
    name: 'LoginComponent',
    props: ['server', 'successUser', 'changePage'],
    data() {
        return {
            email: null,
            password: null,
            errors: {},
        };
    },
    methods: {
        login() {
            let formdata = new FormData();
            if (this.email) formdata.append('email', this.email);
            if (this.password) formdata.append('password', this.password);

            this.server('login', 'POST', formdata)
                .then((result) => {
                    if (result.errors) {
                        this.errors = result.errors;
                    }
                    if (result.token) {
                        this.successUser(result.token);
                        this.changePage('HomePage');
                    }
                })
                .catch((error) => console.log('error', error));
        },
    },
};
</script>
