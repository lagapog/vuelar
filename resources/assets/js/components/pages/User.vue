<template>
  <div class="container" v-if="!userIsLoading">
    <div class="row my-4 justify-content-center">
      <div class="col-6 col-md-3 d-flex justify-content-center align-items-center mb-2">
        <img class="img-fluid rounded-circle" style="height: 120px" :src="user.avatar">
      </div>
        <div class="col-12 col-md-6">
          <div class="card border-primary">
            <div class="card-body">
              <div  v-if="!itIsMe" class="row mb-3 justify-content-around">
                <transition name="follow-slide" mode="out-in">
                  <component :is="view"></component>
                </transition>
                <button class="btn btn-outline-primary" style="width: 6rem">Talk</button>
              </div>
              <h5 class="card-title">Name: {{ user.name }}</h5>
              <p class="card-text">Username: {{ user.username }}</p>
              <p class="card-text">Email: {{ user.email }}</p>
              <div class="row justify-content-around">
                <button class="btn btn-primary" @click="viewFollows">
                  {{ numberOfFollows }} Follows
                </button>
                <button class="btn btn-primary" @click="viewFollowers">
                  {{ numberOfFollowers }} Followers
                </button>
              </div>
            </div>
          </div>
        </div>
    </div>
    <vu-follows v-show="showFollows" />
    <vu-followers v-show="showFollowers" />
    <h2>Trips of {{ user.username }}</h2>
    <div class="row mt-2">
        <p v-if="!userHasTrips" >No trips yet</p>
        <div class="col-12 col-md-6 col-xl-4 mb-4" v-for="trip in user.trips" :key="trip.id">
          <vu-trip-in-user :trip="trip" :username="user.username" />
        </div>
    </div>
  </div>
</template>
<script>
  import vuTripInUser from '../Users/TripInUser.vue'
  import vuFollowButton from '../Users/FollowButton.vue'
  import vuUnfollowButton from '../Users/UnfollowButton.vue'
  import vuFollows from '../Users/Follows.vue'
  import vuFollowers from '../Users/Followers.vue'
  import { mapState, mapActions, mapGetters } from 'vuex'

  export default {
    components: { 
      vuTripInUser,
      vuFollowButton,
      vuUnfollowButton,
      vuFollows,
      vuFollowers
    },
    computed: {
      ...mapState('users', [
        'user',
        'loggedUser',
        'userIsFollow',
        'userIsLoading'
      ]),
      ...mapGetters('users', [
        'userHasTrips',
        'numberOfFollows',
        'numberOfFollowers',
        'itIsMe'
      ]),
      view() {
        if (this.userIsFollow) { return 'vuUnfollowButton' }
        return 'vuFollowButton'
      }
    },
    data() {
      return {
        showFollows: false,
        showFollowers: false
      }
    },
    methods: {
      ...mapActions('users', ['fetchUserByUsername', 'fetchLoggedUser']),
      viewFollows() {
        this.showFollows = !this.showFollows
        this.showFollowers = false
      },
      viewFollowers() {
        this.showFollowers = !this.showFollowers
        this.showFollows = false
      }
    },
    beforeRouteEnter (to, from, next) {
      next(vm => {
        vm.fetchUserByUsername(to.params.username)
      })
    },
    beforeRouteUpdate (to, from, next) {
      this.fetchUserByUsername(to.params.username)
      next()
    },
    mounted() {
      this.fetchLoggedUser()
    }
  }
</script>
<style lang="scss" scoped>
  .follow-slide-enter-active, .follow-slide-leave-active {
    transition: all .5s ease;
  }
  .follow-slide-enter {
    transform: translateX(20px);
    opacity: 0;
  }
  .follow-slide-leave-to {
    transform: translateX(-20px);
    opacity: 0;
  }
  .follow-slide-enter-to, .follow-slide-leave {
    transform: translateX(0px);
    opacity: 1;
  }
</style>

