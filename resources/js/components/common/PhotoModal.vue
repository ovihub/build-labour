<template>
  	<main-modal id="photoModal" data-backdrop="static" data-keyboard="false">
		  
		<template slot="custom-modal-title">
			<h4 class="modal-title">Crop Photo</h4>
			<div class="close" data-dismiss="modal" @click="close">&times;</div>
		</template>

		<template slot="custom-modal-content">
			<div class="row row-center" style="margin:0 auto">
                <div style="flex: 0 0 79%;max-width: 79%">
        			<img src="" id="crop_photo" />
				</div>
      		</div>
		</template>

		<template slot="custom-modal-footer">
            <button class="pull-right" type="submit" @click="uploadPhoto" :disabled="disabled">Save Photo</button>
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
				isAdmin: false,
				imgCrop: '',
				input: {
					id: 0,
					photo: '',
				},
				endpoints: {
					upload: '',
				},
			}
		},

		created() {
			let component = this;

			$('#photoModal').on('hidden.bs.modal', function () {
				$('#upload').val('');

				component.close();
			});

			Bus.$on('imageToCrop', function (binary, id) {
				if (id) {
					component.isAdmin = true;
					component.input.id = id;
					component.endpoints.upload = '/api/v1/admin/user/upload';
				
				} else {
					component.endpoints.upload = '/api/v1/user/photo';
				}

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

				Bus.$emit('closePhotoModal');
			},

			async uploadPhoto() {
				let component = this;

				this.input.photo = cropper.getCroppedCanvas().toDataURL('image/jpeg', (20 / 100));
				
				this.disabled = true;

				await axios.post(component.endpoints.upload, component.$data.input, Utils.getBearerAuth())
            
					.then(function(response) {
						let data = response.data
						
						if (data.success) {
							component.close();

							if (! component.isAdmin) {
								window.location.href = '/user/profile';
							
							} else {
								Bus.$emit('alertSuccess', data.message);
								Bus.$emit('croppedPhoto', data.data.user.profile_photo_url);
							}
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