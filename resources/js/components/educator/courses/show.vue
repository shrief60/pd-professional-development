<template>
    <div>
        <loading v-if="loading"></loading>
        <div v-if="course">
            <h3> {{ course.name }} </h3>
            <p> {{ course.description }} </p>
            <img :src="course.image" alt="" />
            <template v-if="course.units.length">
                <h5> Units </h5>
                <ul>
                    <li v-for="unit in course.units" :key="unit.id">
                        {{ unit.name }}
                        <template v-if="unit.lessons.length">
                            <ul>
                                <li v-for="lesson in unit.lessons" :key="lesson.id"> {{ lesson.title }} </li>
                            </ul>
                        </template>
                    </li>
                </ul>
            </template>
        </div>
    </div>
</template>

<script>
    export default {

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
        }
    }
</script>

<style scoped>

</style>
