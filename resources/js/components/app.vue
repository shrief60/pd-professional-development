<template>
    <div>
        <navbar />
        <div class="container my-3">
            <router-view></router-view>
        </div>
    </div>
</template>

<script>

    import navbar from './partials/navbar.vue'
    export default {
        components: {
            navbar
        }
    }
</script>
