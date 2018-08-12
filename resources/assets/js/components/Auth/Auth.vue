<template>
  <div class="auth">
    <img src="Images/background.jpg" class="auth-img">
    <transition name="component-fade" mode="out-in">
      <component :is="authView"></component>
    </transition>
  </div>
</template>
<script>
import vuAbout from './About.vue'
import vuLogin from './Login.vue'
import vuRegister from './Register.vue'
import { mapState } from 'vuex'

export default {
  components: { vuLogin, vuRegister, vuAbout },
  computed: {
    ...mapState('auth', ['authView'])
  }
}
</script>

<style lang="scss" scoped>
  .auth{
    width: 100vw;
    height: 100vh;
    overflow: hidden;
    position: relative;
    display: flex;
    justify-content: center;
    align-items: center;
    &-img{
      width: 100%;
      height: auto;
      position: absolute;
      z-index: -1;
    }
  }
  @media screen and (max-width: 1055px) {
    .auth {
      background-color: #ABABD3;
      &-img{
        display: none;
      }
    }
  }
  .component-fade-enter-active,.component-fade-leave-active {
    transition: opacity .3s linear;
  }
  .component-fade-enter,.component-fade-leave-to {
    opacity: 0;
  }
  .component-fade-leave,.component-fade-enter-to {
    opacity: 1;
  }
</style>


