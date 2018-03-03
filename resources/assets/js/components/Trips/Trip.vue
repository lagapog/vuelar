<template>
  <div class="card border-primary">
    <img class="card-img-top" :src="trip.image">
    <div class="card-body">
        <h5 class="card-title">{{ trip.location }}</h5>
        <p class="card-text">
            By <a :href="`/${trip.user.username}`"></a>
            <router-link :to="`/${trip.user.username}`">{{ trip.user.username }}</router-link>
        </p>
        <a :href="`/trips/${trip.id}`" class="btn btn-primary">Read more</a>
    </div>
  </div>  
</template>
<script>
  export default {
    name: 'vuTrip',
    props: ['trip']
  }
</script>

