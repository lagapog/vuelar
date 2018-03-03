import { users } from '../../api'

const state = {
  users: [],
  loggedUser: {},
  user: {},
  userIsFollow: '',
  userIsFollower: ''
}
const getters = {
  numberOfFollowers(state) {
    if(state.user.followers) return state.user.followers.length
  },
  numberOfFollows(state) {
    if(state.user.follows) return state.user.follows.length
  },
  usersLength(state) {
    return state.users.length
  },
  userHasTrips(state) {
    if(state.user.trips) return state.user.trips.length > 0
  },
  itIsMe(state) {
    return state.user.id == state.loggedUser.id
  },
  userIndexOfMyFollows(state) {
    if(!state.user || !state.loggedUser.follows) return
    return state.loggedUser.follows.findIndex(function(follow) {
      return follow.id == state.user.id
    })
  },
  userIndexOfMyFollowers(state) {
    if(!state.user || !state.loggedUser.followers) return
    return state.loggedUser.followers.findIndex(function(follower) {
      return follower.id == state.user.id
    })
  },
  myIndexOfYourFollows(state) {
    if(!state.loggedUser || !state.user.follows) return
    return state.user.follows.findIndex(function(follow) {
      return follow.id == state.loggedUser.id
    })
  },
  myIndexOfYourFollowers(state) {
    if(!state.loggedUser || !state.user.followers) return
    return state.user.followers.findIndex(function(follower) {
      return follower.id == state.loggedUser.id
    })
  }
}
const actions = {
  fetchUsers({ commit }) {
    return axios.get(users.getAll())
      .then(response => commit('loadUsers', response.data))
      .catch()
  },
  fetchUserByUsername({ commit }, username) {
    return axios.get(users.findByUsername(username))
      .then(response => {
        commit('loadUserByUsername', response.data)
        commit('setUserIsFollow', response.data.isFollow)
      })
      .catch()
  },
  fetchLoggedUser({ commit }) {
    return axios.get(users.getLoggedUser())
      .then(response => commit('loadLoggedUser', response.data))
      .catch()
  },
  followUser({commit}, username) {
    commit('followUser')
    return axios.post(users.followUser(username)).then().catch
  },
  unfollowUser({commit, getters}, username) {
    commit('unfollowUser', getters)
    return axios.post(users.unfollowUser(username)).then().catch
  }
}
const mutations = {
  loadUsers (state, users) {
    state.users = users
  },
  loadUserByUsername (state, user) {
    state.user = user
  },
  loadLoggedUser (state, loggedUser) {
    state.loggedUser = loggedUser
  },
  setUserIsFollow (state, boo) {
    state.userIsFollow = boo
  },
  followUser (state) {
    state.user.followers.push(state.loggedUser)
    state.loggedUser.follows.push(state.user)
    state.userIsFollow = true
  },
  unfollowUser (state, {myIndexOfYourFollowers, userIndexOfMyFollows}) {
    state.user.followers.splice(myIndexOfYourFollowers, 1)
    state.loggedUser.follows.splice(userIndexOfMyFollows, 1)
    state.userIsFollow = false
  }
}

export default {
  state,
  getters,
  actions,
  mutations
}