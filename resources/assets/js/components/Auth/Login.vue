<template>
  <div class="login-container">
    <div class="login-container-account">
      <h5 class="login-container-account-title">Ingresa con tu cuenta</h5>
      <input class="login-container-account-input" type="text" name="username" v-model="username" placeholder="usuario">
      <input class="login-container-account-input" @keyup.enter="toLogin" type="password" name="password" v-model="password" placeholder="contraseña">
      <button class="login-container-account-button" @click="toLogin">
        <span v-if="!logging">iniciar</span>
        <i v-else class="fas fa-spinner loading"></i>
      </button>
      <span v-if="messageError" class="login-container-account-error">{{messageError}}</span>
    </div>
    <div class="login-container-social">
      <a href="auth/facebook">
        <button class="login-container-social-button facebook">
          <i class="fab fa-facebook-f"></i> Entrar con facebook
        </button>
      </a>
      <a href="auth/twitter">
        <button class="login-container-social-button twitter">
          <i class="fab fa-twitter"></i> Entrar con twitter
        </button>
      </a>
      <span class="link" @click="switchAuthView">Crear una cuenta nueva</span>
      <span>¿Olvidaste tu contraseña?</span>
    </div>
    <div class="login-container-arrow">
      <i class="fas fa-chevron-down"></i>
    </div>
  </div>
</template>
<script>
import { mapState, mapMutations, mapActions } from 'vuex'

export default {
  data() {
    return  {
      username: '',
      password: ''
    }
  },
  computed: {
    ...mapState('auth', ['messageError', 'logging'])
  },
  methods: {
    ...mapMutations('auth', ['switchAuthView']),
    ...mapActions('auth', ['login']),
    toLogin() {
      let data = {
        username: this.username,
        password: this.password
      }
      this.login(data)
    }
  }
}
</script>
<style lang="scss" scoped>
@import "../../../sass/_variables";
.login-container {
  position: absolute;
  top: $login-top;
  right: $login-right;
  width: $login-width;
  height: $login-height;
  max-height: 100vh;
  border-radius: 10px;
  box-shadow: 2px 2px 8px 1px $color-black-alpha, 
              -2px -2px 8px 1px $color-black-alpha;
  overflow: hidden;
  &-account,&-social{
    height: 50%;
    width: 100%;
    display: grid;
    align-items: center;
    justify-items: center;
  }
  &-account {
    background-color: $color-primary-alpha;
    padding-top: 30px;
    padding-bottom: 30px;
    grid-template-rows: 1.5rem repeat(3, 1fr) 1.2rem;
    &-title {
      color: $color-white;
      margin-bottom: 0;
    }
    &-input {
      border: none;
      border-radius: 10px;
      text-align: center;
      padding: 5px 30px;
    }
    &-button{
      background: transparent;
      border: 1px solid $color-white;
      color: $color-white;
      border-radius: 10px;
      padding: 5px 45px;
      outline: none;
      cursor: pointer;
    }
    &-error {
      color: $color-error-message;
    }
  }
  &-social {
    background-color: $color-white;
    padding-top: 40px;
    padding-bottom: 40px;
    grid-template-rows: repeat(2, 1fr) repeat(2, 1.8rem);
    &-button{
      border: none;
      border-radius: 10px;
      width: 200px;
      padding-top: 8px;
      padding-bottom: 8px;
      color: $color-white;
      outline: none;
      cursor: pointer;
      &.facebook{
        background-color: $color-facebook;
      }&.twitter{
        background-color: $color-twitter;
      }
      i {
        font-size: 1.3rem;
        margin-right: 10px;
      }
      a {
        color: $color-white;
      }
    }
  }
  &-arrow {
    position: absolute;
    background-color: $color-white;
    box-shadow: 1px 1px 2px 1px rgba(0,0,0,.2),
                -1px -1px 2px 1px rgba(0,0,0,.2);
    color: $color-primary-dark;
    height: 50px;
    width: 50px;
    text-align: center;
    font-size: 25px;
    font-weight: 100;
    line-height: 50px;
    border-radius: 50%;
    top: calc(50% - 25px);
    right: calc(50% - 25px);
  }
}
</style>

