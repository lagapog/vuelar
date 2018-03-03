<template>
  <div class="row mt-4">
    <div class="col-12 col-md-6 col-xl-4 mb-4 w-100" v-for="n in 12" :key="n">
      <div class="card-loading"></div>
    </div>
  </div>
</template>
<script>
export default {
  name: 'vuLoadingTrip'
}
</script>
<style lang="scss" scoped>
  .card-loading {
    width: 100%;
    height: 351px;
    background-color: #656498;
    border-radius: .25rem;
    animation: blinking 1s .2s infinite alternate;
  }
  @keyframes blinking {
    50%{opacity: 0.2}
  }
</style>
