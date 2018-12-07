<template>

    <div>
        <vue-plyr ref="player">
            <video>
                <source :src="src" type="video/mp4">
            </video>
        </vue-plyr>

        <template  v-if="currentQuestion">

            <b-modal ref="myModalRef" hide-footer centered  :title="currentQuestion.body">
                <template v-if="currentQuestion.type === 'mcq'">
                    <div class="form-check" v-for="answer in currentQuestion.answers" :key="answer.id" >
                        <input class="form-check-input" v-model="currentAnswer" type="radio" :name="currentQuestion.id" :id="answer.id" :value="answer.id">
                        <label class="form-check-label" :for=answer.id>
                            {{ answer.body }}
                        </label>
                    </div>

                </template>

                <template v-else-if="currentQuestion.type === 'text'">
                    <div class="form-group">
                        <input type="text" class="form-control" v-model="currentAnswer" :name="currentQuestion.id">
                    </div>
                </template>
                <b-btn class="mt-3" variant="outline-danger" block @click="addAnswer"> Add answer </b-btn>
            </b-modal>

        </template>

    </div>
</template>

<script>
    import QuestionModal from "../questions/modal";
    export default {

        components: {
            QuestionModal
        },

        props: {
            src: String
        },

        data() {
            return {
                currentQuestion: null,
                currentAnswer: null
            }
        },

        computed: {
            player () {
                return this.$refs.player.player
            },
            modal () {
                return this.$refs.modal
            },
            questionsTimes() {
                return this.$store.getters.getQuestionsTimes
            }
        },

        mounted() {
            this.player.on('seeked', () => {
                this.getQuestionIfExists();
            });

            this.$store.commit('setVideoPlayer', this.player)
            this.trackWatchingTime();

        },

        methods: {
            trackWatchingTime() {
                setInterval( () => {
                    this.getQuestionIfExists();
                }, 1000);
            },

            showModal () {
                this.$refs.myModalRef.show()
            },

            hideModal () {
                this.$refs.myModalRef.hide()
            },

            addAnswer() {
                if(!this.currentAnswer) {
                    this.$toasted.show('You have to insert an answer');
                    return;
                }

                //TODO ==> Add answer to DB
                this.hideModal();

            },

            getQuestionIfExists() {

                if(!this.player.playing ) return;
                let time = Math.floor(this.player.currentTime).toString();
                let questionTimeIndex = this.questionsTimes.findIndex(times => times.time == time && !times.showed);
                if(questionTimeIndex == -1) return;
                if(this.player.playing ) {
                    let questions = this.$store.getters.getQuestions;
                    this.player.pause();
                    this.currentQuestion = questions.find(question => question.time == time);
                    this.$store.commit('removeQuestion', questionTimeIndex);
                    setTimeout(() => {
                        this.showModal();
                    }, 200);
                }
            }
        },

    }
</script>

<style scoped>
</style>
