<template>
	<div class="row mt-4">
		<p class="lead" v-if="emptyComments">No comments yet</p>
		<div v-else>
			<div class="col-12">
				<h2>Comments about the trip!</h2>
			</div>
			<div class="col-12 col-md-10 col-xl-8" v-for="comment in comments" :key="comment.id">
				<p class="lead">{{ comment.user.username }} : {{ comment.message }}</p>
			</div>
		</div>
	</div>
</template>
<script>
	import { mapState, mapActions, mapGetters } from 'vuex'

	export default {
		computed: { 
			...mapState('comments', ['comments']),
			...mapGetters('comments', ['emptyComments'])
		},
		methods: {
      ...mapActions('comments', ['fetchComments'])
		},
		mounted() {
			this.fetchComments(this.$route.params.trip)
		}
	}
</script>