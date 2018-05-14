<template>
  <div class="auth">
    <img src="../../../images/background.jpg" class="auth-img">
    <transition name="component-fade" mode="out-in">
      <component :is="authView"></component>
    </transition>
  </div>
</template>
<script>
import vuLogin from './Login.vue'
import vuRegister from './Register.vue'
import { mapState } from 'vuex'

export default {
  components: { vuLogin, vuRegister },
  computed: {
    ...mapState('authentication', ['authView'])
  }
}
</script>

<style lang="scss" scoped>
  .auth{
    width: 100vw;
    height: 100vh;
    overflow: hidden;
    &-img{
      width: 100%;
      height: auto;
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


