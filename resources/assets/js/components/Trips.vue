<template>
  <div class="card">
    <img class="card-img-top" :src="trip.image">
    <div class="card-body">
        <h5 class="card-title">{{ trip.location }}</h5>
        <p class="card-text">
            By <a :href="`/${trip.user.username}`">{{ trip.user.username }}</a>
        </p>
        <a :href="`/trips/${trip.id}`" class="btn btn-primary">Read more</a>
    </div>
</div>  
</template>
<script>
export default {
  props: ['trip']
}
</script>

