<template>
  <button 
    class="btn btn-outline-primary"
    @click="clickOnFollow"
    style="width: 6rem">Follow</button>
</template>
<script>
  import { mapActions } from 'vuex'

  export default {
    name: 'vuFollowButton',
    methods: {
      ...mapActions('users', ['followUser']),
      clickOnFollow() {
        const username = this.$route.params.username
        this.followUser(username)
      }
    }
  }
</script>
