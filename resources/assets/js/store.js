
import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

window.store = new Vuex.Store({
    state: {
        user: null
    },
    mutations: {
        userLogin(state, user) {
            state.user = user
        }
    }
})
