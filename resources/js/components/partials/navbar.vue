<template>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">

    <router-link class="navbar-brand" :to="{name: 'home'}">Discovery</router-link>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbar">
        <ul class="navbar-nav ml-auto">

            <li class="nav-item">
                <router-link class="nav-link" :to="{ name: 'home' }">Home</router-link>
            </li>

            <li class="nav-item">
               <router-link class="nav-link" :to="{ name: 'courses.index' }">Courses</router-link>
            </li>

            <li class="nav-item">
                <router-link class="nav-link" :to="{ name: 'courses.add' }">Add Note</router-link>
            </li>

        </ul>

    </div>
    </nav>
</template>

<script>
    export default {

    }
</script>

<style scoped>

</style>
