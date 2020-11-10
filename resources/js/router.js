import Vue from "vue"
import Router from "vue-router"

import Home from "./components/Home.vue"

Vue.use(Router)

export const routes = [
    {
        path : "/home",
        component : Home,
        name : "home"
    }
]

const router = new Router({
    mode : 'history',
    routes
})

export default router