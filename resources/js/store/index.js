import Vue from 'vue'
import Vuex from 'vuex'
import count from './module/count'
import config from './module/config'

Vue.use(Vuex)

const storeData = new Vuex.Store({
    modules:{
        count,
        config
    }
})

export default storeData