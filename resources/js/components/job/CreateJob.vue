<template>
    <div class="profile-item-2">
        <div class="profile-content">
            
            <div class="bl-label-20-style-2">
                Create Job
            </div>

            <div class="emp-row mt-3">
                <input type="text" class="form-control"
                    style="padding: 12px; font-size: 13px; border-radius: 4px; border: solid 1px rgba(0, 0, 0, 0.07); background-color: #ffffff; height: 46px; color: #acbbbf;"
                    placeholder="Enter Name to save as a template"
                    v-model="template_name">
            </div>

            <div class="btn btn-link btn-delete mb-2">
                    Save as new template
                </div>

            <button style="width:100%" :disabled="disabled" @click="useTemplate()">
                Post Job
            </button>
        </div>
    </div>
</template>

<script>
    import Api from '@/api';

    export default {
        name: "create-job",
        data() {
            return {
                disabled: false,
                show: true,
                reports_to_active_index: 0,
                reports_to_job_roles: [],
                job_roles: [],
                locations: [],
                job_role: '',
                title: '',
                description: '',
                about: '',
                exp_level: '',
                contract_type: '',
                salary: '',
                reports_to: [],
                location: '',
                template_name: '',
                input: {
                    job_role_id: '', title: '', description: '', about: '', exp_level: '',
                    contract_type: '', salary: '', reports_to: [], location: '',
                },
                errors: {
                    title: '', description: '', about: '', exp_level: '',
                    contract_type: '', salary: '', reports_to: '', location: '',
                },
                endpoints: {
                    post: '/api/v1/job',
                    save: '/api/v1/job/save-template',
                },
            }
        },
        created() {
            let component = this;

            Bus.$on('jobDetails', function(details) {
                if (details) {
                    component.title = details.title ? details.title : details.job_role.job_role_name;
                    component.description = details.description;
                    component.about = details.about;
                    component.exp_level = details.exp_level;
                    component.contract_type = details.contract_type;
                    component.salary = details.salary;
                    component.reports_to = details.reports_to;
                    component.location = details.location;
                
                } else {
                    component.show = false;
                }
            });

            Bus.$on('postJob', function(isTemplate) {
                if (isTemplate) {
                    component.submit(component.endpoints.save)
                
                } else {
                    component.submit(component.endpoints.post);
                }
            });

            this.input.reports_to.push('');
        },
        methods: {
            textAreaAdjust(refName) {
                Utils.textAreaAdjust(this.$refs[refName]);
            },
            onChangeLocation(keyword) {
                let component = this;

                Promise.resolve(Api.getLocations(keyword)).then(function(data) {
                    component.locations = (keyword != '' && (keyword && keyword.length > 0) && 
                                            data.data && data.data.locations && data.data.locations.features) ? 
                                            data.data.locations.features : [];
                });
            },
            onSelectLocation(location) {
                this.input.location = location;
                
                this.locations = [];
            },
            onSearchJob(keyword) {
                this.input.job_role_id = '';

                let component = this;
                
                Promise.resolve(Api.getJobRoles(keyword)).then(function(data) {
                    component.job_roles = data.data ? data.data.job_roles : [];
                });
            },
            onSearchReportsTo(keyword, index) { 
                let component = this;
                
                Promise.resolve(Api.getJobRoles(keyword)).then(function(data) {
                    component.reports_to_job_roles = data.data ? data.data.job_roles : [];
                });

                this.reports_to_active_index = index;
            },
            onSelectReportsTo(job) {
                this.input.reports_to[this.reports_to_active_index] = job.job_role_name;

                this.reports_to_job_roles = [];
            },
            onSelectJob(job) {
                this.input.job_role_id = job.id;
                this.input.title = job.job_role_name;

                this.job_roles = [];
            },
            addNewEntity() {
                this.input.reports_to = this.input.reports_to.filter(r => r !== '');

                this.input.reports_to.push('');
            },
            removeEntity(index) {
                if (this.input.reports_to.length > 1) {
                    this.input.reports_to.splice(index, 1);
                }
            },
            async submit(endpoint) {
                let component = this;

                Utils.setObjectValues(this.errors, '');
                
                await axios.post(endpoint, component.$data.input, Utils.getBearerAuth())
                    
                .then(function(response) {
                    let data = response.data,
                        job = data.data.job;
                    
                    if (job.is_template) {
                        Bus.$emit('alertSuccess', data.message);
                        
                        Utils.setObjectValues(component.input, '');

                    } else {
                        window.location.href = '/job/view?cid=' + job.company_id + '&jid=' + job.id;
                    }
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

                Bus.$emit('postedJob');
            },
        }
    }
</script>