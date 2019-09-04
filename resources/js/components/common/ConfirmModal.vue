<template>
	<div id="confirmModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content modal-ku">
                <div class="modal-header" style="border-bottom:none">
					<h4 class="modal-title">&#9888; Warning! Empty or unsaved changes</h4>
					<div class="close" data-dismiss="modal">&times;</div>
				</div>
				
				<div class="modal-body mb-2">
                    <center>
                        <div class="mt-3" style="width:500px;font-size:16px;color:#000">
                            If you choose not to save, any changes you made
                            will be discarded. Are you sure you want to continue?
                        </div>
                    </center>
				</div>

				<div class="modal-footer" style="border-top:none">
					<div class="btn btn-link btn-delete" @click="proceed">
                        Yes, proceed to next form
                    </div>

                    <button class="pull-right" type="button" @click="cancel">
                        Cancel
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

			}
		},
		methods: {
            proceed() {
                $('#confirmModal').modal('hide');
            },
            cancel() {
                $('#confirmModal').modal('hide');
            },
        },
        created() {
			let vm = this;

			Bus.$on('', function() {

			});
		},
	}
</script>

<style scoped>
    .modal-ku {
        width: 100%;
    }
</style>