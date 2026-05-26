<template>
    <p class="authtext">Регистрация</p>
    <input type="text" placeholder="Email" v-model="email" /><br />
    <p class="red" v-if="errors.email">
        {{ errors.email.join('. ') }}
    </p>
    <input type="password" placeholder="Password" v-model="password" /><br />
    <p class="red" v-if="errors.password">
        {{ errors.password.join('. ') }}
    </p>
    <input type="file" id="avatar" /><br /><br />
    <p class="red" v-if="errors.avatar">
        {{ errors.avatar.join('. ') }}
    </p>
    <button type="button" @click="register" class="authbutton">Регистрация</button>
</template>
<script>
export default {
    name: 'RegisterComponent',
    props: ['server', 'successUser', 'changePage'],
    data() {
        return {
            name: null,
            email: null,
            password: null,
            errors: {},
        };
    },
    methods: {
        register() {
            let formdata = new FormData();
            if (this.email) formdata.append('email', this.email);
            if (this.password) formdata.append('password', this.password);
            let avatar = document.querySelector('#avatar');
            if (avatar.files[0]) {
                formdata.append('avatar', avatar.files[0]);
            }
            this.server('register', 'POST', formdata)
                .then((result) => {
                    if (result.errors) {
                        this.errors = result.errors;
                    }
                    if (result.token) {
                        this.changePage('HomePage');
                        this.successUser(result.token);
                    }
                })
                .catch((error) => console.log('error', error));
        },
    },
};
</script>
