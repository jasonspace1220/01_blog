<template>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    {{ baseUrl }}
                </div>
                <div class="card-body">
                    <h2>count: <span class="count">{{ handleCount }}</span></h2>
                    <button @click="inc">+</button>
                    <button @click="dec">-</button>
                    <button @click="getAllState">getAllState</button>
                </div>
            </div>
        </div>
    </div>
</div>
</template>

<script>
export default {
    data() {
        return {}
    },
    methods: {
        inc() {
            this.$store.commit('inc', 1)
        },
        dec() {
            this.$store.commit('dec', 1)
        },
        getAllState() {
            // this.$store.dispatch('getAllState')
        }
    },
    computed: {
        handleCount() {
            return this.$store.state.count.count
        },
        baseUrl() {
            return this.$store.state
        }
    },
    mounted() {
        console.log('mounted')
    }

}
</script>
