import { trips } from '../../api'

const state = {
  trip: {},
  trips: [],
  tripsAreLoading: false,
}
const getters = {
  ownerTrip() {
    if(state.trip.user) return state.trip.user.username
  },
  tripsLength(state) {
    return state.trips.length
  },
  emptyTrips(state, getters) {
    return getters.tripsLength == 0
  }
}
const actions = {
  fetchTripById({ commit }, trip) {
    return axios.get(trips.findById(trip))
      .then(response => {
        commit('loadTripById', response.data)
      })
      .catch()
  },
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
  loadTripById(state, trip){
    state.trip = trip
  },
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