import Vue from "vue"
import Router from "vue-router"

import Home from "./components/Home.vue"
import Login from "./components/Login.vue"
import storeData from "./store"

Vue.use(Router)

export const routes = [{
        path: "/login",
        component: Login,
        name: "login"
    },
    {
        path: "/home",
        component: Home,
        name: "home",
        meta : {
            needAuth : true
        }
    }
]

const router = new Router({
    mode: 'history',
    routes
})

// TODO: 控制Router是否需要登入驗證用
router.beforeEach((to,from,next) => {
    if(to.matched.some(record => record.meta.needAuth)){
        if(storeData.getters.isLoggedIn){
            next()
            return 
        }
        next('/login')
    }else{
        next()
    }
})

export default router
