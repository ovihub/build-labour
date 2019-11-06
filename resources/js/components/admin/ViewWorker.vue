<template>
    <div class="form-group" v-if="record">        
        
        <div class="record-title">
            {{ record.full_name }}
        </div>
        <!-- <ul class="record-links">
            <li class="active">Info</li>
            <li class="inactive">Chats</li>
            <li class="inactive">Something</li>
        </ul> -->
        <div class="record-photo">
            <div class="record-profile-pic">
                <img v-if="record.profile_photo_url" :src="record.profile_photo_url" height="120px" />
                <img v-else src="/img/defaults/user.png" height="120px" />
            </div>
            
            <input type="file" id="upload" value="Choose a file" accept="image/*" style="display:none" @change="onFileChange" />
            
            <div class="record-photo-actions">
                <div class="action-item" @click="onClickUploadImage">
                    <span class="fa fa-upload bl-ml-35 bl-mr-15 bl-mb-32"></span>
                    Upload Image
                </div>
                <div class="action-item" data-toggle="modal" data-target="#deleteRecordModal" @click="onClickDeleteImage">
                    <span class="fa fa-trash bl-ml-35 bl-mr-15"></span>
                    Delete Image
                </div>
            </div>
        </div>
        <div class="me-label" style="margin-bottom:17px">User Details</div>
        <div class="me-row">
            <div class="role-col-left">
                <div class="emp-form-label">First Name</div>
                <input class="form-control" type="text" v-model="profile.first_name" 
                    @focus="hasFocus()" />
                <span class="err-msg" v-if="errors.first_name">{{ errors.first_name }}</span>
            </div>
            <div class="role-col-right">
                <div class="emp-form-label">Last Name</div>
                <input class="form-control" type="text" v-model="profile.last_name"
                    @focus="hasFocus()" />
                <span class="err-msg" v-if="errors.last_name">{{ errors.last_name }}</span>
            </div>            
        </div>
        <div class="emp-row">
            <div class="modal-form-label">Location</div>
            <input class="form-control" type="text" v-model="profile.address"
                @focus="hasFocusLocation(true)"
                @keyup="onChangeLocation(profile.address)" />
        </div>
        <div class="emp-row" style="margin-top:0" v-if="has_focus_location && locations && locations.length > 0">
            <ul class="list-group">
                <li class="list-group-item" v-for="(place, idx) in locations" :key="idx"
                    @click="onSelectLocation(place.place_name)">
                    {{ place.place_name }}
                </li>
            </ul>
        </div>
        <div class="skill-label">Summary of career</div>
        <textarea rows="3" ref="userIntro" class="form-control" style="overflow:hidden"
            placeholder="Example: Experienced Senior Project Manager; demonstrated history of working on a wide range of construction projects for leading companies."
            @focus="textAreaAdjust('userIntro')"
            @keyup="textAreaAdjust('userIntro')"
            v-model="profile.profile_description">
        </textarea>
        <div class="skill-label">Education</div>
        <div class="me-row">
            <select v-model="profile.education_id" @focus="hasFocus()">
                <option value="" disabled selected v-if="educations.length == 0">No education added yet</option>
                <option v-for="(education, index) in educations" :key="index" v-bind:value="education.id">
                    {{ education.course ? education.course.course_name: education.course_name }}
                </option>
            </select> 
        </div>
        <div class="me-label">Most Recent Role</div>
        <div class="emp-row mt-3">
            <input class="form-control" type="text" placeholder="Most Recent Role" v-model="profile.most_recent_role"
                @focus="hasFocusRole(true)"
                @keyup="onSearchJob(profile.most_recent_role)" />
        </div>
        <div class="emp-row" style="margin-top:0" v-if="has_focus_role && job_roles && job_roles.length > 0">
            <ul class="list-group">
                <li class="list-group-item" v-for="(job, idx) in job_roles" :key="idx"
                    @click="onSelectJob(job)">
                    
                    {{ job.job_role_name }}
                </li>
            </ul>
        </div>
        <div class="me-label" style="margin-bottom:17px">Years Experience</div>
        <div class="me-row">
            <div class="role-col-left">
                <label class="record-label">
                    Year(s)
                </label>
                <input class="form-control" type="number" placeholder="Years" v-model="profile.exp_year"
                    @focus="hasFocus()" />
                <span class="err-msg" v-if="errors.exp_year">{{ errors.exp_year }}</span>
            </div>

            <div class="role-col-right">
                <label class="record-label">
                    Month(s)
                </label>
                <input class="form-control" type="number" placeholder="Months" v-model="profile.exp_month"
                    @focus="hasFocus()" />
                <span class="err-msg" v-if="errors.exp_month">{{ errors.exp_month }}</span>

            </div>
        </div>
        <div class="skill-label">
            Areas of construction
        </div>
        <div class="bl-inline" v-for="(sector, index) in sectors_list" :key="index">
            <input :id="'sector-styled-checkbox-'+index" class="styled-checkbox" type="checkbox"
                :value="sector.id" v-model="profile.sectors"
                @focus="hasFocus()" />

            <label :for="'sector-styled-checkbox-'+index" style="width:125px">{{ sector.business_type }}</label>
        </div>
        <div class="skill-label">
            Tiers
        </div>
        <div class="bl-inline" v-for="(tier, index) in tiers_list" :key="index + sectors_list.length">
            <input :id="'tier-styled-checkbox-'+index" class="styled-checkbox" type="checkbox"
                :value="tier.id" v-model="profile.tiers"
                @focus="hasFocus()" />

            <label :for="'tier-styled-checkbox-'+index">{{ tier.tier_name }}</label>
        </div>
        <div class="form-group row mt-5">
            <div class="col-md-6">                
                <button type="submit" @click="submit" :disabled="disabled">
                    Save Changes
                </button>
                
            </div>
            
        </div>
        <!-- <div class="form-group row mt-5">
            <div class="col-md-12">
                <button class="btn btn-primary" data-toggle="modal" data-target="#deleteRecordModal" @click="onClickDeleteAccount()">
                    Delete Account
                </button>
            </div>
        </div> -->
    </div>
</template>

<script>
    import Api from '@/api';
    
    export default {
        name: "view-worker",
		data() {
			return {
                record_id: 0,
				record: null,
				endpoints: {
					get: ''
                },
                errors: {
                    profile_description: '', first_name: '', last_name: '', address: '', education_id: '',
                    most_recent_role: '', exp_year: '', exp_month: '', tiers: '', sectors: '',
                },
                has_focus_location: false,
                has_focus_role: false,                
                locations: [],
                job_roles: [],
                sectors:[],
                profile: {
                    profile_description: '', profile_photo_url: '', first_name: '', last_name: '', email: '', is_verified: '',
                    company_name: '', job_role: '', sectors: [], tiers: [], address: '', education_id: '', 
                    most_recent_role: '', exp_year: '', exp_month: '',
                },
                about_me_general: {
                    gender: '', date_of_birth: '', country_birth: '', marital_status: '', 
                },
                about_me_technical: {
                    right_to_work: '', has_tfn: '', has_abn: '',
                    english_skill: '', drivers_license: '', has_registered_vehicle: '',
                },
                ideal_role: { 
                    introduction: '', when: '', max_distance: '', state: '', right_to_work: '',
                },
                employments: [],
                educations: [],
                tickets: [],
                industry_skills: [],                
                sectors_list: [
                    { id: 1, business_type: 'Residential' },
                    { id: 2, business_type: 'Commercial' },
                    { id: 3, business_type: 'Civil' },
                ],
                tiers_list: [
                    { id: 1, tier_name: 'Tier 1' },
                    { id: 2, tier_name: 'Tier 2' },
                    { id: 3, tier_name: 'Tier 3' },
                    { id: 4, tier_name: 'Tier 4' },
                ],
                endpoints: {
                    get: '/api/v1/auth/user',  
                    get_user: '/api/v1/worker/view/'
                },
			}
		},
		created() {
			let vm = this;

            Bus.$on('datatableViewWorker', function(id){
                vm.record_id = id;
                vm.endpoints.get = '/api/v1/admin/user/get?id=' + id;
                vm.viewRecord();
                vm.getUser();
            });
            
            Bus.$on('croppedPhoto', function (profile_photo_url) {
                vm.record.profile_photo_url = profile_photo_url;
            });

            Bus.$on('closePhotoModal', function() {
                $('#upload').val('');
            });

            
		},
		methods: {
		  	viewRecord() {
				let vm = this;

				axios.get(vm.endpoints.get, Utils.getBearerAuth())

                .then(function(response) {
                    
                    vm.record = response.data.data.record;
                
                }).catch(function(error) {
                    
                    Utils.handleError(error);
                });
            },
            hasFocus() {
                this.has_focus_role = false;
                this.has_focus_location = false;
            },
            formatDate(d) {
                if (d != null) {
                    let date = new Date(d);

                    return date.getDate() + ' ' + Utils.getMonth(date.getMonth()) + ' ' + date.getFullYear();
                }
			},
            onClickDeleteAccount() {
				Bus.$emit('datatableDeleteUser', this.record_id);
            },
            onClickUploadImage() {
                upload.click();
            },
            onFileChange(e) {
                Utils.onFileChange(e, this.record_id, 'Admin');
            },
            onClickDeleteImage() {
                Bus.$emit('deletePhoto', this.record_id);
            },
            hasFocusLocation(has_focus) {
                this.has_focus_location = has_focus;

                if (has_focus) {
                    this.has_focus_role = false;
                }
            },
            onChangeLocation(keyword) {
                this.locations = (keyword && keyword.length > 0) ? Api.getLocations(keyword) : [];
            },
            onSelectLocation(location) {
                this.record.address = location;
                
                this.locations = [];
            },
            textAreaAdjust(refName) {
                this.hasFocus();

                Utils.textAreaAdjust(this.$refs[refName]);
            },
            getUser() {
                let vm = this;
                
                axios.get(vm.endpointGet, Utils.getBearerAuth())
                    
                .then(function(response) {
                    let user = response.data.data.user;                    
                    vm.profile = {};
                    vm.profile.profile_photo_url = user.profile_photo_url;
                    vm.profile.profile_description = user.worker_detail ? user.worker_detail.profile_description : '';
                    vm.profile.first_name = user.first_name;
                    vm.profile.last_name = user.last_name;
                    vm.profile.email = user.email;
                    vm.profile.is_verified = user.is_verified;
                    vm.profile.address = user.address;
                    vm.profile.education_id = user.worker_detail.education_id;
                    vm.profile.education = user.worker_detail.education;
                    vm.profile.sectors = [];
                    vm.sectors = user.worker_detail.sectors;
                    vm.profile.tiers = [];
                    vm.profile.most_recent_role = user.worker_detail.most_recent_role;
                    vm.profile.exp_year = user.worker_detail.exp_year;
                    vm.profile.exp_month = user.worker_detail.exp_month;
                    vm.profile.job_role = (user.experiences[0] && user.experiences[0].job) ?
                                                    user.experiences[0].job.title :
                                                    (user.experiences[0]) ? user.experiences[0].job_role : '';
                    vm.profile.company_name = (user.experiences[0] && user.experiences[0].company) ? 
                                                        user.experiences[0].company.name : 
                                                        (user.experiences[0]) ? user.experiences[0].company_name : '';

                    vm.about_me = {};
                    vm.about_me_general.gender = user.gender;
                    vm.about_me_general.date_of_birth = user.date_of_birth;
                    vm.about_me_general.country_birth = user.country_birth;
                    // vm.about_me_general.marital_status = user.marital_status;

                    vm.about_me_technical.right_to_work = user.worker_detail.right_to_work;
                    vm.about_me_technical.has_tfn = user.worker_detail.has_tfn;
                    vm.about_me_technical.has_abn = user.worker_detail.has_abn;
                    vm.about_me_technical.english_skill = user.worker_detail.english_skill;
                    vm.about_me_technical.drivers_license = user.worker_detail.drivers_license;
                    vm.about_me_technical.has_registered_vehicle = user.worker_detail.has_registered_vehicle;

                    vm.ideal_role = user.worker_detail;
                    vm.ideal_role.countries = user.country;
                    
                    vm.employments = user.experiences;
                    vm.educations = user.educations;
                    vm.tickets = user.tickets;
                    vm.industry_skills = user.skills;

                    for (let i = 0; i < user.worker_detail.sectors.length; i++) {
                        console.log(i);
                        vm.profile.sectors.push(user.worker_detail.sectors[i].id);
                    }

                    for (let i = 0; i < user.worker_detail.tiers.length; i++) {
                        vm.profile.tiers.push(user.worker_detail.tiers[i].id);
                    }

                    // Bus.$emit('profileAvatarDetails', user.first_name.charAt(0) + user.last_name.charAt(0));
                    // Bus.$emit('userProfileDetails', vm.profile);
                    // Bus.$emit('aboutMeGeneralDetails', vm.about_me_general);
                    // Bus.$emit('aboutMeTechnicalDetails', vm.about_me_technical);
                    // Bus.$emit('idealRoleDetails', vm.ideal_role);
                    // Bus.$emit('employmentDetails', vm.employments);
                    // Bus.$emit('educationDetails', vm.educations);
                    // Bus.$emit('ticketsDetails', vm.tickets, user.worker_detail.has_whitecard);
                    // Bus.$emit('industrySkillsDetails', vm.industry_skills, user.worker_detail ? user.worker_detail.main_skill : '');
                
                }).catch(function(error) {
                    /** 
                     * NOTE: Please do not delete token if error occurs
                     * Instead, this should be deleted if unauthorized access is returned
                     */
                    // Api.deleteToken();
                    
                    Utils.handleError(error);
                });
            },
            onSearchJob(keyword) {
                this.job_roles = (keyword && keyword.length > 0) ? Api.getJobRoles(keyword) : [];
            },
            hasFocusRole(has_focus) {
                this.has_focus_role = has_focus;

                if (has_focus) {
                    this.has_focus_location = false;
                }
            },
            onSelectJob(job) {
                this.profile.most_recent_role = job.job_role_name;

                this.job_roles = [];
            },
            async submit(){
                
            }
        },
        computed: {
            endpointGet() {
                return this.record_id ? this.endpoints.get_user + this.record_id : this.endpoints.get;
            }
        },
        components: {
			
		},
	}
</script>