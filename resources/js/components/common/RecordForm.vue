<template>
	<main-modal :id="'modal' + title">
		
		<template slot="custom-modal-title">
			<h4 class="modal-title">{{ title.replace(/([A-Z])/g, ' $1').trim() }}</h4>
			<div class="close" data-dismiss="modal">&times;</div>
		</template>

		<template slot="custom-modal-content">
			<form class="modal-form" method="POST" @submit.prevent="submitForm">
				<div class="form-group bl-full-row" v-for="(value, key) in record" :key="key.id">
					<div class="modal-form-label">
						{{ getKeyName(key) }}
					</div>

					<input class="form-control" :id="key" :name="key" type="text" v-model="input[key]" v-if="! textArea.includes(key)" />
					
					<textarea class="form-control" v-model="input[key]" v-else-if="textArea.includes(key)"></textarea>
					
					<span class="err-msg" v-if="errors[key]">
						{{ errors[key] }}
					</span>
				</div>
			</form>
		</template>

		<template slot="custom-modal-footer">
			<button class="mt-0" type="submit" @click="submitForm" :disabled="disabled">Save Changes</button>
		</template>

	</main-modal>
</template>

<script>
	export default {
		data() {
			return {
				disabled: false,
				inputted: {},
				errors: {},
                textArea: [
					'introduction'
				],
				format: 'd MMMM yyyy',
            }
		},
        
        props: {
            title: {
                type: String,
                required: true
            },
            record: {
                type: Object,
                required: true
			},
			saveEndpoint: {
				type: String,
				required: true
			},
        },
        
		computed: {
			input() {
				return this.record;
			}
        },
		
		methods: {

			getKeyName(key) {
				return key.split('_').map(function(word) {
					return word.charAt(0).toUpperCase() + word.slice(1);
				}).join(' ');
			},

			async submitForm() {
                let component = this;

				Utils.setObjectValues(component.errors, '');
				component.inputted = component.input;
                component.disabled = true;

                await axios.post(component.saveEndpoint, component.$data.inputted, Utils.getBearerAuth())
                    
                    .then(function(response) {
                        let data = response.data;
						
						Bus.$emit(component.title, component.inputted);
						
						$('#modal' + component.title).modal('hide');
                    })
                    .catch(function(error) {
                        if (error.response) {
                            let data = error.response.data;

							for (let key in data.errors) {
								component.errors[key] = data.errors[key] ? data.errors[key][0] : '';
                            }
                        }

                        Utils.handleError(error);
                    });
                
                component.disabled = false;
            },
	 	}
	}
</script>
