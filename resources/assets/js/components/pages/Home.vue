<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-12 col-md-10 col-xl-8">
        <div class="input-group">
            <div class="input-group-prepend">
                <button class="btn btn-outline-primary" type="button" @click="searching">Search</button>
            </div>
            <input v-model="query" type="text" class="form-control" placeholder="An awesome trip" aria-label="Search" aria-describedby="basic-addon2" @keyup.enter="searching">
        </div>
      </div>
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
    data() {
      return {
        query: ''
      }
    },
    components: { vuLoadingTrip, vuTripsGrid },
    computed: {
      ...mapState('trips', ['trips', 'tripsAreLoading']),
      ...mapGetters('trips', ['emptyTrips'])
    },
    methods: {
      ...mapActions('trips', ['fetchTrips', 'searchTrips']),
      ...mapActions('users', ['fetchLoggedUser']),
      searching() {
        this.searchTrips(this.query);
      }
    },
    mounted() {
      this.fetchTrips()
      this.fetchLoggedUser()
    }
  }
</script>
