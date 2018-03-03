<template>
  <div class="container">
    <div class="row justify-content-center">
      <form class="col-12 col-md-10 col-xl-8" action="/trips">
        <div class="input-group">
            <div class="input-group-prepend">
                <button class="btn btn-outline-primary" type="submit">Search</button>
            </div>
            <input name="query" type="text" class="form-control" placeholder="An awesome trip" aria-label="Search" aria-describedby="basic-addon2">
        </div>
      </form>
    </div>
    <vu-loading-trip v-if="tripsAreLoading" />
    <vu-trips-grid v-else />
  </div>
</template>
<script>
  import vuLoadingTrip from '../Trips/LoadingTrip.vue'
  import vuTripsGrid from '../Trips/TripsGrid.vue'
  import { mapState, mapActions, mapGetters } from 'vuex'

  export default {
    components: { vuLoadingTrip, vuTripsGrid },
    computed: {
      ...mapState('trips', ['trips', 'tripsAreLoading']),
      ...mapGetters('trips', ['emptyTrips'])
    },
    methods: {
      ...mapActions('trips', ['fetchTrips']),
      ...mapActions('users', ['fetchLoggedUser'])
    },
    mounted() {
      this.fetchTrips()
      this.fetchLoggedUser()
    }
  }
</script>
