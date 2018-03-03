<template>
    <button 
      class="btn btn-outline-secondary" 
      @click="clickOnUnfollow"
      style="width: 6rem">Unfollow</button>
</template>
<script>
  import { mapActions } from 'vuex'

  export default {
    name: 'vuUnfollowButton',
    methods: {
      ...mapActions('users', ['unfollowUser']),
      clickOnUnfollow() {
        const username = this.$route.params.username
        this.unfollowUser(username)
      }
    }
  }
</script>
