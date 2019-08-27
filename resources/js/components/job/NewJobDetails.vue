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

            <form method="POST">
                <div class="form-group">
                    <div class="job-title mb-2">Job Title</div>

                    <input type="text" class="form-control" style="padding-left: 24px; margin: 0; max-width: 524px;" placeholder="Start typing"
                        v-model="input.title"
                        @keyup="onSearchJob(input.title)">

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
                    <div class="job-title mb-2">Experience Level</div>

                    <div class="me-row">
                        <select v-model="input.exp_level">
                            <option key="1" value="Entry Level">Entry Level</option>
                            <option key="2" value="Intermediate">Intermediate</option>
                            <option key="3" value="Junior">Junior</option>
                            <option key="4" value="Senior">Senior</option>
                        </select>

                        <span class="err-msg" v-if="errors.exp_level">
                            {{ errors.exp_level }}
                        </span>
                    </div>
                </div>

                <div class="form-group">
                    <div class="job-title mb-2">Contract Type</div>

                    <div class="me-row">
                        <select v-model="input.contract_type">
                            <option key="1" value="Part-Time">Part-Time</option>
                            <option key="2" value="Full-Time Permanent">Full-Time Permanent</option>
                            <option key="3" value="Fixed-Term">Fixed-Term</option>
                        </select>

                        <span class="err-msg" v-if="errors.contract_type">
                            {{ errors.contract_type }}
                        </span>
                    </div>
                </div>

                <div class="form-group">
                    <div class="job-title mb-2">Salary</div>

                    <input type="text" class="form-control" style="padding-left: 24px;"
                        v-model="input.salary" placeholder="Enter amount">

                    <span class="err-msg" v-if="errors.salary">
                        {{ errors.salary }}
                    </span>
                </div>

                <div class="form-group">
                    <div class="job-title" style="margin-bottom:-18px">Reports To</div>

                    <div class="form-group emp-row row-center"
                        v-for="(to, index) in input.reports_to"
                        :ref="'toItem-' + index"
                        :key="index">

                        <div class="comp-col-left">
                            <input class="form-control" type="text" v-model="input.reports_to[index]"
                                @keyup="onSearchReportsTo(input.reports_to[index], index)"/>
                        </div>

                        <div class="comp-col-right">
                            <span @click="removeEntity(index)">
                                <img src="/img/icons/remove.png"
                                    srcset="/img/icons/remove@2x.png 2x, /img/icons/remove@3x.png 3x"
                                    style="cursor:pointer">
                            </span>
                        </div>

                        <div class="comp-col-left" style="margin-top: 0; margin-left: -25px;"
                            v-if="reports_to_active_index == index && reports_to_job_roles && reports_to_job_roles.length > 0">

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
                    <div class="job-title mb-2">Location</div>

                    <input type="text" class="form-control" style="padding-left: 24px;"
                        v-model="input.location" placeholder="Start typing address..."
                        @keyup="onChangeLocation(input.location)">

                    <span class="err-msg" v-if="errors.location">
                        {{ errors.location }}
                    </span>
                </div>

                <div class="emp-row" style="margin-top:0" v-if="locations && locations.length > 0">
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
                job_roles: [],
                locations: [],
                input: {
                    job_role_id: '', title: '', description: '', about: '', exp_level: '',
                    contract_type: '', salary: '', reports_to: [], location: '',
                },
                errors: {
                    title: '', description: '', about: '', exp_level: '',
                    contract_type: '', salary: '', reports_to: '', location: '',
                },
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

            this.input.reports_to.push('');
        },
        methods: {
            textAreaAdjust(refName) {
                Utils.textAreaAdjust(this.$refs[refName]);
            },
            onChangeLocation(keyword) {
                if (keyword != '' && (keyword && keyword.length > 0)) {
                    this.locations = Api.getLocations(keyword);
                
                } else {
                    this.locations = [];
                }
            },
            onSelectLocation(location) {
                this.input.location = location;
                
                this.locations = [];
            },
            onSearchJob(keyword) {
                this.input.job_role_id = '';

                if (keyword != '' && (keyword && keyword.length > 0)) {
                    this.job_roles = Api.getJobRoles(keyword);

                } else {
                    this.job_roles = [];
                }
            },
            onSearchReportsTo(keyword, index) { 
                if (keyword != '' && (keyword && keyword.length > 0)) {
                    this.reports_to_job_roles = Api.getJobRoles(keyword);

                } else {
                    this.reports_to_job_roles = [];
                }

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
        }
    }
</script>