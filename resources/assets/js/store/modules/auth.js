import { auth } from '../../api'

const state = {
  authView: 'vu-about',
  messageError: '',
  logging: false,
  requestData: {},
  token: window.localStorage.getItem('token'),
  user: JSON.parse(window.localStorage.getItem('user'))
}
const getters = {
  check(state) {
    return !! state.token && !! state.user
  }
}
const actions = {
  register({commit, state, dispatch}, data) {
    commit('beforeLogin')
    commit('loginRequestData', data)
    return axios.post(auth.register(), state.requestData)
      .then(({data}) => {
        dispatch('login', state.requestData)
      })
      .catch(({response}) => {             
        commit('afterLogin')
        commit('showMessageError', response.data.message)
      })
  },
  login({ commit, state }, data) {
    commit('beforeLogin')
    commit('loginRequestData', data)
    return axios.post(auth.login(), state.requestData)
      .then(({data}) => {
        commit('setToken', data.token)
        commit('setUser', data.user)
        axios.defaults.headers.common['Authorization'] = 'Bearer ' + data.token
        commit('afterLogin')
      })
      .catch(({response}) => {             
        commit('afterLogin')
        commit('showMessageError', response.data.message)
      })
  },
  logout({commit, state}) {
    return axios.post(auth.logout())
      .then(({data}) => {
        commit('eraseToken')
        commit('eraseUser')
      })
      .catch()
  },
  checkUnique({commit}, requestData){
    return axios.post(auth.checkUnique(), requestData)
      .then(({data}) => {
        commit('showMessageError', data.message)
      })
  }
}
const mutations = {
  switchAuthView(state, view) {
    state.messageError = ''
    state.authView = `vu-${view}`
  },
  beforeLogin(state) {
    state.logging = true
    state.messageError = ''
  },
  afterLogin(state) {
    state.logging = false
    state.requestData = {}
  },
  showMessageError(state, error) {
    state.messageError = error
  },
  loginRequestData(state, data) {
    state.requestData = data
  },
  setToken(state, token) {
    state.token = token
    window.localStorage.setItem('token', token)
  },
  eraseToken(state) {
    state.token = null
    window.localStorage.removeItem('token')
  },
  setUser(state, user) {
    state.user = user
    window.localStorage.setItem('user', JSON.stringify(user))
  },
  eraseUser(state) {
    state.user = null
    window.localStorage.removeItem('user')
  }
}

export default {
  state,
  getters,
  actions,
  mutations
}