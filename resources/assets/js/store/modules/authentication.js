import { authentication } from '../../api'

const state = {
  authView: 'vu-login',
  messageError: '',
  logging: false,
  requestData: {}
}
const getters = {
  
}
const actions = {
  login({ commit, state }, data) {
    commit('beforeLogin')
    commit('loginRequestData', data)
    return axios.post(authentication.login(), state.requestData)
      .then(({data}) => {
        auth.login(data.token, data.user);
        commit('afterLogin')
      })
      .catch(({response}) => {             
        commit('afterLogin')
        commit('showMessageError', response.data.message)
      })
  }
}
const mutations = {
  switchAuthView(state) {
    if(state.authView=='vu-login') 
      state.authView = 'vu-register'
    else
      state.authView = 'vu-login'
  },
  beforeLogin(state) {
    state.logging = true
    state.messageError = ''
  },
  afterLogin(state) {
    state.logging = false
  },
  showMessageError(state, error) {
    state.messageError = error
  },
  loginRequestData(state, data) {
    state.requestData = data
  },
  clearRequestData(state){
    state.requestData = {}
  }
}

export default {
  state,
  getters,
  actions,
  mutations
}