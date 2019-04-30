<template>
    <div class="profile-item-1">
        <div class="profile-content">
            <div class="profile-content-p20 pt-3 pb-4">
                
                <main-modal id="modalAboutMe">
		
                    <template slot="custom-modal-title">
                        <h4 class="modal-title">Edit About Me</h4>
                        <div class="close" data-dismiss="modal" @click="close">&times;</div>
                    </template>

                    <template slot="custom-modal-content">
                        <form class="modal-form" method="POST" @submit.prevent="submit">
                            <div class="form-group">
                                <div class="me-label">Gender</div>
                                <div class="me-row">
                                    <div class="emp-col-left">
                                        <select v-model="input.gender">
                                            <option key="1" value="Male">Male</option>
                                            <option key="2" value="Female">Female</option>
                                            <option key="3" value="Other">Other</option>
                                        </select>
                                        <span class="err-msg" v-if="errors.gender">
                                            {{ errors.gender }}
                                        </span>
                                    </div>
                                </div>

                                <div class="me-row">
                                    <div class="me-label">Date of Birth</div>
                                    <input class="form-control" type="text" placeholder="YYYY-MM-DD" v-model="input.date_of_birth" />
                                    <span class="err-msg" v-if="errors.date_of_birth">
                                        {{ errors.date_of_birth }}
                                    </span>
                                </div>
                                
                                <div class="me-label">Marital Status</div>
                                <div class="me-row">
                                    <div class="emp-col-left">
                                        <select v-model="input.marital_status">
                                            <option key="1" value="Single">Single</option>
                                            <option key="2" value="Married">Married</option>
                                            <option key="3" value="Other">Other</option>
                                        </select>
                                    </div>
                                    <span class="err-msg" v-if="errors.marital_status">
                                        {{ errors.marital_status }}
                                    </span>
                                </div>

                                <div class="me-label">
                                    I am proficient in WRITTEN and SPOKEN English
                                </div>
                                <div class="bl-inline">
                                    <input class="styled-checkbox-round" id="es-checkbox-yes" type="checkbox"
                                        ref="es-checkbox-1"
                                        @change="formatEnglishSkill(1)" />
                                    <label for="es-checkbox-yes">Yes</label>
                                    
                                    <input class="styled-checkbox-round" id="es-checkbox-no" type="checkbox"
                                        ref="es-checkbox-0"
                                        @change="formatEnglishSkill(0)" />
                                    <label for="es-checkbox-no">No</label>
                                </div>

                                <div class="me-label">
                                    I have a valid driver's license
                                </div>
                                <div class="bl-inline">
                                    <input class="styled-checkbox-round" id="dl-checkbox-yes" type="checkbox"
                                        ref="dl-checkbox-1"
                                        @change="formatDriversLicense(1)" />
                                    <label for="dl-checkbox-yes">Yes</label>
                                    
                                    <input class="styled-checkbox-round" id="dl-checkbox-no" type="checkbox"
                                        ref="dl-checkbox-0"
                                        @change="formatDriversLicense(0)" />
                                    <label for="dl-checkbox-no">No</label>
                                </div>

                                <div class="me-label">
                                    I own/have access to a registered vehicle on a permanent basis
                                </div>
                                <div class="bl-inline">
                                    <input class="styled-checkbox-round" id="hv-checkbox-yes" type="checkbox"
                                        ref="hv-checkbox-1"
                                        @change="formaHasVehicle(1)" />
                                    <label for="hv-checkbox-yes">Yes</label>
                                    
                                    <input class="styled-checkbox-round" id="hv-checkbox-no" type="checkbox"
                                        ref="hv-checkbox-0"
                                        @change="formaHasVehicle(0)" />
                                    <label for="hv-checkbox-no">No</label>
                                </div>
                                
                            </div>
                        </form>
                    </template>

                    <template slot="custom-modal-footer">
                        <button class="mt-0" type="submit" @click="submit" :disabled="disabled">Save Changes</button>
                    </template>

                </main-modal>
                
                <span class="edit-icon" data-toggle="modal" data-backdrop="static" data-keyboard="false" data-target="#modalAboutMe">
                    <img src="/img/icons/editbutton.png"
                        srcset="/img/icons/editbutton@2x.png 2x, /img/icons/editbutton@3x.png 3x">
                </span>
            
                <div class="profile-title">About Me</div>

                <span class="bl-label-15 mt-2 pt-1" v-if="gender">Gender</span>
                <span class="bl-label-14">
                    {{ gender }}
                </span>

                <span class="bl-label-15 mt-2 pt-1" v-if="date_of_birth">Date of Birth</span>
                <span class="bl-label-14">
                    {{ formatDate(date_of_birth) }}
                </span>

                <span class="bl-label-15 mt-2 pt-1" v-if="marital_status">Marital Status</span>
                <span class="bl-label-14">
                    {{ marital_status }}
                </span>

                <span class="bl-label-15 mt-2 pt-1" v-if="english_skill">English Skill</span>
                <span class="bl-label-14">
                    {{ english_skill }}
                </span>

                <span class="bl-label-15 mt-2 pt-1" v-if="drivers_license">Driver's License</span>
                <span class="bl-label-14">
                    {{ drivers_license }}
                </span>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                disabled: false,
                gender: '',
                date_of_birth: '',
                marital_status: '',
                english_skill: '',
                drivers_license: '',
                has_vehicle: '',
                input: {
                    gender: '', date_of_birth: '', marital_status: '', english_skill: '', drivers_license: '', has_vehicle: '',
                },
                errors: {
                    gender: '', date_of_birth: '', marital_status: '', english_skill: '', drivers_license: '', has_vehicle: '',
                },
                endpoints: {
                    save: '/api/v1/worker/optional'
                }
            }
        },

        created() {
            let component = this;

            Bus.$on('aboutMeDetails', function(details) {
                component.input = details;
            });
        },

        methods: {
            
            formatDate(d) {
                if (d) {
                    let date = new Date(d);

                    return date.getDate() + ' ' + Utils.getMonth(date.getMonth()) + ' ' + date.getFullYear();
                }
            },

            formatEnglishSkill(index) {
                if (index == 1) {
                    this.$refs['es-checkbox-1'].checked = true;
                    this.$refs['es-checkbox-0'].checked = false;
                    this.input.english_skill = 1;

                } else {
                    this.$refs['es-checkbox-1'].checked = false;
                    this.$refs['es-checkbox-0'].checked = true;
                    this.input.english_skill = 0;
                }
            },

            formatDriversLicense(index) {
                if (index == 1) {
                    this.$refs['dl-checkbox-1'].checked = true;
                    this.$refs['dl-checkbox-0'].checked = false;
                    this.input.drivers_license = 1;

                } else {
                    this.$refs['dl-checkbox-1'].checked = false;
                    this.$refs['dl-checkbox-0'].checked = true;
                    this.input.drivers_license = 0;
                }
            },

            formaHasVehicle(index) {
                if (index == 1) {
                    this.$refs['hv-checkbox-1'].checked = true;
                    this.$refs['hv-checkbox-0'].checked = false;
                    this.input.has_vehicle = 1;

                } else {
                    this.$refs['hv-checkbox-1'].checked = false;
                    this.$refs['hv-checkbox-0'].checked = true;
                    this.input.has_vehicle = 0;
                }
            },

            close() {
                Utils.setObjectValues(this.errors, '');
            },
            
            async submit() {
                let component = this;

				Utils.setObjectValues(component.errors, '');
                component.disabled = true;
                
                await axios.post(this.endpoints.save, component.$data.input, Utils.getBearerAuth())
                    
                    .then(function(response) {
                        let data = response.data;
						
                        $('#modalAboutMe').modal('hide');
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
                
                component.disabled = false;
            },
        }
    }
</script>