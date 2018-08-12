<template>
  <div class="about-container">
    <div class="about-container-top">
      <h1>Vuelar</h1>
    </div>
    <div class="about-container-content">
      <img src="Images/logo150x150.png" alt="vuelar-logo">
      <div class="vuelar-description">
        <p>Vuelar brinda un espacio para buscar compañeros de viajes, puedes crear nuevas salidas o unirte a las que más te guste.</p>
        <p>El fin: crear las mejores experiencias de vida mientras recorres el mundo.</p>
      </div>
      <div class="vuelar-item" v-for="feature in vuelarFeatures" :key="feature.id">
        <i :class="feature.icon"></i>
        <p>{{ feature.msg }}</p>
      </div>
      <a :href="luisagapito" target="_blank" class="link">@LuisAgapito</a>
      <span class="link" @click="switchAuthView('register')">Crear una cuenta nueva</span>
      <span class="link" @click="switchAuthView('login')">Ya tengo una cuenta</span>
    </div>
  </div>
</template>
<script>
import { mapMutations, mapState } from 'vuex'

export default {
  data() {
    return {
      luisagapito: "https://luisagapito.com",
      vuelarFeatures : [
        {id: 1, icon: 'fas fa-suitcase', msg: 'Conoce personas que comparten tu pasión por viajar.'},
        {id: 2, icon: 'fas fa-globe-americas', msg: 'Visita los lugares que siempre quisiste conocer.'},
        {id: 3, icon: 'far fa-map', msg: 'Busca recomendaciones de otros viajeros.'}
      ]
    }
  },
  methods: {
    ...mapMutations('auth', ['switchAuthView']),
  }
}
</script>
<style lang="scss" scoped>
@import "~Sass/_variables";

.about-container {
  width: $about-width;
  height: $about-height;
  max-height: 100vh;
  max-width: 90%;
  border-radius: 10px;
  box-shadow: 2px 2px 8px 1px $color-black-alpha, 
              -2px -2px 8px 1px $color-black-alpha;
  overflow: hidden;
  &-top,&-content{
    width: 100%;
  }
  &-top {
    height: 15%;
    background-color: $color-primary-alpha;
    display: flex;
    justify-content: center;
    align-items: center;
    h1 {
      color: $color-white;
      font-size: 4rem;
      font-family: $font-family-cursive;
    }
  }
  &-content {
    height: 85%;
    background-color: $color-white;
    display: grid;
    align-items: center;
    justify-items: center;
    grid-template: 1fr 140px 100px / repeat(3, 1fr);
  }
  .vuelar-description {
    grid-column: 2 / 4;
    color: $text-color;
    font-size: 1.2rem;
    padding: 0 20px;
    margin-bottom: 0px;
  }
  .vuelar-item{
    text-align: center;
    padding: 10px 30px;
    i {
      font-size: 3rem;
      color: $color-primary;
      margin-bottom: 20px;
    }
    p {
      color: $text-color;
      margin-bottom: 0;
    }
  }
}
</style>

