<template>
    <div class="profile-item-1">
        <div class="profile-content">
            
            <photo-modal></photo-modal>

            <main-modal id="modalUserProfile">
		
                <template slot="custom-modal-title">
                    <h4 class="modal-title">Edit Introduction</h4>
                    <div class="close" data-dismiss="modal" @click="close">&times;</div>
                </template>

                <template slot="custom-modal-content">
                    <form class="modal-form" method="POST" @submit.prevent="submit">
                        <div class="me-label" style="margin-bottom:17px">User Details</div>
                        <div class="me-row">
                            <div class="emp-col-left">
                                <div class="emp-form-label">First Name</div>
                                <input class="form-control" type="text" v-model="input.first_name" />
                            </div>
                            <div class="emp-col-right">
                                <div class="emp-form-label">Last Name</div>
                                <input class="form-control" type="text" v-model="input.last_name" />
                            </div>
                        </div>

                        <div class="emp-row">
                            <div class="modal-form-label">Location</div>
                            <input class="form-control" type="text" v-model="input.address"
                                @keyup="onChangeLocation(input.address)" />
                        </div>

                        <div class="emp-row" style="margin-top:0" v-if="locations.length > 0">
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
                            @keyup="textAreaAdjust" v-model="input.profile_description"></textarea>
                        
                        <div class="skill-label">Education</div>
                        <div class="me-row">
                            <select v-model="input.education_id">
                                <option v-for="(education, index) in educations" :key="index" v-bind:value="education.id">
                                    {{ education.course }}
                                </option>
                            </select> 
                        </div>
                    </form>
                </template>

                <template slot="custom-modal-footer">
                    <button class="mt-0" type="submit" @click="submit" :disabled="disabled">Save Changes</button>
                </template>

            </main-modal>
            
            <span class="edit-icon edit-icon-2"
                data-toggle="modal"
                data-backdrop="static"
                data-keyboard="false"
                data-target="#modalUserProfile"
                @click="open">

                <img src="/img/icons/editbutton.png"
                    srcset="/img/icons/editbutton@2x.png 2x, /img/icons/editbutton@3x.png 3x">
            </span>

            <input type="file" id="upload" value="Choose a file" accept="image/*" style="display:none" @change="onFileChange" />
            
            <div class="profile-header" >
                <img v-if="profile_photo_url" class="profile-picture" :src="profile_photo_url" alt="" @click="onClickProfilePhoto">
                <div v-else @click="onClickProfilePhoto">
                    <avatar cls="profile-picture" size="110" border="7"></avatar>
                </div>
            </div>
            <div class="profile-content-p20 pb-4">
                <div class="bl-label-22 m0">{{ first_name }} {{ last_name }}</div>
            
                <div class="bl-label-17 pb-3" v-if="input.job_role">
                    {{ job_role }} <div class="text-style-1">- {{ company_name }}</div>
                </div>
                
                <div class="bl-display" v-if="address">
                    <div class="row bl-label-15">
                        <div class="bl-col-3">
                            <img class="text-icon-3" src="/img/icons/pinlocation.png"
                                srcset="/img/icons/pinlocation@2x.png 2x, /img/icons/pinlocation@3x.png 3x">
                        </div>
                        <div class="bl-col-4">
                            {{ address }}
                        </div>
                    </div>
                </div>

                <div class="bl-display" v-if="education_id">
                    <div class="row bl-label-15">
                        <div class="bl-col-3">
                            <img class="text-icon-4" src="/img/icons/smalleducation.png"
                                srcset="/img/icons/smalleducation@2x.png 2x, /img/icons/smalleducation@3x.png 3x">
                        </div>
                        <div class="bl-col-4">
                            Studied <b>{{ course }}</b> <div class="text-style-1">- {{ school }}</div>
                        </div>
                    </div>
                </div>
                
                <div class="bl-display">
                    <div class="bl-label-15-style-2 bl-mb20" style="margin-top:24px">
                        {{ profile_description }}
                    </div>
                </div>
                
                <span class="profile-role-header" v-if="job_role">Current Role</span>

                <div class="jobads-row" v-if="job_role">
                    <img class="bl-image-56" src="/img/logo/1.jpg">
                    <div class="bl-display">
                        <span class="bl-label-16 bl-ml15">
                            {{ job_role }}
                        </span>
                        <span class="bl-label-15 bl-ml15 mt-0 pt-0">
                            {{ company_name }}
                        </span>
                        <span class="bl-label-14 bl-ml15">
                            {{ formatPeriod(start_month, start_year, end_month, end_year) }}
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                disabled: false,
                time_out: false,
                educations: [],
                locations: [],
                profile_photo_url: '',
                profile_description: '',
                first_name: '',
                last_name: '',
                email: '',
                is_verified: '',
                address: '',
                education_id: '',
                course: '',
                school: '',
                company_name: '',
                job_role: '',
                start_month: '',
                start_year: '',
                end_month: '',
                end_year: '',
                input: {
                    profile_description: '', first_name: '', last_name: '', address: '', education_id: '',
                },
                errors: {
                    profile_description: '', first_name: '', last_name: '', address: '', education_id: '',
                },
                endpoints: {
                    save: '/api/v1/worker/introduction',
                    locations: '/api/v1/locations',
                    educations: '/api/v1/worker/educations',
                },
            }
        },

        created() {
            let component = this;

            Bus.$on('userProfileDetails', function(details) {
                component.setValues(details);
                component.setDisplayValues(component.input, details);
                
                if (! component.is_verified) {
                    Bus.$emit('alertVerify', component.email);
                }
            });

            Bus.$on('updateEmployment', function(index, details) {
                if (index == 0) {
                    component.company_name = details.company_name;
                    component.job_role = details.job_role;
                    component.start_month = details.start_month;
                    component.start_year = details.start_year;
                    component.end_month = details.end_month;
                    component.end_year = details.end_year;
                }
            });
            
            // Bus.$on('croppedPhoto', function(photo_url) {
            //     component.profile_photo_url = photo_url;
            // });

            Bus.$on('closePhotoModal', function() {
                $('#upload').val('');
            });
        },

        methods: {

            setValues(details) {
                this.profile_description = details.profile_description;
                this.profile_photo_url = details.profile_photo_url;
                this.first_name = details.first_name;
                this.last_name = details.last_name;
                this.email = details.email;
                this.is_verified = details.is_verified;
                this.address = details.address;
                this.education_id = details.education_id;
                this.course = details.education ? details.education.course : '';
                this.school = details.education ? details.education.school : '';
                this.company_name = details.company_name;
                this.job_role = details.job_role;
                this.start_month = details.start_month;
                this.start_year = details.start_year;
                this.end_month = details.end_month;
                this.end_year = details.end_year;
            },

            setDisplayValues(val, details) {
                val.profile_description = details.profile_description;
                val.first_name = details.first_name;
                val.last_name = details.last_name;
                val.address = details.address;
                val.education_id = details.education_id;
                val.course = details.education ? details.education.course : '';
                val.school = details.education ? details.education.school : '';
            },

            formatPeriod(sm, sy, em, ey) {
                let endDate = (em && ey) ? new Date(ey, em-1, 1) : new Date();

                return Utils.formatPeriod(new Date(sy, sm-1, 1), endDate);
            },
            
            onClickProfilePhoto() {
                upload.click();
            },

            onFileChange(e) {
                let files = e.target.files || e.dataTransfer.files;
                
                if (! files.length) {
                    return;
                }

                let file = files[0],
                    reader  = new FileReader();

                reader.addEventListener('load', function() {
                    Bus.$emit('imageToCrop', reader.result);
                }, false);

                if (file) {
                    reader.readAsDataURL(file);
                }
            },

            textAreaAdjust() {
                let o = this.$refs['userIntro'];
                o.style.height = (o.scrollHeight) + 'px';
            },

            open() {
                this.loadEducations();
            },

            close() {
                this.setDisplayValues(this.input, this);
            },

            loadEducations() {
                let component = this;

                this.educations = [];

                axios.get(component.endpoints.educations, Utils.getBearerAuth())

                    .then(function(response) {
                        let data = response.data;

                        component.educations = data.data.educations;
                    })
                    .catch(function(error) {

                        Utils.handleError(error);
                    });
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

                            component.locations = (location != '' && data.data.locations) ? data.data.locations.features : [];
                        })
                        .catch(function(error) {

                            Utils.handleError(error);
                        });

                }.bind(this), 300);
            },

            onSelectLocation(location) {
                this.input.address = location;
                
                this.locations = [];
            },

            async submit() {
                let component = this;

                Utils.setObjectValues(this.errors, '');
                this.disabled = true;
                
                await axios.post(component.endpoints.save, component.$data.input, Utils.getBearerAuth())
                    
                    .then(function(response) {
                        let data = response.data;
						
                        $('#modalUserProfile').modal('hide');

                        component.setDisplayValues(component, data.data.introduction);
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