import { trips } from '../../api'

const state = {
  trips: [],
  tripsAreLoading: false,
}
const getters = {
  tripsLength(state) {
    return state.trips.length
  },
  emptyTrips(state, getters) {
    return getters.tripsLength == 0
  }
}
const actions = {
  fetchTrips({ commit }) {
    commit('tripsLoading')
    return axios.get(trips.getAll())
      .then(response => {
        commit('loadTrips', response.data)
        commit('tripsLoaded')
      })
      .catch()
  }
}
const mutations = {
  loadTrips (state, trips) {
    state.trips = trips
  },
  tripsLoading (state) {
    state.tripsAreLoading = true
  },
  tripsLoaded (state) {
    state.tripsAreLoading = false
  }
}

export default {
  state,
  getters,
  actions,
  mutations
}