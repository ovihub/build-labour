<template>
	<div class="form-group">
		<div class="row" v-for="(value, key) in record" :key="key.id">
			<label class="col-md-2 col-form-label text-md-left">
				{{ key.split('_').join(' ').toUpperCase() }}
			</label>

			<div class="col-md-5">
				<span class="form-control">{{ value }}</span>
			</div>
		</div>
	</div>
</template>

<script>
	export default {
		data() {
			return {
				title: '',
				record: null,
				endpoints: {
					get: '/api/v1/auth/user'
				}
			}
		},
		
		created() {
			this.viewRecord();
		},
		
		methods: {
			
			viewRecord() {
				let component = this;

				axios.get(app.endpoints.get, Utils.getBearerAuth())
					
					.then(function(response) {
						component.record = response.data.data.user;
						
						delete component.record.date_created_at;
						delete component.record.date_updated_at;
						delete component.record.date_email_verified_at;
						delete component.record.deleted_at;
					})
					.catch(function(error) {
						let data = error.response.data;

						Utils.handleError(data);
					});
			}
		}
	}
</script>