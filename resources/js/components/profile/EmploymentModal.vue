<template>
    <main-modal id="modalEmployment">

        <template slot="custom-modal-title">
            <h4 class="modal-title">{{ current == -1 ? 'Add' : 'Edit' }} Employment History</h4>
            <div class="close" data-dismiss="modal" @click="close">&times;</div>
        </template>

        <template slot="custom-modal-content">
            <form class="modal-form" method="POST" @submit.prevent="submit">
                <div class="emp-label">Job Details</div>
                
                <div class="form-group">
                    <div class="emp-row">
                        <div class="modal-form-label">Your Role</div>
                        <input class="form-control" type="text" v-model="job_role" />
                        <span class="err-msg" v-if="errors.job_role">
                            {{ errors.job_role }}
                        </span>
                    </div>

                    <div class="emp-row">
                        <div class="modal-form-label">Company/Project Name</div>

                        <input class="form-control" type="text" v-model="company_name"
                            @keyup="onSearchCompany(company_name, 1)"/>

                        <span class="err-msg" v-if="errors.company_name">
                            {{ errors.company_name }}
                        </span>
                    </div>

                    <div class="emp-row" style="margin-top:0" v-if="companies.length > 0">
                        <ul class="list-group">
                            <li class="list-group-item" v-for="(company, idx) in companies" :key="idx"
                                @click="onSelectCompany(company)">
                                {{ company.name }}
                            </li>
                        </ul>
                    </div>

                    <div class="emp-row">
                        <div class="modal-form-label">Location</div>
                        <input class="form-control" type="text" v-model="location" @keyup="onChangeLocation(location)" />
                        <span class="err-msg" v-if="errors.location">
                            {{ errors.location }}
                        </span>
                    </div>

                    <div class="emp-row" style="margin-top:0" v-if="locations.length > 0">
                        <ul class="list-group">
                            <li class="list-group-item" v-for="(place, idx) in locations" :key="idx"
                                @click="onSelectLocation(place.place_name)">
                                {{ place.place_name }}
                            </li>
                        </ul>
                    </div>

                    <div class="emp-row">
                        <div class="modal-form-label">Size of the Project</div>
                        <input class="form-control" type="text" v-model="project_size"/>
                        <span class="err-msg" v-if="errors.project_size">
                            {{ errors.project_size }}
                        </span>
                    </div>
                </div>

                <div class="emp-label">Duration of Employment</div>
                <div class="emp-row" style="margin-top:36px">
                    <div class="emp-col-left">
                        <div class="emp-form-label">Start Month</div>
                        <select v-model="start_month">
                            <option v-for="month in months" :key="month.id" v-bind:value="month.id">{{ month.name }}</option>
                        </select>
                        <span class="err-msg" v-if="errors.start_month">
                            {{ errors.start_month }}
                        </span>
                    </div>
                    <div class="emp-col-right">
                        <div class="emp-form-label">Start Year</div>
                        <select v-model="start_year">
                            <option v-for="(year, index) in years" :key="index" v-bind:value="year">{{ year }}</option>
                        </select>
                        <span class="err-msg" v-if="errors.start_year">
                            {{ errors.start_year }}
                        </span>
                    </div>
                </div>

                <div class="emp-row" v-if="! isCurrent">
                    <div class="emp-col-left">
                        <div class="emp-form-label">End Month</div>
                        <select v-model="end_month">
                            <option v-for="month in months" :key="month.id" v-bind:value="month.id">{{ month.name }}</option>
                        </select>
                        <span class="err-msg" v-if="errors.end_month">
                            {{ errors.end_month }}
                        </span>
                    </div>

                    <div class="emp-col-right">
                        <div class="emp-form-label">End Year</div>
                        <select v-model="end_year">
                            <option v-for="(year, index) in years" :key="index" v-bind:value="year">{{ year }}</option>
                        </select>
                        <span class="err-msg" v-if="errors.end_year">
                            {{ errors.end_year }}
                        </span>
                    </div>
                </div>

                <div class="emp-row">
                    <div class="emp-label" style="margin-top:0">
                        <input class="styled-checkbox-2" id="styled-checkbox-current-2" type="checkbox"
                            ref="styled-checkbox-2"
                            v-model="isCurrent"
                            @change="onChangeCurrentRole" />
                        <label for="styled-checkbox-current-2">Currently in this Role</label>
                    </div>
                </div>

                <div class="emp-label" style="margin-bottom:17px">Responsibilities</div>

                <textarea class="form-control" rows="1" style="overflow:hidden"
                    :ref="'respItem-' + index" 
                    @focus="textAreaAdjust(index)"
                    @keyup="onChangeResponsibilities(index)"
                    v-for="(res, index) in responsibilities"
                    :key="index"
                    v-model="responsibilities[index]"
                    placeholder="Add Another Responsibility">
                </textarea>
            </form>
        </template>

        <template slot="custom-modal-footer">
            <div class="btn btn-link btn-delete" data-dismiss="modal" v-if="current != -1" @click="deleteRecord">
                Delete
            </div>

            <button class="pull-right" type="submit" @click="submit" :disabled="disabled">
                Save Changes
            </button>
        </template>

    </main-modal>
</template>

<script>
    export default {
        data() {
            return {
                disabled: false,
                months: Utils.getMonths(),
                years: Utils.getYears(),
                current: -1,
                locations: [],
                companies: [],
                time_out: false,
                /**
                 * Save Input
                 */
                id: '',
                job_role: '',
                company_name: '',
                location: '',
                project_size: '',
                isCurrent: '',
                start_month: '',
                start_year: '',
                end_month: '',
                end_year: '',
                responsibilities: [],
                errors: {
                    job_role: '', company_name: '', location: '', project_size: '', isCurrent: '',
                    start_month: '', start_year: '', end_month: '', end_year: '', responsibilities: [],
                },
                endpoints: {
                    save: '/api/v1/work/experience',
                    delete: '/api/v1/work/experience/',
                    locations: '/api/v1/locations',
                    companies: '/api/v1/company/search'
                },
            }
        },

        created() {
            let component = this;

            Bus.$on('showEmployment', function(index, details) {
                component.current = index;
                component.setValues(details);
            });
        },

        methods: {

            setValues(details) {
                this.id = details ? details.id : '';
                this.job_role = details ? details.job_role : '';
                this.company_name = details ? details.company_name : '';
                this.location = details ? details.location : '';
                this.project_size = details ? details.project_size : '';
                this.isCurrent = details ? details.isCurrent : '';
                this.start_month = details ? details.start_month : '';
                this.start_year = details ? details.start_year : '';
                this.end_month = details ? details.end_month : '';
                this.end_year = details ? details.end_year : '';
                this.responsibilities = details ? details.responsibilities : [];
                
                this.responsibilities = this.responsibilities.filter(r => r!=='');
                this.responsibilities.push('');
            },

            close() {
                this.current = -1;

                Utils.setObjectValues(this.errors, '');
            },

            textAreaAdjust(index) {
                let o = index == -1 ? this.$refs['respItem-' + index] : this.$refs['respItem-' + index][0];
                o.style.height = (o.scrollHeight) + 'px';
            },

            onChangeCurrentRole() {
                if (this.isCurrent == 1) {
                    this.end_year = null;
                    this.end_month = null;
                }
            },

            onChangeResponsibilities(index) {
                this.textAreaAdjust(index);

                this.responsibilities = this.responsibilities.filter(r => r!=='');
                this.responsibilities.push('');
            },

            onChangeLocation(location) {
                let component = this;

                if (location.length <= 0) {
                    this.locations = [];
                }

                if (this.time_out) {
                    clearTimeout(this.time_out);
                }

                this.time_out = setTimeout(function() {

                    axios.get(this.endpoints.locations + "?keyword=" + location, Utils.getBearerAuth())

                        .then(function(response) {
                            let data = response.data;

                            component.locations = (location != '') ? data.data.locations.features : [];
                        })
                        .catch(function(error) {

                            Utils.handleError(error);
                        });

                }.bind(this), 300);
            },

            onSearchCompany(keyword) {
                let component = this;

                if (keyword.length <= 0) {
                    this.companies = [];
                }

                if (this.time_out) {
                    clearTimeout(this.time_out);
                }

                this.time_out = setTimeout(function() {

                    axios.get(this.endpoints.companies + "?keyword=" + keyword, Utils.getBearerAuth())

                        .then(function(response) {

                            component.companies = (keyword != '') ? response.data.data.companies : []
                        })
                        .catch(function(error) {

                            Utils.handleError(error);
                        });
                }.bind(this), 300);
            },

            onSelectLocation(location) {
                this.location = location;
                
                this.locations = [];
            },

            onSelectCompany(company) {
                this.company_id = company.id;
                this.company_name = company.name;

                this.companies = [];
            },

            deleteRecord() {
                $('#deleteRecordModal').modal('show');

                Bus.$emit('deleteEmployment', this.current, this.endpoints.delete + this.id);
            },
            
            async submit() {
                let component = this;
                let saveEndpoint = this.id == 0 ? this.endpoints.save : this.endpoints.save + '/' + this.id;

                for (let i = 0; i < this.responsibilities.length; i++) {
                    this.responsibilities[i] = this.$refs['respItem-' + i][0].value;
                }

                if (! this.end_year && ! this.end_month) {
                    this.isCurrent = 1;
                }

                let saveInput = {
                    job_role: this.job_role,
                    company_name: this.company_name,
                    location: this.location,
                    project_size: this.project_size,
                    isCurrent: this.isCurrent,
                    start_month: this.start_month,
                    start_year: this.start_year,
                    end_month: this.end_month,
                    end_year: this.end_year,
                    responsibilities: this.responsibilities
                };

                Utils.setObjectValues(this.errors, '');
                this.disabled = true;

                await axios.post(saveEndpoint, saveInput, Utils.getBearerAuth())

                    .then(function(response) {
                        let data = response.data;

                        $('#modalEmployment').modal('hide');
                        
                        Bus.$emit('updateEmployment', component.current, data.data.work_experience);
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