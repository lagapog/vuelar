<template>
  <div class="row mt-4">
    <p v-if="emptyTrips">
      No trips had been created
    </p>
    <div class="col-12 col-md-6 col-xl-4 mb-4" v-for="trip in trips" :key="trip.id">
      <vu-trip :trip="trip" />
    </div>
  </div>
</template>
<script>
  import vuTrip from './Trip.vue'
  import { mapState, mapGetters } from 'vuex'

  export default {
    name: 'vuTripsGrid',
    components: { vuTrip },
    computed: {
      ...mapState('trips', ['trips']),
      ...mapGetters('trips', ['emptyTrips'])
    }
  }
</script>
