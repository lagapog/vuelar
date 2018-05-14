<template>
  <nav class="navbar navbar-expand-md navbar-light navbar-laravel mb-5"> 
    <div class="container">
      <router-link class="navbar-brand" to="/">
          Vuelar
      </router-link>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <!-- Right Side Of Navbar -->
        <ul class="navbar-nav ml-auto align-items-center">
          <!-- Si es invitado -->
          <!-- <li class="nav-item dropdown mr-md-2">
            <a href="#" class="nav-link" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="material-icons">notifications</i>
            </a>
            <notifications user="" type="alerts"></notifications>
          </li>
          <li class="nav-item dropdown mr-md-2">
            <a href="#" class="nav-link" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="material-icons">forum</i>
            </a>
            <notifications user="" type="messages"></notifications>
          </li> -->
          <img class="img-fluid rounded-circle d-none d-md-block ml-2" width="30" :src="loggedUser.avatar">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                {{ loggedUser.name }} <span class="caret"></span>
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <router-link class="dropdown-item" :to="`/${loggedUser.username}`">My profile</router-link>
                <router-link class="dropdown-item" to="/trips/create">New Trip</router-link>
                <a class="dropdown-item" @click="logout">Logout</a>
                <!-- <form id="logout-form" action="{{ route('logout') }}" method="POST">
                </form> -->
            </div>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</template>
<script>
import { users } from '../../api'
import { mapState } from 'vuex'

export default {
  computed: {
    ...mapState('users', ['loggedUser'])
  },
  methods: {
    logout() {
      return axios.post(users.logout())
        .then(({data}) => {
          auth.logout();
          this.$router.push('/');
        })
        .catch(({response}) => {                    
          console.log(response.data.message);
        })
    }
  }
}
</script>
<style lang="scss" scoped>
@import "../../../sass/_variables.scss";
.navbar-laravel {
  background-color: #fff;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.04);
}
.navbar-brand {
  font-family: $font-family-cursive;
  font-size: 1.8rem;
}
</style>
