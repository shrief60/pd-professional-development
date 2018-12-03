<template>
    <div>
        <div v-if="loading">
            Loading ...
        </div>

        <div v-else>
            <div v-for="course in courses" :key="course.id" class="card">
                <div class="card-body">
                    <h3>
                     {{ course.name }}
                    </h3>
                    <router-link class="btn btn-outline-primary" :to="{name: 'units.add', params: {course: course.id}}"> Add new unit </router-link>
                </div>
            </div>
        </div>
    </div>

</template>

<script>
    export default {
        data() {
            return {
                loading: true,
                courses: null
            }
        },
        mounted() {

            axios.get('/api/courses')
                    .then(response => {
                        this.courses = response.data.data;
                        this.loading = false;
                    })
            .catch(err => console.log(err))
        }
    }
</script>

<style scoped>
</style>
