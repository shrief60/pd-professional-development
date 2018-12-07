<template>

    <div>

        <h3> {{ unit.name }} </h3>

        <p> {{ unit.description }} </p>

        <router-link :to="{name: 'lessons.add', params: {unit: unit.slug}}"> Add new lesson </router-link>

        <router-link :to="{name: 'units.update', params: {unit: unit.slug}}"> Update Unit </router-link>

    </div>

</template>

<script>
    export default {
        props: {
            unit: Object
        }
    }
</script>

<style scoped>

</style>
