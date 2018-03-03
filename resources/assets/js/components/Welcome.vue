<template>
  <div class="container-fluid img-bg">
    <div class="row h-100 align-items-center">
      <div class="col text-center">
        <p>Life is now</p>
      </div>
    </div>
  </div>
</template>
<style lang="scss" scoped>
  @import "../../sass/_variables";
  .img-bg {
    background: url('https://images.unsplash.com/photo-1477870103390-4be4c7718e81?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=031c4ae207570bd3759db7d53fa83e36&auto=format&fit=crop&w=1350&q=80') center;
    height: 100vh;
    position: absolute;
    top: 0;
    z-index: -1;
    color: white;
    p {
      font-family: $font-family-cursive;
      font-size: calc(13vw + 10px);
      text-shadow: 2px 2px #000;
    }
  }
</style>


