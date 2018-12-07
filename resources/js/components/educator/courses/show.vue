<template>
    <div>
        <loading v-if="loading"></loading>
        <div v-if="course">
            <h3> {{ course.name }} </h3>
            <p> {{ course.description }} </p>
            <img :src="course.image" alt="" width="300"/>
            <template v-if="course.units.length">
                <h5> Units </h5>
                <unit v-for="unit in course.units" :unit="unit" :key="unit.id">
                    <template v-if="unit.lessons.length">
                        <ul>
                            <li v-for="lesson in unit.lessons" :key="lesson.id"> {{ lesson.title }} </li>
                        </ul>
                    </template>
                </unit>
            </template>

        </div>
    </div>
</template>

<script>

    import unit from "../units/show";

    export default {

        components: {
            unit
        },
        data() {
            return {
                action: `/api/courses/${this.$route.params.course}`,
                course: null,
                loading: true
            }
        },
        created() {
            axios.get(this.action)
                .then(response => {
                    this.loading = false;
                    this.course = response.data.data;
                })
                .catch(_ => {
                    this.$router.push({name: '404'})
                })
        }
    }
</script>

<style scoped>

</style>
