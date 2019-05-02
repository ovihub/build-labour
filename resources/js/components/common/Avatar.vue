<template>
    <center>
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
		},

		computed: {
			svgStyle() {
				return {
					width: `${this.size}px`,
					height: `${this.size}px`,
					borderRadius: '100%',
					background: '#F0F2F4',
					border: `solid ${this.border}px #fff`
				};
			},

			textStyle() {
				return {
					fill: '#A2B2B7',
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
		},
	}
</script>