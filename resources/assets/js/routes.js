import Home from './components/pages/Home.vue'
import User from './components/pages/User.vue'
import Trip from './components/pages/Trip.vue'
import CreateTrip from './components/pages/CreateTrip.vue'

const routes = [
  { path: '/', component: Home, name: 'home' },
  { path: '/trips/create', component: CreateTrip, name: 'createTrip' },
  { path: '/trips/:trip', component: Trip, name: 'trip' },
  { path: '/:username', component: User, name: 'user' }
]

export default routes