<template>
    <div class="form-group" v-if="show">
        <div class="record-title">
            {{ record.title }}
        </div>
        <div class="row" v-if="record.id != 0">
            <div class="col-md-12">
                <label class="record-label">ID</label>
                
                <input type="text" class="form-control record-input" v-model="record.id" disabled />
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <label class="record-label">TITLE</label>
                
                <input type="text" class="form-control record-input" v-model="record.title" />

                <span class="err-msg bl-ml-20" v-if="errors.title">
                    {{ errors.title }}
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

        <div class="row">
            <div class="col-md-12">
                <label class="record-label">ABOUT</label>
            </div>

            <div class="col-md-12">
                <textarea class="record-textarea" style="height:180px;border:1px solid #ced4da;" v-model="record.about"></textarea>
            </div>

            <span class="err-msg bl-ml-30" style="margin-top:-6px;" v-if="errors.about">
                {{ errors.about }}
            </span>
        </div>

        <div class="row">
            <div class="col-md-12">
                <label class="record-label">EXPERIENCE LEVEL</label>
                
                <input type="text" class="form-control record-input" v-model="record.exp_level" />

                <span class="err-msg bl-ml-20" v-if="errors.exp_level">
                    {{ errors.exp_level }}
                </span>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <label class="record-label">CONTRACT TYPE</label>
                
                <input type="text" class="form-control record-input" v-model="record.contract_type" />

                <span class="err-msg bl-ml-20" v-if="errors.contract_type">
                    {{ errors.contract_type }}
                </span>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <label class="record-label">SALARY</label>
                
                <input type="text" class="form-control record-input" v-model="record.salary" />

                <span class="err-msg bl-ml-20" v-if="errors.salary">
                    {{ errors.salary }}
                </span>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <label class="record-label">REPORTS TO</label>
                
                <input type="text" class="form-control record-input" v-model="record.reports_to" />

                <span class="err-msg bl-ml-20" v-if="errors.reports_to">
                    {{ errors.reports_to }}
                </span>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <label class="record-label">LOCATION</label>
                
                <input type="text" class="form-control record-input" v-model="record.location" />

                <span class="err-msg bl-ml-20" v-if="errors.location">
                    {{ errors.location }}
                </span>
            </div>
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
                    id: 0, title: '', description: '', about: '', exp_level: '', 
                    contract_type: '', salary: '', reports_to: [], location: '',
                },
                errors: {
                    title: '', description: '', about: '', exp_level: '', 
                    contract_type: '', salary: '', reports_to: '', location: '',
                },
				endpoints: {
                    get: '',
                    save: '', // /api/v1/company/1/jobs
				}
			}
		},
		
		created() {
			let component = this;

            Bus.$on('datatableViewJob', function(id){
                component.show = true;
                
                if (id != 0) {
                    component.endpoints.get = '/api/v1/admin/job/get?id=' + id;
                    component.endpoints.save = '' + id;
                    component.viewRecord();
                
                } else {
                    Utils.setObjectValues(component.record, '');
                    component.record.id = 0;
                    component.endpoints.save = '';
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
                            
                            component.errors.title = data.errors.title ? data.errors.title[0] : '';
                            component.errors.description = data.errors.description ? data.errors.description[0] : '';
                            component.errors.about = data.errors.about ? data.errors.about[0] : '';
                            component.errors.exp_level = data.errors.exp_level ? data.errors.exp_level[0] : '';
                            component.errors.contract_type = data.errors.contract_type ? data.errors.contract_type[0] : '';
                            component.errors.salary = data.errors.salary ? data.errors.salary[0] : '';
                            component.errors.reports_to = data.errors.reports_to ? data.errors.reports_to[0] : '';
                            component.errors.location = data.errors.location ? data.errors.location[0] : '';
                        }

                        Utils.handleError(error);
                    });

                this.disabled = false;
            },
            
        }
	}
</script>