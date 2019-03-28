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
				url_params: Helper.methods.getUrlParams(),
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
				let app = this;

				axios.get(app.endpoints.get,
							{
								headers: {
									"Authorization" : "Bearer " + this.url_params.token
								}
							})
					.then(function(response) {
								app.record = response.data.data.user;
								
								delete app.record.date_created_at;
								delete app.record.date_updated_at;
								delete app.record.date_email_verified_at;
								delete app.record.deleted_at;
							})
					.catch(function(error) {
								console.log('Error', error);
							});
			}
		}
	}
</script>