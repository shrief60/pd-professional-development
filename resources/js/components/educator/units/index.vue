<template>

    <div>
        <div v-if="loading">
            Loading ...
        </div>

        <div v-else>
            <div v-for="unit in units" :key="unit.id" class="card">
                <div class="card-body">
                    <h3> {{ unit.name }} </h3>
                    <p> {{ unit.description }} </p>
                    <router-link :to="{name: 'lessons.add', params: {unit: unit.id}}"> Add Lession </router-link>
                </div>
            </div>
        </div>
    </div>

</template>

<script>
    export default {
        data() {
            return {
                route: `/api/${this.$route.params.course}/units`,
                units: null,
                loading: true
            }
        },
        created() {
            axios.get(this.route)
                    .then(response => {
                        this.units = response.data.data;
                        this.loading = false;
                    })
            .catch(err => console.log(err))
        }
    }
</script>

<style scoped>
</style>
