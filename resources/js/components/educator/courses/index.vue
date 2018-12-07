<template>
    <div>

        <loading v-if="loading"></loading>

        <div v-else>
            <div v-for="course in courses" :key="course.id" class="card">
                <div class="card-body">

                    <h3>
                     {{ course.name }}
                    </h3>
                    <p> {{ course.description }} </p>

                    <p> {{ course.units_count }} Units </p>
                    <p> {{ course.lessons_count }} Lessons </p>

                    <router-link :to="{name: 'units.add', params: {course: course.slug}}"> Add new unit </router-link>

                    <router-link :to="{name: 'courses.show', params: {course: course.slug}}"> Show Course </router-link>

                    <router-link :to="{name: 'courses.update', params: {course: course.slug}}"> Update Course </router-link>

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

        created() {
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
