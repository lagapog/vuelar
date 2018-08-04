<template>
  <div class="card">
    <img class="card-img-top" :src="trip.image">
    <div class="card-body">
        <h5 class="card-title">{{ trip.location }}</h5>
        <p class="card-text">
          {{ trip.content }}    
        </p>
        <router-link :to="`${username}/trips/${trip.id}`" class="btn btn-primary">Read more</router-link>
    </div>
  </div>  
</template>
<script>
  export default {
    name: 'vuTripInUser',
    props: ['trip', 'username']
  }
</script>

