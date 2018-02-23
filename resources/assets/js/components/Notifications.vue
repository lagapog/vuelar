<template>
    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        <a class="dropdown-item" v-for="notification in notifications" :href="`/${notification.data.follower.username}`">
            {{notification.data.message}}
        </a>
    </div>
</template>
<script>
    export default {
        data() {
            return {
                notifications: [],
            }
        },
        props: ['user'],
        mounted() {
            axios.get('/api/notifications')
                .then(res => {
                    this.notifications = res.data
                    Echo.private(`App.User.${this.user}`)
                        .notification(notification => {
                            this.notifications.unshift(notification)
                        })
                })
        }
    }
</script>