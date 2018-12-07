<template>
    <form @submit.prevent="formSubmit">
        <question-type></question-type>
        <template v-if="typeChoosed">
            <div class="form-group">
                <input type="text" class="form-control" name="body" placeholder="Question...">
            </div>
            <div class="form-group">
                <input type="number" class="form-control" name="grade" placeholder="Grade...">
            </div>
            <mcq-question v-if="type == 'mcq'"></mcq-question>
            <button class="btn btn-primary"> Add Question </button>
        </template>
    </form>
</template>

<script>
    import QuestionType from './type';
    import MCQQuestion from './mcq';
    import {EventBus}  from "../../../bus";

    export default {
        components: {
            QuestionType,
            'mcq-question': MCQQuestion,
        },

        data() {
            return {
                url: `/api/${this.$route.params.lesson}/questions`
            }
        },

        computed: {
            type() {
                return this.$store.getters.getQuestionType;
            },

            typeChoosed() {
                return this.$store.getters.getQuestionType ? true : false;
            }
        },

        methods: {
            formSubmit(e) {
                let player = this.$store.getters.getVideoPlayer;
                const time = Math.round(player.currentTime);
                let formData = new FormData(e.target);
                formData.append('time', time);
                formData.append('type', this.type);
                if(this.type === 'mcq') {
                    let answers = this.$store.getters.getAnswers;
                    let correctAnswer = this.$store.getters.getCorrectAnswer;
                    formData.append('answers', JSON.stringify(answers));
                    formData.append('correct_answer', correctAnswer);
                }


                axios.post(this.url, formData)
                    .then(response => {
                        console.log(response);
                    })
                    .catch(error => {
                        console.log(error);
                    })
            }
        },
    }
</script>

<style scoped>
</style>
