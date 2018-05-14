import Home from './components/pages/Home.vue'
import User from './components/pages/User.vue'
import Trip from './components/pages/Trip.vue'
import CreateTrip from './components/pages/CreateTrip.vue'

const routes = [
  { path: '/', component: Home, name: 'home' },
  { path: '/trips/create', component: CreateTrip, name: 'createTrip', meta: { middlewareAuth: true } },
  { path: '/trips/:trip', component: Trip, name: 'trip', meta: { middlewareAuth: true } },
  { path: '/:username', component: User, name: 'user', meta: { middlewareAuth: true } }
]

export default routes