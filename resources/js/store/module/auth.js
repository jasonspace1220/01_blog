import Axios from "axios";

const state = {
    status : '',
    token : localStorage.getItem('token') || '',
    user : {}
}

const mutations = {
    auth_request(state){
        state.status = 'loading'
    },
    auth_success(state,token,user){
        state.status = 'success'
        state.token = token
        state.user = user
    },
    auth_error(state){
        state.status = 'error'
    },
    logout(state){
        state.status = ''
        state.token = ''
    }
}

const actions = {
    login({commit} , user) {
        return new Promise((resolve,reject) => {
            commit('auth_request')
            Axios({
                url : 'http://localhost/blog/public/api/login',
                data : user ,
                method : 'POST'
            }).then(resp => {
                const token = resp.data.token
                const user = resp.data.user
                localStorage.setItem('token',token)
                Axios.defaults.headers.common['Authorization'] = token
                commit('auth_success',token,user)
                resolve(resp)
            }).catch(err => {
                commit('auth_error')
                localStorage.removeItem('token')
                reject(err)
            })
        })
    },
    logout({commit}){
        return new Promise( (resolve,reject) => {
            commit('logout')
            localStorage.removeItem('token')
            delete Axios.defaults.headers.common['Authorization']
            resolve()
        }) 
    },
}

const getters = {
    isLoggedIn : state => !!state.token,
    authStatus : state => state.status
}

export default {
    state ,
    mutations,
    actions,
    getters
}