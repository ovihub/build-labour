export default {

    data() {
        return {
            url_params: Helper.methods.getUrlParams(),
            photo: '',
            endpoints: {
                uploadPhoto: '/api/v1/user/photo',
            },
        }
    },

    methods: {

        uploadPhoto() {
            axios.post(this.endpoints.uploadPhoto,
                        {
                            photo: this.photo
                        },
                        {
                            headers: {
                                "Authorization" : "Bearer " + this.url_params.token
                            }
                        })
                 .then(function(response) {
                        let data = response.data;

                        Bus.$emit('alertSuccess', data.message);
                    })
                 .catch(function(error) {
                        let data = error.response.data;
                        
                        Bus.$emit('alertSuccess', data.message);
                    });
        },

        onFileChange(e) {
            let files = e.target.files || e.dataTransfer.files;

            if (!files.length)
                return;

            this.createImage(files[0]);
        },

        createImage(file) {
            let vm = this;
            let reader = new FileReader();

            reader.onload = (e) => {
                vm.photo = e.target.result;
            };

            reader.readAsDataURL(file);
        },

    },

}