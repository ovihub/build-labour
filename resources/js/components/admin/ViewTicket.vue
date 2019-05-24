<template>
    <div class="form-group" v-if="show">
        <div class="record-title">
            {{ record.ticket }}
        </div>
        <div class="row" v-if="record.id != 0">
            <div class="col-md-12">
                <label class="record-label">ID</label>
                
                <input type="text" class="form-control record-input" v-model="record.id" disabled />
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <label class="record-label">TICKET</label>
                
                <input type="text" class="form-control record-input" v-model="record.ticket" />

                <span class="err-msg bl-ml-20" v-if="errors.ticket">
                    {{ errors.ticket }}
                </span>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <label class="record-label">DESCRIPTION</label>
            </div>

            <div class="col-md-12">
                <textarea class="record-textarea" style="height:180px;border:1px solid #ced4da;" v-model="record.description"></textarea>
            </div>

            <span class="err-msg bl-ml-30" style="margin-top:-6px;" v-if="errors.description">
                {{ errors.description }}
            </span>
        </div>

        <div class="form-group row mt-5">
            <div class="col-md-12">
                <button type="submit" @click="submit" :disabled="disabled">
                    Save Changes
                </button>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
		data() {
			return {
                disabled: false,
                show: false,
				record: {
                    id: 0, ticket: '', description: '',
                },
                errors: {
                    ticket: '', description: '',
                },
				endpoints: {
                    get: '',
                    save: '',
				}
			}
		},
		
		created() {
			let component = this;

            Bus.$on('datatableViewTicket', function(id){
                component.show = true;

                if (id != 0) {
                    component.endpoints.get = '/api/v1/admin/ticket/get?id=' + id;
                    component.endpoints.save = '/api/v1/user/ticket/' + id;
                    component.viewRecord();
                
                } else {
                    Utils.setObjectValues(component.record, '');
                    component.record.id = 0;
                    component.endpoints.save = '/api/v1/user/ticket';
                }
            });
		},
		
		methods: {
			
		  	viewRecord() {
				let component = this;

				axios.get(component.endpoints.get, Utils.getBearerAuth())

                    .then(function(response) {
                        
                        component.record = response.data.data.record;
                    })
                    .catch(function(error) {
                        
                        Utils.handleError(error);
                    });
            },

            async submit() {
                let component = this;

                Utils.setObjectValues(component.errors, '');

                this.disabled = true;

                await axios.post(component.endpoints.save, component.$data.record, Utils.getBearerAuth())

                    .then(function(response) {

                        Bus.$emit('adminSaveChanges');
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

                this.disabled = false;
            },
            
        }
	}
</script>