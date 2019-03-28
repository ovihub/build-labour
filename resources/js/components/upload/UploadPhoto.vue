<template>
    <div class="row">
        <div class="col-md-12">
            <div class="col-md-2 mb-2">
                <img :src="photo" class="img-responsive">
            </div>
            <div class="col-md-6 mb-2">
                <input type="file" v-on:change="onFileChange" class="form-control">

                <button class="btn btn-primary" @click="uploadPhoto" :disabled="disabled">Upload</button>
            </div>
            <!-- <div class="col-md-2"> -->
                <!-- <button class="btn btn-primary" @click="uploadPhoto">Upload</button> -->
            <!-- </div> -->
        </div>
    </div>
</template>

<style scoped>
    img {
        max-height: 36px;
    }
</style>

<script>
    export default {
        data() {
            return {
                disabled: false,
                photo: '',
                endpoints: {
                    upload: '/api/v1/user/photo',
                },
            }
        },

        methods: {

            async uploadPhoto() {
                let component = this;

                component.disabled = true;

                await axios.post(component.endpoints.upload, { photo: component.photo }, Utils.getBearerAuth())

                    .then(function(response) {
                        let data = response.data;

                        Bus.$emit('alertSuccess', data.message);
                    })
                    .catch(function(error) {
                        let data = error.response.data;
                        
                        Utils.handleError(data);
                    });
                
                component.disabled = false;
            },

            onFileChange(e) {
                let files = e.target.files || e.dataTransfer.files;

                if (!files.length) return;

                this.createImage(files[0]);
            },

            createImage(file) {
                let component = this;
                let reader = new FileReader();

                reader.onload = (e) => {
                    component.photo = e.target.result;
                };

                reader.readAsDataURL(file);
            },

        },

    }
</script>