<template>
    <div class="profile-item-2">
        <div class="profile-content">
            
            <!-- <span class="edit-icon"
                data-toggle="modal"
                data-backdrop="static"
                data-keyboard="false"
                data-target="#modalJobDetails">

                <img src="/img/icons/editbutton.png"
                    srcset="/img/icons/editbutton@2x.png 2x, /img/icons/editbutton@3x.png 3x">
            </span> -->
            
            <div class="profile-title">
                <img src="/img/icons/jobdetails.png"
                    srcset="/img/icons/jobdetails@2x.png 2x, /img/icons/jobdetails@3x.png 3x">
                
                Job Details
            </div>

            <div v-if="show">
                <div class="job-header" v-if="title">
                    {{ title }}
                </div>

                <div v-if="description">
                    <div class="job-title">Job Description</div>
                    <div class="job-body">
                        {{ description }}
                    </div>
                </div>

                <div v-if="about">
                    <div class="job-title">About the Project</div>
                    <div class="job-body">
                        {{ about }}
                    </div>
                </div>

                <div v-if="exp_level">
                    <div class="job-title">Experience Level</div>
                    <div class="job-body">
                        {{ exp_level }} 
                    </div>
                </div>

                <div v-if="contract_type">
                    <div class="job-title">Contract type</div>
                    <div class="job-body">
                        {{ contract_type }}
                    </div>
                </div>

                <div v-if="salary">
                    <div class="job-title">Salary</div>
                    <div class="job-body">
                        $ - - - , - - - 
                    </div>
                </div>

                <div v-if="reports_to && reports_to.length > 0">
                    <div class="job-title">Reports to</div>
                    <div class="job-body">
                        <ul class="job-list-items-2">
                            <li v-for="(item, index) in reports_to" :key="index">
                                {{ item }}
                            </li>
                        </ul>
                    </div>
                </div>

                <div v-if="location">
                    <div class="job-title">Location</div>
                    <div class="job-body">
                        {{ location }}
                    </div>
                </div>
            </div>

            <div v-else>
                <form method="POST">
                    <div class="form-group">
                        <div class="job-title mb-2">Job Title</div>

                        <input type="text" class="form-control" style="padding-left:24px"
                            v-model="input.title" placeholder="Start typing" required autofocus>

                        <span class="err-msg" v-if="errors.title">
                            {{ errors.title }}
                        </span>
                    </div>

                    <div class="form-group">
                        <div class="job-title">Job Description</div>

                        <textarea rows="5" ref="jobDesc" class="form-control" style="overflow:hidden"
                            placeholder="Example: The Project Manager is accountable for the leadership and management of their nominated project including the achievement of safety, quality, commercial and programme objectives and the effective day to day management of the project team."
                            @keyup="textAreaAdjust('jobDesc')" v-model="input.description"></textarea>

                        <span class="err-msg" v-if="errors.description">
                            {{ errors.description }}
                        </span>
                    </div>

                    <div class="form-group">
                        <div class="job-title">About the project</div>

                        <textarea rows="3" ref="jobAbout" class="form-control" style="overflow:hidden"
                            placeholder="Example: $730 million Residential Skycraper comprising of 941 residential apartments and 208 serviced apartments across 88 storeys."
                            @keyup="textAreaAdjust('jobAbout')" v-model="input.about"></textarea>

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

                        <input type="text" class="form-control" style="padding-left:24px"
                            v-model="input.salary" placeholder="Enter amount" required autofocus>

                        <span class="err-msg" v-if="errors.salary">
                            {{ errors.salary }}
                        </span>
                    </div>

                    <div class="form-group">
                        <div class="job-title mb-2">Reports To</div>

                        <div class="form-group emp-row row-center"
                            v-for="(to, index) in input.reports_to"
                            :ref="'toItem-' + index"
                            :key="index">

                            <div class="comp-col-left">
                                <input class="form-control" type="text" v-model="input.reports_to[index]"/>
                            </div>

                            <div class="comp-col-right">
                                <span @click="removeEntity(index)">
                                    <img src="/img/icons/remove.png"
                                        srcset="/img/icons/remove@2x.png 2x, /img/icons/remove@3x.png 3x"
                                        style="cursor:pointer">
                                </span>
                            </div>
                        </div>

                        <div class="btn btn-link btn-delete"  @click="addNewEntity">
                            Add new position
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="job-title mb-2">Location</div>

                        <input type="text" class="form-control" style="padding-left:24px"
                            v-model="input.location" placeholder="Start typing address..."
                            @keyup="onChangeLocation(input.location)">

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
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    import Api from '@/api';

    export default {
        data() {
            return {
                show: true,
                locations: [],
                title: '',
                description: '',
                about: '',
                exp_level: '',
                contract_type: '',
                salary: '',
                reports_to: [],
                location: '',
                input: {
                    title: '', description: '', about: '', exp_level: '',
                    contract_type: '', salary: '', reports_to: [], location: '',
                },
                errors: {
                    title: '', description: '', about: '', exp_level: '',
                    contract_type: '', salary: '', reports_to: '', location: '',
                },
                endpoints: {
                    save: '/api/v1/job'
                },
            }
        },

        created() {
            let component = this;

            Bus.$on('jobDetails', function(details) {
                if (details) {
                    component.title = details.title;
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

            Bus.$on('postJob', function() {
                component.submit();
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
                                            data.data && data.data.locations) ? 
                                            data.data.locations.features : [];
                });
            },

            onSelectLocation(location) {
                this.input.location = location;
                
                this.locations = [];
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

            async submit() {
                let component = this;

                Utils.setObjectValues(this.errors, '');
                
                this.disabled = true;
                
                await axios.post(component.endpoints.save, component.$data.input, Utils.getBearerAuth())
                    
                    .then(function(response) {
                        let data = response.data;
                        
                        console.log(data);

                        Bus.$emit('alertSuccess', data.message);
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