<template>
  <div id="app-container">
    <auth v-if="!check" />
    <div v-else>
      <vu-header/>
      <router-view/>
    </div>
  </div>
</template>
<script>
import vuHeader from './components/layout/Header.vue'
import Auth from './components/Auth/Auth.vue'
import { mapGetters } from 'vuex'

export default {
  name: 'app',
  components: { vuHeader, Auth },
  computed: {
    ...mapGetters('auth', ['check']),
  },
  beforeCreate() {
    let token = window.localStorage.getItem('token')
    axios.defaults.headers.common['Authorization'] = 'Bearer ' + token
  }
}
</script>
