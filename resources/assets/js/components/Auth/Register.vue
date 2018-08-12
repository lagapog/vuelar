<template>
  <div class="register-container">
    <div class="register-container-account">
      <h5 class="register-container-account-title">Crear una cuenta</h5>
      <input class="register-container-account-input" type="text" name="name" v-model="name" placeholder="nombres y apellidos">
      <input class="register-container-account-input" type="text" name="username" v-model="username" placeholder="usuario" @change="toCheckUnique">
      <input class="register-container-account-input" type="text" name="email" v-model="email" placeholder="ejemplo@correo.com" @change="toCheckUnique">
      <input class="register-container-account-input" @keyup.enter="toRegister" type="password" name="password" v-model="password" placeholder="contraseña">
      <button class="register-container-account-button" @click="toRegister">
        <span v-if="!logging">Registrarme</span>
        <i v-else class="fas fa-spinner loading"></i>
      </button>
      <span v-if="messageError" class="register-container-account-error">{{messageError}}</span>
    </div>
    <div class="register-container-social">
      <a href="auth/facebook">
        <button class="register-container-social-button facebook">
          <i class="fab fa-facebook-f"></i> Usar facebook
        </button>
      </a>
      <a href="auth/twitter">
        <button class="register-container-social-button twitter">
          <i class="fab fa-twitter"></i> Usar twitter
        </button>
      </a>
      <span class="link" @click="switchAuthView('login')">Ya tengo una cuenta</span>
    </div>
    <div class="register-container-arrow">
      <i class="fas fa-chevron-down"></i>
    </div>
  </div>
</template>
<script>
import { mapState, mapMutations, mapActions } from 'vuex'

export default {
  data() {
    return {
      name: '',
      username: '',
      email: '',
      password: '',
    }
  },
  computed: {
    ...mapState('auth', ['logging', 'messageError'])
  },
  methods: {
    ...mapMutations('auth', ['switchAuthView']),
    ...mapActions('auth',[
      'register',
      'login',
      'checkUnique'
    ]),
    toRegister() {
      let data = {
        name: this.name,
        username: this.username,
        email: this.email,
        password: this.password
      }
      this.register(data)
    },
    toCheckUnique() {
      let data = {
        username: this.username,
        email: this.email
      }
      this.checkUnique(data)
    }
  }
}
</script>
<style lang="scss" scoped>
@import "~Sass/_variables";
.register-container {
  width: $register-width;
  height: $register-height;
  max-height: 100vh;
  border-radius: 10px;
  box-shadow: 2px 2px 8px 1px $color-black-alpha, 
              -2px -2px 8px 1px $color-black-alpha;
  overflow: hidden;
  &-account,&-social{
    width: 100%;
    display: grid;
    align-items: center;
    justify-items: center;
  }
  &-account {
    height: 62%;
    background-color: $color-primary-alpha;
    padding-top: 30px;
    padding-bottom: 30px;
    grid-template-rows: 1.5rem repeat(5, 1fr) 1.2rem;
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
      cursor: pointer;
    }
    &-error {
      color: $color-error-message;
    }
  }
  &-social {
    height: 38%;
    background-color: $color-white;
    padding-top: 40px;
    padding-bottom: 30px;
    grid-template-rows: repeat(2, 1fr) 1.8rem;
    &-button{
      border: none;
      border-radius: 10px;
      width: 200px;
      padding-top: 8px;
      padding-bottom: 8px;
      color: $color-white;
      cursor: pointer;
      &.facebook{
        background-color: $color-facebook;
      }&.twitter{
        background-color: $color-twitter;
      }
      & i {
        font-size: 1.3rem;
        margin-right: 10px;
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
    top: calc(62% - 25px);
    right: calc(50% - 25px);
  }
}
</style>