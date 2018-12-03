<template>
    <form @submit.prevent="formSubmit">

        <div class="form-group">
            <input type="text" name="name" class="form-control">
        </div>

        <div class="form-group">
            <div class="custom-file">
                <input type="file" class="custom-file-input" id="file" accept="image/*">
                <label class="custom-file-label" for="file">Choose cover photo...</label>
            </div>
        </div>

        <div class="form-group">
            <input type="tel" name="educator_id" class="form-control">
        </div>

        <button class="btn btn-primary"> Add </button>
    </form>
</template>

<script>
    export default {
        data() {
            return {
                action: `/api/courses/${this.route.params.course}`,
                name: '',
                educator: ''
            }
        },

        methods: {
            formSubmit(e) {
                let formData = new FormData(e.target);
                axios.put(this.action, formData)
                    .then(response => console.log(response.data))
                    .catch(err => console.log(err));
            }
        },
    }
</script>

<style scoped>

</style>
