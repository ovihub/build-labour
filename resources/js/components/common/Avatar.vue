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
	import Api from '@/api';

	export default {
		
		data() {
			return {
				input: {
					initials: '',
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
			isLogout: {
				type: Boolean,
				required: false
			}
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

			component.input.initials = component.initials;

			if (! this.isLogout) {
				Bus.$on('profileAvatarDetails', function(initials) {
					component.input.initials = initials;

					if (component.initials) {
						component.input.initials = component.initials;
					}
				});
			
			} else if (this.isLogout) {
				this.input.initials = Api.getNavAvatar().initials;
			
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