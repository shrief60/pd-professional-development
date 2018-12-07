<template>
    <div>
        <answer v-for="index in answersCount" :key="index"></answer>
        <button type="button" class="btn btn-info m-2" @click="increaseAnswersCount"> Add new answer </button>
    </div>
</template>

<script>
    import Answer from '../answers/add';
    export default {
        components: {
            Answer
        },

        computed: {
            answersCount() {
                return this.$store.getters.getAnswersCount
            }
        },

        methods: {
            increaseAnswersCount() {
                this.$store.commit('increaseAnswersCount');
            }
        },


    }
</script>

<style scoped>
</style>
