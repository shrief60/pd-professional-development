<template>
    <div class="answer">
        <input type="text" class="form-control" v-model="answer" placeholder="Answer..." @focus="removeAnswer" @blur="addAnswer">
        <i class="fas fa-check" @click="setCorrectAnswer"></i>
        <i class="fas fa-trash" @click="removeAnswer"></i>
    </div>
</template>

<script>

    export default {

        data() {
            return {
                answer: ''
            }
        },
        methods: {

            addAnswer() {
                this.$store.commit('addAnswer', this.answer);
            },

            removeAnswer() {
                if(this.$store.getters.getAnswers.length > 0) {
                    this.$store.commit('removeAnswer', this.answer);

                }
            },

            setCorrectAnswer() {
                this.$store.commit('setCorrectAnswer', this.answer);
            },


        },
    }
</script>


<style lang="scss">
    .answer {
        display: flex;
        flex-direction: row;
        align-items: center;
        margin: 10px auto;
        input {
            flex: 1;
        }
        .fas {
            cursor: pointer;
            margin-left: 0.5rem;
        }
        .fa-trash {
            color: #cc0000;
        }
        .fa-check {
            color: 	#00FF7F;
        }
    }
</style>
