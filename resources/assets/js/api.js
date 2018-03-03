const baseUrl = 'http://localhost:8000'

const trips = {
  getAll() {
    return `${baseUrl}/api/trips`
  }
}
const users = {
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

export {
  trips,
  users
}