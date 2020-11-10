<template>
<div>
    <form @submit.prevent="login" class="form">
        <h1>登入</h1>
        <div class="form-group">
            <label>Email</label>
            <input type="text" class="form-control" v-model="email">
        </div>
        <div class="form-group">
            <label>Password</label>
            <input type="password" class="form-control" v-model="password">
        </div>
        <div class="form-group">
            <button type="submit">登入</button>
        </div>
    </form>
</div>
</template>

<script>
export default {
    data() {
        return {
            email: '',
            password: ''
        }
    },
    methods: {
        login() {
            let email = this.email;
            let password = this.password;
            this.$store.dispatch('login', {
                    email: this.email,
                    password: this.password
                }).then(() => this.$router.push('/'))
                .catch(err => console.log(err))
        },
    },
}
</script>
