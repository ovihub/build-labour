<template>
    <div class="profile-item-2">
        <div class="profile-content">
            
            <div class="profile-title">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                    <g fill="none" fill-rule="evenodd">
                        <path d="M0 0h24v24H0z"/>
                        <path fill="#00aeef" d="M7 5V4a2 2 0 0 1 2-2h6a2 2 0 0 1 2 2v1h4a2 2 0 0 1 2 2v7a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V7a2 2 0 0 1 2-2h4zm1.4 0h7.2v-.9a.7.7 0 0 0-.7-.7H9.1a.7.7 0 0 0-.7.7V5zM19 17h2c.818 0 1.544-.393 2-1v4a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-4c.456.607 1.182 1 2 1h2v1a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1v-1h6v1a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1v-1zm-1 0v1h-2v-1h2zM6 17h2v1H6v-1z"/>
                    </g>
                </svg>
                
                Job Details
            </div>

            <form>
                <div class="form-group">
                    <div class="job-title mb-2">Job Title</div>

                    <input type="text" class="form-control" style="margin: 0; max-width: 524px;" placeholder="Start typing"
                        v-model="input.title"
                        @keyup="onSearchJob(input.title)" @focus="onFocus('job_title')">

                    <span class="err-msg" v-if="errors.title">
                        {{ errors.title }}
                    </span>
                </div>

                <div class="form-group" style="margin-top:0" v-if="input.title && job_roles && job_roles.length > 0">
                    <ul class="list-group">
                        <li class="list-group-item" v-for="(job, idx) in job_roles" :key="idx"
                            @click="onSelectJob(job)">
                            
                            {{ job.job_role_name }}
                        </li>
                    </ul>
                </div>

                <div class="form-group">
                    <div class="job-title">Job Description</div>

                    <textarea rows="3" ref="jobDesc" class="form-control" style="overflow: hidden;"
                        placeholder="Example: The Project Manager is accountable for the leadership and management of their nominated project including the achievement of safety, quality, commercial and programme objectives and the effective day to day management of the project team."
                        @focus="textAreaAdjust('jobDesc')"
                        @keyup="textAreaAdjust('jobDesc')"
                        v-model="input.description">
                    </textarea>

                    <span class="err-msg" v-if="errors.description">
                        {{ errors.description }}
                    </span>
                </div>

                <div class="form-group">
                    <div class="job-title">About the project</div>

                    <textarea rows="2" ref="jobAbout" class="form-control" style="overflow: hidden;"
                        placeholder="Example: $730 million Residential Skycraper comprising of 941 residential apartments and 208 serviced apartments across 88 storeys."
                        @focus="textAreaAdjust('jobAbout')"
                        @keyup="textAreaAdjust('jobAbout')"
                        v-model="input.about">
                    </textarea>

                    <span class="err-msg" v-if="errors.about">
                        {{ errors.about }}
                    </span>
                </div>

                <div class="form-group">
                    <div class="job-title mb-2">Project Size</div>

                    <input type="text" class="form-control" placeholder="$ Enter amount"
                        pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$"
                        data-type="currency"
                        v-model="input.project_size"
                        @keyup="formatCurrency('project_size', $event)"
                        @focus="onFocus('project_size')"
                        @blur="formatCurrency('project_size', $event, 'blur')">

                    <span class="err-msg" v-if="errors.project_size">
                        {{ errors.project_size }}
                    </span>
                </div>

                <div class="form-group">
                    <div class="job-title mb-2">Experience Level</div>

                    <div class="me-row">
                        <!--<select v-model="input.exp_level">-->
                            <!--<option key="1" value="Entry Level">Entry Level</option>-->
                            <!--<option key="2" value="Intermediate">Intermediate</option>-->
                            <!--<option key="3" value="Junior">Junior</option>-->
                            <!--<option key="4" value="Senior">Senior</option>-->
                        <!--</select>-->
                        <input type="text" class="form-control" placeholder="Start typing"
                               v-model="input.exp_level"
                               @keyup="onSearchExpLevels(input.exp_level)">

                        <div class="emp-row" style="margin-top:0" v-if="exp_levels && exp_levels.length > 0">
                            <ul class="list-group">
                                <li class="list-group-item" v-for="(level, idx) in exp_levels" :key="idx"
                                    @click="onSelectExpLevel(level.name)">
                                    {{ level.name }}
                                </li>
                            </ul>
                        </div>

                        <span class="err-msg" v-if="errors.exp_level">
                            {{ errors.exp_level }}
                        </span>
                    </div>
                </div>

                <div class="form-group">
                    <div class="job-title mb-2">Contract Type</div>

                    <div class="me-row">
                        <select v-model="input.contract_type">
                            <option key="1" value="Full-time Permanent">Full-time Permanent</option>
                            <option key="2" value="Full-time Fixed term">Full-time Fixed term</option>
                            <option key="3" value="Part-Time">Part-Time</option>
                            <option key="4" value="Casual">Casual</option>
                            <option key="5" value="Sub Contractor">Sub Contractor (ABN required)</option>
                            <option key="6" value="Hourly Rate">Hourly Rate</option>
                        </select>

                        <span class="err-msg" v-if="errors.contract_type">
                            {{ errors.contract_type }}
                        </span>
                    </div>
                </div>

                <!--<div class="form-group">-->
                    <!--<div class="job-title mb-2">Salary</div>-->

                    <!--<input type="text" class="form-control" placeholder="$ Enter amount"-->
                        <!--pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$"-->
                        <!--data-type="currency"-->
                        <!--v-model="input.salary"-->
                        <!--@keyup="formatCurrency('salary', $event)"-->
                        <!--@blur="formatCurrency('salary', $event, 'blur')">-->

                    <!--<span class="err-msg" v-if="errors.salary">-->
                        <!--{{ errors.salary }}-->
                    <!--</span>-->
                <!--</div>-->


                <div class="form-group">

                    <div class="job-title mb-2">Salary</div>

                    <div class="input-toggle">

                        <input type="text" class="form-control" placeholder="$ Enter amount"
                               pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$"
                               data-type="currency"
                               v-model="input.salary"
                               @keyup="formatCurrency('salary', $event)"
                               @blur="formatCurrency('salary', $event, 'blur')">
                    </div>
                </div>


                <div class="form-group">
                    <div class="job-title" style="margin-bottom:-18px">Reports To</div>

                    <div class="form-group emp-row row-center"
                        v-for="(to, index) in input.reports_to"
                        :ref="'toItem-' + index"
                        :key="index">

                        <div class="job-col-left">
                            <input class="form-control" type="text" v-model="input.reports_to[index]" @focus="onFocus('reportsTo')"@keyup="onSearchReportsTo(input.reports_to[index], index)"/>
                        </div>

                        <div class="job-col-right">
                            <span @click="removeEntity(index)">
                                <img src="/img/icons/remove.png"
                                    srcset="/img/icons/remove@2x.png 2x, /img/icons/remove@3x.png 3x"
                                    style="cursor:pointer">
                            </span>
                        </div>

                        <div class="job-col-left" style="margin-top: 0; margin-left: -15px;"
                                v-if="reports_to_active_index == index &&
                                reports_to_job_roles && reports_to_job_roles.length > 0 && focusTo == 'reportsTo'">

                            <ul class="list-group">
                                <li class="list-group-item" v-for="(job, idx) in reports_to_job_roles" :key="idx"
                                    @click="onSelectReportsTo(job)">

                                    {{ job.job_role_name }}
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="btn btn-link btn-delete"  @click="addNewEntity">
                        Add new position
                    </div>
                </div>

                <div class="form-group">
                    <div class="job-title mb-2">Location (suburb/town)</div>

                    <input type="text" class="form-control" placeholder="Start typing address..."
                        v-model="input.location" @focus="onFocus('locations')"
                        @keyup="onChangeLocation(input.location)">

                    <span class="err-msg" v-if="errors.location">
                        {{ errors.location }}
                    </span>
                </div>

                <div class="emp-row" style="margin-top:0" v-if="locations && locations.length > 0 && focusTo == 'locations'">
                    <ul class="list-group">
                        <li class="list-group-item" v-for="(place, idx) in locations" :key="idx"
                            @click="onSelectLocation(place.place_name)">
                            {{ place.place_name }}
                        </li>
                    </ul>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
    import Api from '@/api';

    export default {
        name: "new-job-details",
        data() {
            return {
                reports_to_active_index: 0,
                reports_to_job_roles: [],
                exp_levels: [],
                job_roles: [],
                locations: [],
                input: {
                    id: '', is_template: '', status: '', template_name: '',
                    job_role_id: '', title: '', description: '', about: '', project_size: '',
                    exp_level: '', contract_type: '', salary: '', salary_type: 'Salary', reports_to: [], location: '',
                },
                errors: {
                    title: '', description: '', about: '', exp_level: '',
                    contract_type: '', salary: '', reports_to: '', location: '',
                },
                salaryType: 'Salary',
                salaryPlaceholder: 'Salary per annum',
                leaveTimeoutHandler: null,
                focusTo: null
            }
        },
        created() {
            let vm = this;

            Bus.$on('saveJob', function() {
                Bus.$emit('newJobDetails', vm.input);
            });

            Bus.$on('newJobDetailsError', function(errors) {
                vm.errors = errors;
            });

            Bus.$on('jobDetails', function(details) {

                if (details) {

                    vm.input.id = details.id;
                    vm.input.is_template = details.is_template;
                    vm.input.status = details.status;
                    vm.input.template_name = details.template_name;
                    vm.input.title = details.title ? details.title : details.job_role.job_role_name;
                    vm.input.description = details.description;
                    vm.input.about = details.about;
                    vm.input.project_size = details.project_size;
                    vm.input.exp_level = details.exp_level;
                    vm.input.contract_type = details.contract_type;
                    vm.input.salary = details.salary;
                    vm.input.salary_type = details.salary_type ? details.salary_type : details.salary_type;
                    vm.input.reports_to = details.reports_to ? details.reports_to : [ '' ];
                    vm.input.location = details.location;

                    let vm2 = vm;

                    Bus.$emit('editJobPost', vm2.input.template_name, vm2.input.status, vm2.input.is_template);
                }
            });

            Bus.$on('clearNewJobDetails', () => {

                this.reports_to_job_roles = [];
                this.locations = [];
            });

            this.input.reports_to.push('');
        },
        methods: {
            formatCurrency(field, e, blur = null) {
                this.input[field] = Utils.formatCurrency(e, blur);
            },
            textAreaAdjust(refName) {
                Utils.textAreaAdjust(this.$refs[refName]);
            },
            onFocus(type) {

                this.focusTo = type;

                this.reports_to_job_roles = [];
                this.locations = [];

                Bus.$emit('clearNewJobRequirements');
                Bus.$emit('clearNewJobResponsibilities');
            },
            onChangeLocation(keyword) {

                if (keyword && keyword.length > 0) {

                    Promise.resolve(Api.getLocationsPromise(keyword)).then((data) => {

                        this.locations = (data.data && data.data.locations) ? data.data.locations.features : [];
                    });

                } else {

                    this.locations = [];
                }
            },
            onSelectSalaryType(type) {

                this.input.salary_type = type;

                this.salaryPlaceholder = this.input.salary_type === 'Salary' ? 'Salary per annum' : 'Wage per hour';

            },
            onSelectLocation(location) {
                this.input.location = location;
                
                this.locations = [];
            },
            onSearchJob(keyword) {
                this.input.job_role_id = '';

                this.job_roles = (keyword && keyword.length > 0) ? Api.getJobRoles(keyword) : [];
            },
            onSearchReportsTo(keyword, index) { 
                this.reports_to_job_roles = (keyword && keyword.length > 0) ? Api.getJobRoles(keyword) : [];

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
            onSelectExpLevel(levelName) {

                this.input.exp_level = levelName;

                this.exp_levels = [];
            },
            onSearchExpLevels(keyword) {

                if (keyword && keyword.length > 0) {

                    let expLevels = [
                        {id: 1, name: "Entry Level"},
                        {id: 2, name: "Intermediate"},
                        {id: 3, name: "Junior"},
                        {id: 4, name: "Senior"}
                    ];

                    this.exp_levels = expLevels;

                    return this.exp_levels;
                }

                this.exp_levels = [];

                return [];
            },
            addNewEntity() {
                this.input.reports_to = this.input.reports_to.filter(r => r !== '');

                this.input.reports_to.push('');
            },
            removeEntity(index) {
                if (this.input.reports_to.length > 1) {
                    this.input.reports_to.splice(index, 1);
                }

                if (this.input.reports_to.length <= 1) {
                    this.input.reports_to = [];
                    this.input.reports_to.push('');
                }
            },
        }
    }
</script>