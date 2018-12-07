<template>
    <div class="form-group">
        <label for=""> Question </label>
        <select class="form-control" v-model="type" @change="changeQuesionType">
            <option value="mcq"> Multiple Choice </option>
            <option value="text"> Text Answer </option>
        </select>
    </div>
</template>

<script>
    import {EventBus}  from "../../../bus";
    export default {
        data() {
            return {
                type: ''
            }
        },
        methods: {
            changeQuesionType() {
                this.$store.commit('setQuestionType', this.type);
                EventBus.$emit('questionTypeChanged', this.type);
            }
        },
    }
</script>

<style scoped>

</style>
