<template>
    <form @submit.prevent="formSubmit">

        <div class="form-group">
            <label> Name </label>
            <input type="text" name="name" class="form-control">
        </div>

        <div class="form-group">
            <label> Description </label>
            <input type="text" name="description" class="form-control">
        </div>

        <button class="btn btn-primary"> Add </button>
    </form>
</template>

<script>
    export default {

        data() {
            return {
                action: `/api/${this.$route.params.course}/units`
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
