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
		name: "delete-modal",
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
			let vm = this;

			Bus.$on('deleteAboutMe', function() {
				vm.action = 'AboutMe';
				vm.endpoints.delete = '';
			});

			Bus.$on('deleteIdealRole', function() {
				vm.action = 'IdealRole';
				vm.endpoints.delete = '';
			});

			Bus.$on('deleteEmployment', function(index, endpoint) {
				vm.action = 'Employment';
				vm.index = index;
				vm.endpoints.delete = endpoint;
			});

			Bus.$on('deleteEducation', function(index, endpoint) {
				vm.action = 'Education';
				vm.index = index;
				vm.endpoints.delete = endpoint;
			});

			Bus.$on('deleteIndustrySkill', function(endpoint) {
				vm.action = 'IndustrySkill';
				vm.endpoints.delete = endpoint;
			});

			Bus.$on('deleteTicket', function(endpoint) {
				vm.action = 'Ticket';
				vm.endpoints.delete = endpoint;
			});

			Bus.$on('deletePhoto', function(id) {
				vm.action = 'Photo';
				vm.endpoints.delete = '/api/v1/admin/user/photo/delete';
				vm.record.id = id;
			});
			
			Bus.$on('deleteJob', function(endpoint) {
				vm.action = 'Job';
				vm.endpoints.delete = endpoint;
			});

			Bus.$on('deleteJobPost', function(endpoint) {
				vm.action = 'JobPost';
				vm.endpoints.delete = endpoint;
			});
		},

		methods: {
			
			async deleteRecord() {
				let vm = this;

				this.disabled = true;
				
				if (this.action == 'Employment' || this.action == 'Education' || this.action == 'IndustrySkill' ||
					this.action == 'Ticket' || this.action == 'Job' || this.action == 'JobPost') {

					await axios.delete(vm.endpoints.delete, Utils.getBearerAuth())

					.then(function(response) {
						let data = response.data;
							
						if (data.success) {
							$('#deleteRecordModal').modal('hide');
							
							if (vm.action == 'Education') {
								Bus.$emit('remove' + vm.action, vm.index, vm.endpoints.delete.split('/').pop());
							
							} else {
								Bus.$emit('remove' + vm.action, vm.index);
							}
						}
					
					}).catch(function(error) {
						
						Utils.handleError(error);
					});
				
				} else if (this.action == 'Photo') {

					await axios.delete(vm.endpoints.delete, Utils.getBearerAuth(vm.$data.record))

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

					Bus.$emit('remove' + vm.action);
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