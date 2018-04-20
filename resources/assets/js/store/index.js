import Vue from 'vue'
import Vuex from 'vuex'
import axios from 'axios'
import tripsModule from './modules/trips'
import usersModule from './modules/users'
import commentsModule from './modules/comments'


Vue.use(Vuex)

const store = new Vuex.Store({
  store: {
    pageIsLoading: false
  },
  mutations: {
    pageLoading(state) {
      state.isLoading = true
    },
    pageLoaded(state) {
      state.isLoading = false
    }
  },
  modules: {
    trips: {
      namespaced: true,
      ...tripsModule
    },
    users: {
      namespaced: true,
      ...usersModule
    },
    comments: {
      namespaced: true,
      ...commentsModule
    }
  }
})

export default store