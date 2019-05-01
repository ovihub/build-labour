<template>
    <div class="profile-item-1">
        <div class="profile-content">
            
            <photo-modal></photo-modal>

            <main-modal id="modalUserHeadline">
		
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
                            <input class="form-control" type="text" />
                        </div>
                    </form>
                </template>

                <template slot="custom-modal-footer">
                    <button class="mt-0" type="submit" @click="submit" :disabled="disabled">Save Changes</button>
                </template>

            </main-modal>
            
            <!-- <span class="edit-icon edit-icon-2"
                data-toggle="modal" data-backdrop="static" data-keyboard="false" data-target="#modalUserHeadline">
                <img src="/img/icons/editbutton.png"
                    srcset="/img/icons/editbutton@2x.png 2x, /img/icons/editbutton@3x.png 3x">
            </span> -->

            <input type="file" id="upload" value="Choose a file" accept="image/*" style="display:none" @change="onFileChange" />
            
            <div class="profile-header" >
                <img v-if="input.profile_photo_url" class="profile-picture" :src="input.profile_photo_url" alt="" @click="onClickProfilePhoto">
                <div v-else @click="onClickProfilePhoto">
                    <avatar cls="profile-picture" size="110" border="7"></avatar>
                </div>
            </div>
            <div class="profile-content-p20 pb-4">
                <div class="bl-label-22 m0">{{ input.first_name }} {{ input.last_name }}</div>
            
                <div class="bl-label-17 pb-3" v-if="input.job_role">
                    {{ input.job_role }} <div class="text-style-1">- {{ input.company_name }}</div>
                </div>
                
                <div class="bl-display" v-if="input.address">
                    <div class="row bl-label-15">
                        <div class="bl-col-3">
                            <img class="text-icon-3" src="/img/icons/pinlocation.png"
                                srcset="/img/icons/pinlocation@2x.png 2x, /img/icons/pinlocation@3x.png 3x">
                        </div>
                        <div class="bl-col-4">
                            {{ input.address }}
                        </div>
                    </div>
                </div>

                <div class="bl-display" v-if="input.course">
                    <div class="row bl-label-15 bl-mb24">
                        <div class="bl-col-3">
                            <img class="text-icon-4" src="/img/icons/smalleducation.png"
                                srcset="/img/icons/smalleducation@2x.png 2x, /img/icons/smalleducation@3x.png 3x">
                        </div>
                        <div class="bl-col-4">
                            Studied <b>{{ input.course }}</b> <div class="text-style-1">- {{ input.school }}</div>
                        </div>
                    </div>
                </div>
                
                <div class="bl-display">
                    <div class="bl-label-15-style-2 bl-mb20">
                        {{ input.profile_description }}
                    </div>
                </div>
                
                <span class="profile-role-header" v-if="input.job_role">Current Role</span>

                <div class="row" v-if="input.job_role">
                    <img class="bl-image-56" src="/img/logo/1.jpg">
                    <div class="bl-display">
                        <span class="bl-label-16 bl-ml15">
                            {{ input.job_role }}
                        </span>
                        <span class="bl-label-15 bl-ml15 mt-0 pt-0">
                            {{ input.company_name }}
                        </span>
                        <span class="bl-label-14 bl-ml15">
                            {{ formatPeriod(input) }}
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
                locations: [],
                input: {
                    profile_photo_url: '', profile_description: '', first_name: '', last_name: '', email: '', is_verified: '',
                    course: '', school: '', country: '', address: '',
                    role: '', company_name: '', job_role: '', start_month: '', start_year: '', end_month: '', end_year: '',
                },
                errors: {
                    profile_photo_url: '', profile_description: '', first_name: '', last_name: '', email: '', is_verified: '',
                    course: '', school: '', country: '', address: '',
                    role: '', company_name: '', job_role: '', start_month: '', start_year: '', end_month: '', end_year: '',
                },
                endpoints: {
                    save: '/api/v1/user/update',
                    locations: '/api/v1/locations',
                },
                format: 'd MMMM yyyy',
            }
        },

        created() {
            let component = this;

            Bus.$on('userProfileDetails', function(details) {
                component.input = details;
                
                if (! component.input.is_verified) {
                    Bus.$emit('alertVerify', component.input.email);
                }
            });

            // Bus.$on('croppedPhoto', function(photo_url) {
            //     component.input.profile_photo_url = photo_url;
            // });

            Bus.$on('closePhotoModal', function() {
                $('#upload').val('');
            });
        },

        methods: {
            formatPeriod(emp) {
                let endDate = (emp.end_month && emp.end_year) ?
                              new Date(emp.end_year, emp.end_month-1, 1) : new Date();

                return Utils.formatPeriod(new Date(emp.start_year, emp.start_month-1, 1), endDate);
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

            close() {

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

            onSelectLocation(location) {
                this.location = location;
                
                this.locations = [];
            },

            submit() {
                
            }
        }
    }
</script>