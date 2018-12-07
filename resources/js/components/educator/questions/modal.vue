<template>
    <!-- Modal -->
    <div class="card" id="questionModal">
        <div class="card-header">
            <h5>{{ question.body }}</h5>
        </div>
        <div class="card-body">
            <template v-if="question.type === 'mcq'">

                <div class="form-check" v-for="answer in question.answers" :key="answer.id">
                    <input class="form-check-input" type="radio" :name="'answers-' + question.id" :id="answer.id" :value="answer.id">
                    <label class="form-check-label" :for=answer.id>
                        {{ answer.body }}
                    </label>
                </div>

            </template>

            <template v-else-if="question.type === 'text-answer'">
                <div class="form-group">
                    <input type="text" class="form-control" :name="'answers-' + question.id">
                </div>
            </template>

        </div>

        <div class="card-footer">
            <button class="btn btn-primary"> Sumbit </button>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            question: {
                type: Object,
                default: {}
            },
        },
    }
</script>

<style scoped>

</style>
