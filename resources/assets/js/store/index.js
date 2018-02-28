import Vue from 'vue'
import Vuex from 'vuex'
import axios from 'axios'

Vue.use(Vuex)

const store = new Vuex.Store({
  state: {
    user: 'Nada'
  },
  mutations: {
    fetchUser (state, user) {
      state.user = user
    }
  },
  actions: {
    changeUser({ commit }) {
      return axios.get('http://localhost:8000/api/user')
        .then(response => commit('fetchUser', response.data))
        .catch();
    }
  }
})

export default store