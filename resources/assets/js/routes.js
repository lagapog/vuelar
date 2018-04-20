import Home from './components/pages/Home.vue'
import User from './components/pages/User.vue'
import Trip from './components/pages/Trip.vue'

const routes = [
  { path: '/', component: Home, name: 'home' },
  { path: '/trips/:trip', component: Trip, name: 'trip' },
  { path: '/:username', component: User, name: 'user' }
]

export default routes