<template>
  	<main-modal id="photoModal">
		  
		<template slot="custom-modal-title">
			<h4 class="modal-title">Crop Photo</h4>
			<div class="close" data-dismiss="modal" @click="close">&times;</div>
		</template>

		<template slot="custom-modal-content">
			<div class="row row-center" style="margin:0 auto">
                <div style="flex: 0 0 80%;max-width: 80%">
        			<img src="" id="crop_photo" />
				</div>
      		</div>
		</template>

		<template slot="custom-modal-footer">
            <button class="mt-0" type="submit" @click="uploadPhoto" :disabled="disabled">Save Photo</button>
        </template>

	</main-modal>
</template>

<script>
	import Cropper from 'cropperjs';

	var cropper = null;

	export default {
		data() {
			return {
				disabled: false,
				imgCrop: '',
				input: {
					photo: '',
				},
				endpoints: {
					upload: '/api/v1/user/photo'
				},
			}
		},

		created() {
			let component = this;

			$('#photoModal').on('hidden.bs.modal', function () {
				$('#upload').val('');

				component.close();
			});

			Bus.$on('imageToCrop', function (binary) {
				component.imgCrop = binary;
				component.enableCropper();
				
				$('#photoModal').modal('show');
			});
		},
		
		methods: {

			enableCropper() {
				$('#crop_photo').attr('src', this.$data.imgCrop);

				if (cropper) {
					cropper.destroy();
				}

				let image = document.getElementById('crop_photo');

				cropper = new Cropper(image, {
					viewMode: '1',
					dragMode: 'move',
					aspectRatio: 16 / 16,
					autoCropArea: 1,
					restore: false,
					guides: false,
					center: false,
					highlight: false,
					minContainerWidth: 465,
					minContainerHeight: 465,
				});
			},

			close() {
				if (cropper) {
					cropper.destroy();
				}

				$('#crop_photo').attr('src', '');
				$('#photoModal').modal('hide');
			},

			async uploadPhoto() {
				let app = this;

				this.input.photo = cropper.getCroppedCanvas().toDataURL();
				this.disabled = true;

				await axios.post(app.endpoints.upload, app.$data.input, Utils.getBearerAuth())
            
					.then(function(response) {
						let data = response.data
						
						if (data.success) {
							app.close();

							Bus.$emit('alertSuccess', data.message);
							Bus.$emit('croppedPhoto', data.data.user.profile_photo_url);
						}
					})
					.catch(function(error) {
						Utils.handleError(error);
					});	
				
				this.disabled = false;
			},
		},
	}
</script>

<style scoped>
	.cropper-view-box, .cropper-face {
		border-radius: 50%;
	}
	.cropper-container {
		margin:0 auto;
	}
</style>