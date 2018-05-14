
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap')
window.Vue = require('vue')
import auth from './auth.js';
window.auth = auth;
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
import VueRouter from 'vue-router'
import store from './store'
import routes from './routes'

const router = new VueRouter({
  mode: 'history',
  routes,
  scrollBehavior (to, from, savedPosition) {
    return { x: 0, y: 0 }
  }
})
router.beforeEach((to, from, next) => {
  if (to.matched.some(record => record.meta.middlewareAuth)) {                
      if (!auth.check()) {
          next({
              path: '/',
          });
          return;
      }
  }
  next();
})
Vue.use(VueRouter)
window.Event = new Vue;
Vue.component('app', require('./App.vue'))
Vue.component('comments', require('./components/Comments.vue'))
Vue.component('notifications', require('./components/Notifications.vue'))



const app = new Vue({
  el: '#app',
  store,
  router
})
