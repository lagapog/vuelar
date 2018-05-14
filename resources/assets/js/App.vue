<template>
  <div id="app-container">
    <auth v-if="!authenticated && !user" />
    <div v-else>
      <vu-header/>
      <router-view/>
    </div>
  </div>
</template>
<script>
import vuHeader from './components/layout/Header.vue'
import Auth from './components/Auth/Auth.vue'

export default {
  name: 'app',
  data() {
    return {
      authenticated: auth.check(),
      user: auth.user
    }
  },
  components: { vuHeader, Auth },
  beforeCreate() {
    auth.BearerAuth()
  },
  created() {
    if(!this.authenticated && !this.user)
      console.log(this.$router)
  },
  mounted() {
    Event.$on('userLoggedIn', () => {
        this.authenticated = true
        this.user = auth.user
    })
    Event.$on('userLoggedOut', () => {
        this.authenticated = false;
        this.user = auth.user;
    })
  }
}
</script>
