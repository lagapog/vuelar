import Home from './components/pages/Home.vue'
import User from './components/pages/User.vue'

const routes = [
  { path: '/', component: Home, name: 'home' },
  { path: '/:username', component: User, name: 'user' }
]

export default routes