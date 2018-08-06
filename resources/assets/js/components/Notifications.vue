<template>
    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        <a class="dropdown-item" v-for="notification in notifications" :key="notification.id" :href="notification.data.link">
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
        props: ['user', 'type'],
        mounted() {
            axios.get(`/api/notifications/${this.type}`)
                .then(res => {
                    this.notifications = res.data
                })
        }
    }
</script>