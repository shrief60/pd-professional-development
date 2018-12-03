<template>
    <form @submit.prevent="formSubmit">

        <div class="form-group">
            <label> Title </label>
            <input type="text" name="title" class="form-control">
        </div>

        <div class="form-group">
            <label> Description </label>
            <input type="text" name="description" class="form-control">
        </div>

        <div class="form-group">
            <label> Objectives </label>
            <input type="text" name="objectives" class="form-control">
        </div>

        <input type="file" name="lesson" accept="video/mp4,video/x-m4v,video/*">


        <button class="btn btn-primary"> Add </button>
    </form>
</template>

<script>
    export default {

        data() {
            return {
                action: `/api/${this.$route.params.unit}/lessons`
            }
        },

        methods: {
            formSubmit(e) {
                let formData = new FormData(e.target);
                axios.post(this.action, formData)
                    .then(response => console.log(response.data))
                    .catch(err => console.log(err));
            }
        },
    }
</script>

<style scoped>

</style>

