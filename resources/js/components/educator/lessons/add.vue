<template>

    <div>
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

            <button :disabled="uploading" class="btn btn-primary"> Add </button>
        </form>

        <div v-if="lessonUploaded" class="embed-responsive embed-responsive-16by9">
            <iframe class="embed-responsive-item" :src="this.lesson.path"></iframe>
        </div>

    </div>
</template>

<script>

    export default {

        data() {

            return {
                action: `/api/${this.$route.params.unit}/lessons`,
                uploading: false,
                lesson: null,
                lessonUploaded: false
            }
        },

        methods: {
            formSubmit(e) {
                let formData = new FormData(e.target);
                this.uploading = true;
                axios.post(this.action, formData)
                    .then(response => {
                        this.lesson = response.data.data;
                        this.lessonUploaded = true;
                        this.uploading = false;
                    })
                    .catch(err => console.log(err));
            }
        },
    }
</script>

<style scoped>

</style>

