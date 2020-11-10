const state = {
    count : 0
}

const mutations = {
    inc(state,data){
        const oldState = state.count;
        state.count = oldState + data
    },
    dec(state,data){
        const oldState = state.count;
        state.count = oldState - data
    }
}

const actions = {

}

export default {
    state ,
    mutations,
    actions
}