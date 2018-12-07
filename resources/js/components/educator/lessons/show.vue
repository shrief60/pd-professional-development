<template>

    <div>
        <loading v-if="loading"></loading>
        <template v-else>
            <h1> {{ lesson.title }} </h1>
            <p> {{ lesson.description }} </p>
            <p> {{ lesson.objectives }} </p>
            <my-lesson :src="lesson.path"></my-lesson>
            <question></question>
        </template>
    </div>
</template>

<script>
    import MyLesson from './lesson';
    import Question from '../questions/add';
    export default {
        components: {
            MyLesson,
            Question
        },

        data() {
            return {
                url: `/api/lessons/${this.$route.params.lesson}`,
                loading: true,
                lesson: null,
            }
        },

        comptuted: {
            times() {
                return this.$store.getters.getQuestionsTimes
            }
        },

        created() {
            axios.get(this.url)
                .then(response => {
                    this.lesson = response.data.data;
                    this.loading = false;
                    this.$store.commit('setQuestions', this.lesson.questions);
            })
            .catch(error => {
                this.$router.push({name: 'not-found'});
            })
        }
    }
</script>

<style scoped>
</style>
