<template>
  <div class="row bg-primary py-4">
    <div class="col-12">
      <h2 class="h2 text-white">{{ user.username }}'s follows</h2>
    </div>
    <div class="col-12" v-if="!user.follows">
      <p>{{ user.username }} doesn't have follows yet</p>
    </div>
    <div v-else class="col-12 col-md-4 col-xl-3 my-2" v-for="follow in user.follows" :key="follow.id">
      <div class="card text-center pt-2">
        <img class="img-fluid rounded-circle mx-auto" width="120" :src="follow.avatar">
        <div class="card-body">
          <h5 class="card-title">{{ follow.username }}</h5>
          <router-link :to="`/${follow.username}`" class="btn btn-outline-primary">
            View Profile
          </router-link>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
  import { mapState } from 'vuex'

  export default {
    name: 'vuFollows',
    computed: {
      ...mapState('users', ['user'])
    }
  }
</script>
