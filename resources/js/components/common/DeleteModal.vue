<template>
	<div id="deleteRecordModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content modal-ku">
                <div class="modal-header" style="border-bottom:none">
					<h4 class="modal-title">Confirm Delete</h4>
					<div class="close" data-dismiss="modal">&times;</div>
				</div>
				
				<div class="modal-body" style="margin-bottom:10px">
					<form method="POST" @submit.prevent="deleteRecord">
						<input type="hidden" name="_method" value="delete" />
						<div class="emp-label">
							<center>Are you sure you want to delete this record?</center>
						</div>
					</form>
				</div>

				<div class="modal-footer" style="border-top:none">
					<div class="pull-right">
						<button type="submit" @click="deleteRecord" :disabled="disabled">Yes</button>
						<button @click="cancel">No</button>
					</div>
				</div>
			</div>
        </div>
    </div>
</template>

<script>
	export default {
		data() {
			return {
				disabled: false,
				index: '',
				action: '',
				record: {
					id: 0,
				},
				endpoints: {
					delete: '',
				}
			}
		},

		created() {
			let component = this;

			Bus.$on('deleteAboutMe', function() {
				component.action = 'AboutMe';
				component.endpoints.delete = '';
			});

			Bus.$on('deleteIdealRole', function() {
				component.action = 'IdealRole';
				component.endpoints.delete = '';
			});

			Bus.$on('deleteEmployment', function(index, endpoint) {
				component.action = 'Employment';
				component.index = index;
				component.endpoints.delete = endpoint;
			});

			Bus.$on('deleteEducation', function(index, endpoint) {
				component.action = 'Education';
				component.index = index;
				component.endpoints.delete = endpoint;
			});

			Bus.$on('deleteIndustrySkill', function(endpoint) {
				component.action = 'IndustrySkill';
				component.endpoints.delete = endpoint;
			});

			Bus.$on('deletePhoto', function(id) {
				component.action = 'Photo';
				component.endpoints.delete = '/api/v1/admin/user/photo/delete';
				component.record.id = id;
			});
		},

		methods: {
			
			async deleteRecord() {
				let component = this;

				this.disabled = true;
				
				if (this.action == 'Employment' || this.action == 'Education' || this.action == 'IndustrySkill') {

					await axios.delete(component.endpoints.delete, Utils.getBearerAuth())

						.then(function(response) {
							let data = response.data;
								
							if (data.success) {
								$('#deleteRecordModal').modal('hide');
								
								if (component.action == 'Education') {
									Bus.$emit('remove' + component.action, component.index, component.endpoints.delete.split('/').pop());
								
								} else {
									Bus.$emit('remove' + component.action, component.index);
								}
							}
						}).catch(function(error) {
							
							Utils.handleError(error);
						});
				
				} else if (this.action == 'Photo') {

					await axios.delete(component.endpoints.delete, Utils.getBearerAuth(component.$data.record))

						.then(function(response) {
							let data = response.data;
								
							if (data.success) {
								$('#deleteRecordModal').modal('hide');

								Bus.$emit('croppedPhoto', '');
							}
						}).catch(function(error) {
							
							Utils.handleError(error);
						});
				
				} else {
					$('#deleteRecordModal').modal('hide');

					Bus.$emit('remove' + component.action);
				}
				
				this.disabled = false;
			},

			cancel() {
				$('#deleteRecordModal').modal('hide');

				$('#modal' + this.action).modal('show');
			},

		}
	}
</script>

<style scoped>
    .modal-ku {
        width: 100%;
    }
</style>