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
      const data = {
        name: 'password',
        client_id: '1',
        client_secret: 'M1OykEwmtm9feaYJcPzpQSpgrjNWe5ZVmuk9d0h4',
        username: 'agapo@123.com',
        password: 'agapo',
        scope: ''
      }
      return axios.get('http://localhost:8000/api/user', data)
        .then(response => commit('fetchUser', response.data))
        .catch();
    }
  }
})

export default store