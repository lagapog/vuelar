<template>
    <div class="row mt-4">
        <div class="col-12">
            <h2>Comments about the trip!</h2>
            <span>{{ user }}</span>
        </div>
        <div class="col-12 col-md-10 col-xl-8" v-for="comment in comments" :key="comment.id">
            <p class="lead">{{ comment.user.username }} : {{ comment.message }}</p>
        </div>
    </div>
</template>
<script>
    import { mapState, mapActions } from 'vuex'

    export default {
        data () {
            return {
                comments: [],
            }
        },
        computed: mapState(['user']),
        props: ['trip'],
        methods: mapActions(['changeUser']),
        mounted () {
            this.changeUser()
            axios.get(`/api/trips/${this.trip}/comments`)
                .then(res => { this.comments = res.data})
        }
    }
</script>