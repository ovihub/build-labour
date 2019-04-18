<template>
	<div v-bind:class="alert" v-if="alert != 'hidden'">
		<div class="container">
			<img v-bind:src="icon" class="alert-icon" />
			{{ message }} <a class="alert-link" v-if="resend" @click="resendEmail">resend</a>
			<img src="/img/icons/alert-close.png" class="alert-close" @click="hide" />
		</div>
	</div>
</template>

<script>
	export default {
		data() {
			return {
				message: '',
				alert: 'hidden',
				icon: '',
				resend: false,
				input_resend: {
					email: '',
				},
				endpoints: {
					resend: '/api/v1/auth/verification/resend',
				}
			}
		},

    	mounted() {
			let component = this;

			Bus.$on('alertSuccess', function (message) {
				component.message = message;
				component.alert = 'alert-main alert-success alert-dismissible';
				component.icon = '/img/icons/alert-success.png';
				component.resend = false;
			});

			Bus.$on('alertError', function (message) {
				component.message = message;
				component.alert = 'alert-main alert-error alert-dismissible';
				component.icon = '/img/icons/alert-error.png';
				component.resend = false;
			});

			Bus.$on('alertVerify', function (email) {
				component.message = 'Please verify your account. You may check your confirmation email or click ';
				component.alert = 'alert-main alert-info alert-dismissible';
				component.icon = '';
				component.resend = true;
				component.input_resend.email = email;
			});

			Bus.$on('alertHide', function () {
				component.hide();
			});
		},

		methods: {

			hide() {
				this.message = ''
				this.alert = 'hidden';
				this.icon = '';
				this.resend = false;
			},
			
			async resendEmail() {
				let component = this;
				
				component.resend = false;
				component.hide();

				await axios.post(component.endpoints.resend, component.$data.input_resend, Utils.getBearerAuth())

					.then(function(response) {
						let data = response.data;
						
						component.message = data.message;
						component.alert = 'alert-main alert-success alert-dismissible';
						component.icon = '/img/icons/alert-success.png';
						component.resend = false;
					})
					.catch(function(error) {

						Utils.handleError(error);
					});
			},
		}
  	}
</script>