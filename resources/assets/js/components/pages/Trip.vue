<template>
  <div class="container" v-if="!tripIsLoading">
    <div class="row mt-4 justify-content-center align-items-center">
      <div class="col-12 col-md-6 col-xl-5">
        <img class="img-fluid" :src="trip.image" alt="Card image cap">
      </div>
      <div class="col-12 col-md-6 col-xl-7">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">{{ trip.location }}</h5>
            <p class="card-text">{{ trip.content }}</p>
            <p class="card-text">
              Created by
              <router-link :to="`/${ownerTrip}`" class="card-link">{{ ownerTrip }}</router-link>
            </p>
          </div>
        </div>
      </div>
    </div>
    <comments/>
  </div>
</template>
<script>
  import { mapState, mapActions, mapGetters } from 'vuex'

  export default {
    components: {},
    computed: {
      ...mapState('trips', ['trip', 'tripIsLoading']),
      ...mapGetters('trips', ['ownerTrip'])
    },
    data() {
      return {}
    },
    methods: {
      ...mapActions('trips', ['fetchTripById']),
      ...mapActions('users', ['fetchLoggedUser'])
    },
    beforeRouteEnter (to, from, next) {
      next(vm => {
        vm.fetchTripById(to.params.trip)
      })
    },
    beforeRouteUpdate (to, from, next) {
      this.fetchTripById(to.params.trip)
      next()
    },
    mounted() {
      this.fetchLoggedUser()
    }
  }
</script>
<style lang="scss" scoped>
</style>

