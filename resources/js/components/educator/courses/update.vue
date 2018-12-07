<template>
    <form @submit.prevent="formSubmit">

        <div class="form-group">
            <label> Name </label>
            <input type="text" name="name" v-model="name" class="form-control">
        </div>

         <div class="form-group">
            <label> Description </label>
            <input type="text" name="description" v-model="description" class="form-control">
        </div>

        <div class="form-group">
            <div class="custom-file">
                <input type="file" class="custom-file-input" id="file" accept="image/*">
                <label class="custom-file-label" for="file">Choose cover photo...</label>
            </div>
        </div>

        <button class="btn btn-primary"> Update </button>
    </form>
</template>

<script>
    export default {
        data() {
            return {
                action: `/api/courses/${this.$route.params.course}`,
                course: null,
                name: '',
                description: ''
            }
        },


        methods: {
            formSubmit(e) {
                let formData = new FormData();
                formData.append('name', this.name);
                formData.append('description', this.description);
                axios.post(this.action, formData)
                    .then(response => {
                        //this.course = response.data.data;
                    })
                    .catch(err => console.log(err));
            }
        },


        created() {
            axios.get(this.action)
                 .then(response => {
                        this.course = response.data.data;
                        this.name = this.course.name;
                        this.description = this.course.description;
                    }).catch(_ => {
                        this.$router.push({name: '404'})
                    });
        }
    }
</script>

<style scoped>

</style>
