<template>
    <center @click="onClickCompanyPhoto">
		<svg :class="cls" :style="svgStyle">
			<text x="50%" y="50%" text-anchor="middle" dominant-baseline="central" :style="textStyle">
				{{ input.initials }}
			</text>
    	</svg>
	</center>
</template>

<script>
	export default {
		
		data() {
			return {
				input: {
					initials: '',
					profile_photo_url: '',
				},
			}
		},

		props: {
			cls: {
				type: String,
				required: true
			},
			size: {
				type: String,
				default: '50'
			},
			border: {
				type: String,
				default: '1'
			},
			borderRadius: {
				type: String,
				default: '100%'
			},
			backgroundColor: {
				type: String,
				default: '#F0F2F4'
			},
			textColor: {
				type: String,
				default: '#A2B2B7'
			},
			initials: {
				type: String,
				required: false
			},
			companyId: {
				type: String,
				required: false
			},
		},

		computed: {
			svgStyle() {
				return {
					width: `${this.size}px`,
					height: `${this.size}px`,
					borderRadius: `${this.borderRadius}`,
					background: `${this.backgroundColor}`,
					border: `solid ${this.border}px #fff`
				};
			},

			textStyle() {
				return {
					fill: `${this.textColor}`,
					fontFamily: "'Inter'",
					fontSize: `${this.size * 0.4}px`
				};
			}
		},

		created() {
			let component = this;

			Bus.$on('avatarDetails', function(details) {
				component.input = details;
			});

			if (this.input.initials == '') {
				this.input.initials = this.initials;
			}
		},

		methods: {

			onClickCompanyPhoto() {
				if (this.companyId) {
					Utils.redirectToCompanyProfile(this.companyId);
				}
			},
			
		},
	}
</script>