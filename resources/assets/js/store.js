
const Vue  = require('vue')
const Vuex = require('vuex')

Vue.use(Vuex)

const store = new Vuex.Store({
    state: {
        user: null
    },
    mutations: {
        userLogin(state, user) {
            state.user = user
        }
    }
})

module.exports = store
