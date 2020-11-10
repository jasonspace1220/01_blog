import Vue from 'vue'
import Vuex from 'vuex'
import count from './module/count'
import config from './module/config'
import auth from './module/auth'

Vue.use(Vuex)

const storeData = new Vuex.Store({
    modules:{
        count,
        config,
        auth
    }
})

export default storeData