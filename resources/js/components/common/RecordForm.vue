<template>
	<main-modal :id="'modal' + title">
		
		<template slot="custom-modal-title">
			<h4 class="modal-title">{{ title.replace(/([A-Z])/g, ' $1').trim() }}</h4>
			<div class="close" data-dismiss="modal">&times;</div>
		</template>

		<template slot="custom-modal-content">
			<form method="POST" @submit.prevent="submitForm">
				<div class="form-group row" v-for="(value, key) in record" :key="key.id">
					<label class="col-md-4 col-form-label text-md-left">
						{{ getKeyName(key) }}
					</label>

					<div class="col-md-8">
						<input class="form-control" :id="key" :name="key" type="text" v-model="input[key]" v-if="! textArea.includes(key) && ! datePicker.includes(key)" />
						
						<textarea class="form-control" v-model="input[key]" v-else-if="textArea.includes(key)"></textarea>
						
						<datepicker input-class="form-control" :id="key" :name="key" :format="format" v-model="input[key]" v-else-if="datePicker.includes(key)"></datepicker>
						
						<span class="err-msg" v-if="errors[key]">
							{{ errors[key] }}
						</span>
					</div>
				</div>
				<div class="bl-mt13"></div>
				<button class="pull-right" type="submit" :disabled="disabled">Save</button>
			</form>
		</template>

	</main-modal>
</template>

<script>
	import Datepicker from 'vuejs-datepicker';

	export default {
		data() {
			return {
				disabled: false,
				inputted: {},
				errors: {},
                textArea: [
					'introduction'
				],
				datePicker: [
					'date_of_birth',
					'start_date',
					'end_date'
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
		
		components: {
            Datepicker
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
