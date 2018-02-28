<template>
    <div class="row mt-4">
        <div class="col-12">
            <h2>Comments about the trip!</h2>
        </div>
        <div class="col-12 col-md-10 col-xl-8" v-for="comment in comments" :key="comment.id">
            <p class="lead">{{ comment.user.username }} : {{ comment.message }}</p>
        </div>
    </div>
</template>
<script>
    export default {
        data () {
            return {
                comments: [],
            }
        },
        props: ['trip'],
        mounted () {
            axios.get(`/api/trips/${this.trip}/comments`)
                .then(res => { this.comments = res.data})
        }
    }
</script>