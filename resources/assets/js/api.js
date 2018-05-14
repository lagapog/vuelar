const baseUrl = 'http://localhost:8000'

const trips = {
  getAll() {
    return `${baseUrl}/api/trips`
  },
  findById(trip) {
    return `${baseUrl}/api/trips/${trip}`
  },
  search(query) {
    return `${baseUrl}/api/trips/search/${query}`
  }
}
const comments = {
  getAll(trip) {
    return `${baseUrl}/api/comments/${trip}`
  }
}
const users = {
  logout() {
    return `${baseUrl}/api/logout`
  },
  getLoggedUser() {
    return `${baseUrl}/api/me`
  },
  getAll() {
    return `${baseUrl}/api/users`
  },
  findByUsername(username) {
    return `${baseUrl}/api/users/${username}`
  },
  followUser(username) {
    return `${baseUrl}/api/users/${username}/follow`
  },
  unfollowUser(username) {
    return `${baseUrl}/api/users/${username}/unfollow`
  }
}
const authentication = {
  login() {
    return `${baseUrl}/api/login`
  },
  register() {
    return `${baseUrl}/api/register`
  },
  logout() {
    return `${baseUrl}/api/logout`
  }
}

export {
  trips,
  comments,
  users,
  authentication
}