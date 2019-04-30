<template>
	<div id="deleteRecordModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content modal-ku">
                <div class="modal-header" style="border-bottom:none">
					<h4 class="modal-title">Confirm Delete</h4>
					<div class="close" data-dismiss="modal">&times;</div>
				</div>
				
				<div class="modal-body">
					<form method="POST" @submit.prevent="deleteRecord">
						<input type="hidden" name="_method" value="delete" />
						<div class="emp-label">
							<center>Are you sure you want to remove this record?</center>
						</div>
					</form>
				</div>

				<div class="modal-footer" style="border-top:none">
					<div class="btn btn-link btn-delete" data-dismiss="modal">
						Cancel
					</div>

					<button class="pull-right" type="submit" @click="deleteRecord" :disabled="disabled">
						Proceed
					</button>
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
				endpoints: {
					delete: ''
				}
			}
		},

		created() {
			this.initForm();
		},

		methods: {
			
			initForm() {
				let component = this;

				Bus.$on('deleteEmployment', function(index, endpoint) {
					component.action = 'deleteEmployment';
					component.index = index;
					component.endpoints.delete = endpoint;
				});

				Bus.$on('deleteEducation', function(index, endpoint) {
					component.action = 'deleteEducation';
					component.index = index;
					component.endpoints.delete = endpoint;
				});

				Bus.$on('deleteIndustrySkill', function(endpoint) {
					component.action = 'deleteIndustrySkill';
					component.endpoints.delete = endpoint;
				});
			},

			async deleteRecord() {
				let component = this;

				this.disabled = true;
				
				await axios.delete(component.endpoints.delete, Utils.getBearerAuth())

					.then(function(response) {
						let data = response.data;
							
						if (data.success) {
							$('#deleteRecordModal').modal('hide');
							console.log(component.index)

							if (component.action == 'deleteEmployment') {
								Bus.$emit('removeEmployment', component.index);
							
							} else if (component.action == 'deleteEducation') {
								Bus.$emit('removeEducation', component.index);	
							
							} else if(component.action == 'deleteIndustrySkill') {
								Bus.$emit('removeIndustrySkill');
							}
						}
					}).catch(function(error) {
						
						Utils.handleError(error);
					});
				
				this.disabled = false;
			},
		}
	}
</script>

<style scoped>
    .modal-ku {
        width: 588px;
    }
</style>