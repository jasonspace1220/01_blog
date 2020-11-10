<template>
<div>
    <div id="nav">
        <router-link to="/home">Home</router-link> |
        <router-link to="/login">Login</router-link>
        <span v-if="isLoggedIn">
            | <a @click="logout">Logout</a>
        </span>
        <div>{{isLoggedIn}}</div>
    </div>
    <router-view />

</div>
</template>

<script>
export default {
    computed: {
        isLoggedIn() {
            return this.$store.getters.isLoggedIn
        },
    },
    methods: {
        logout() {
            this.$store.dispatch('logout')
                .then(() => {
                    this.$router.push('/login')
                })
        },
    },
}
</script>
