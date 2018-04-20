import { comments } from '../../api'

const state = {
  comments: [],
}
const getters = {
  commentsLength(state) {
    return state.comments.length
  },
  emptyComments(state, getters) {
    return getters.commentsLength == 0
  }
}
const actions = {
  fetchComments({ commit }, trip) {
    return axios.get(comments.getAll(trip))
      .then(response => {
        commit('loadComments', response.data)
      })
      .catch()
  }
}
const mutations = {
  loadComments (state, comments) {
    state.comments = comments
  }
}

export default {
  state,
  getters,
  actions,
  mutations
}