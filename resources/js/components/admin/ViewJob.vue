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
                <label class="record-label">JOB ROLE</label>

                <select style="margin:0" class="form-control record-input" @change="onChange($event)" v-model="record.job_role_id">
                    <option v-for="role in job_roles" :value="role.id">{{ role.job_role_name }}</option>
                </select>
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
                
                <input type="text" class="form-control record-input" v-model="record.reports_to_str" />

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
                    contract_type: '', salary: '', reports_to: [], reports_to_str: '', location: '',
                },
                errors: {
                    title: '', description: '', about: '', exp_level: '', 
                    contract_type: '', salary: '', reports_to: '', location: '',
                },
                job_roles: [],
				endpoints: {
                    get: '',
                    save: '',
                    job_roles: '/api/v1/admin/job/roles'
				}
			}
		},
		
		created() {
			let component = this;

            Bus.$on('datatableViewJob', function(id){
                component.show = true;

                if (id != 0) {
                    component.endpoints.get = '/api/v1/admin/job/get?id=' + id;
                    component.endpoints.save = '/api/v1/job/' + id;
                    
                    component.viewRecord();
                
                } else {
                    Utils.setObjectValues(component.record, '');

                    component.endpoints.save = '/api/v1/job';
                }
            });

            axios.get(component.endpoints.job_roles, Utils.getBearerAuth())

                .then(function(response) {

                    console.log(response);
                    component.job_roles = response.data.data.job_roles;
                    console.log(component.job_roles);
                })
                .catch(function(error) {

                    Utils.handleError(error);
                });
		},
		
		methods: {
			
		  	viewRecord() {
				let component = this;

				axios.get(component.endpoints.get, Utils.getBearerAuth())

                    .then(function(response) {
                        
                        component.record = response.data.data.record;

                        if (component.record.job_role) {

                            component.record.title = component.record.job_role.job_role_name;
                        }
                    })
                    .catch(function(error) {
                        
                        Utils.handleError(error);
                    });
            },

            onChange(event) {

                let findById = parseInt(event.target.value);

                let findRole = this.job_roles.find(x => x.id === findById);

                if (findRole) {

                    this.record.title = findRole.job_role_name;
                }
            },

            async submit() {
                let component = this;

                Utils.setObjectValues(this.errors, '');

                this.disabled = true;
                
                let results = this.record.reports_to_str.split(',');
                
                this.record.reports_to = [];
                
                for (let i = 0; i < results.length; i++) {
                    this.record.reports_to.push(results[i].trim());
                }

                await axios.post(component.endpoints.save, component.$data.record, Utils.getBearerAuth())

                    .then(function(response) {

                        Bus.$emit('adminSaveChanges', component.record.id);
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