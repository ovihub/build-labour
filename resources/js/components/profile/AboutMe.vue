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
                            <div class="me-label">Gender</div>
                            <div class="me-row">
                                <div class="role-col-left">
                                    <select v-model="input.gender" style="background-position:210px">
                                        <option key="1" value="Male">Male</option>
                                        <option key="2" value="Female">Female</option>
                                        <option key="3" value="Other">Other</option>
                                    </select>
                                    <span class="err-msg" v-if="errors.gender">
                                        {{ errors.gender }}
                                    </span>
                                </div>
                            </div>

                            <div class="me-label" style="margin-bottom:17px">Date of Birth</div>
                            <div class="me-row">
                                <div class="me-col-left">
                                    <div class="emp-form-label">Day</div>
                                    <select v-model="birthDay">
                                        <option v-for="(day, index) in days" :key="index" v-bind:value="day">{{ day }}</option>
                                    </select>
                                </div>
                                <div class="me-col-mid">
                                    <div class="emp-form-label">Month</div>
                                    <select v-model="birthMonth" @change="onChangeBirthMonthYear">
                                        <option v-for="(month, index) in months" :key="index" v-bind:value="month.id">{{ month.name }}</option>
                                    </select>
                                </div>
                                <div class="me-col-right">
                                    <div class="emp-form-label">Year</div>
                                    <select v-model="birthYear" @change="onChangeBirthMonthYear">
                                        <option v-for="(year, index) in years" :key="index" v-bind:value="year">{{ year }}</option>
                                    </select>
                                </div>
                            </div>
                            <span class="err-msg" v-if="errors.date_of_birth">
                                {{ errors.date_of_birth }}
                            </span>

                            <div v-if="false">
                                <div class="me-label">Marital Status</div>
                                <div class="me-row">
                                    <div class="emp-col-left">
                                        <select v-model="input.marital_status">
                                            <option key="1" value="Single">Single</option>
                                            <option key="2" value="Married">Married</option>
                                            <option key="3" value="Other">Other</option>
                                        </select>
                                    </div>
                                </div>
                                <span class="err-msg" v-if="errors.marital_status">
                                {{ errors.marital_status }}
                                </span>
                            </div>

                            <div class="me-label">Country of Birth</div>
                            <div class="me-row mb-3">
                                <select style="background-position:465px" v-model="input.country_birth">
                                    <option v-for="country in countries" :key="country" :value="country">{{ country }}</option>
                                </select>
                            </div>
                            <span class="err-msg" v-if="errors.country_birth">
                                {{ errors.country_birth }}
                            </span>

                            <div class="me-label">
                                I have an Australian Tax File Number (TFN)
                            </div>
                            <div class="bl-inline">
                                <input id="has_tfn_1" class="styled-checkbox-round" type="checkbox"
                                    ref="has_tfn_1" @change="formatCheckbox('has_tfn', 1)" />
                                <label for="has_tfn_1">Yes</label>
                                
                                <input id="has_tfn_0" class="styled-checkbox-round" type="checkbox"
                                    ref="has_tfn_0" @change="formatCheckbox('has_tfn', 0)" />
                                <label for="has_tfn_0">No</label>
                            </div>

                            <div class="me-label">
                                I have an Australian Business Number (ABN)
                            </div>
                            <div class="bl-inline">
                                <input id="has_abn_1" class="styled-checkbox-round" type="checkbox"
                                    ref="has_abn_1" @change="formatCheckbox('has_abn', 1)" />
                                <label for="has_abn_1">Yes</label>
                                
                                <input id="has_abn_0" class="styled-checkbox-round" type="checkbox"
                                    ref="has_abn_0" @change="formatCheckbox('has_abn', 0)" />
                                <label for="has_abn_0">No</label>
                            </div>

                            <div class="me-label">
                                I am competent in WRITTEN and SPOKEN English
                            </div>
                            <div class="bl-inline">
                                <input class="styled-checkbox-round" id="english_skill-checkbox-yes" type="checkbox"
                                    ref="english_skill_1"
                                    @change="formatCheckbox('english_skill', 1)" />
                                <label for="english_skill-checkbox-yes">Yes</label>
                                
                                <input class="styled-checkbox-round" id="english_skill-checkbox-no" type="checkbox"
                                    ref="english_skill_0"
                                    @change="formatCheckbox('english_skill', 0)" />
                                <label for="english_skill-checkbox-no">No</label>
                            </div>

                            <div class="me-label">
                                I have a valid driver's license
                            </div>
                            <div class="bl-inline">
                                <input class="styled-checkbox-round" id="drivers_license-checkbox-yes" type="checkbox"
                                    ref="drivers_license_1"
                                    @change="formatCheckbox('drivers_license', 1)" />
                                <label for="drivers_license-checkbox-yes">Yes</label>
                                
                                <input class="styled-checkbox-round" id="drivers_license-checkbox-no" type="checkbox"
                                    ref="drivers_license_0"
                                    @change="formatCheckbox('drivers_license', 0)" />
                                <label for="drivers_license-checkbox-no">No</label>
                            </div>

                            <div class="me-label">
                                I own/have access to a registered vehicle on a permanent basis
                            </div>
                            <div class="bl-inline">
                                <input class="styled-checkbox-round" id="has_registered_vehicle-checkbox-yes" type="checkbox"
                                    ref="has_registered_vehicle_1"
                                    @change="formatCheckbox('has_registered_vehicle', 1)" />
                                <label for="has_registered_vehicle-checkbox-yes">Yes</label>
                                
                                <input class="styled-checkbox-round" id="has_registered_vehicle-checkbox-no" type="checkbox"
                                    ref="has_registered_vehicle_0"
                                    @change="formatCheckbox('has_registered_vehicle', 0)" />
                                <label for="has_registered_vehicle-checkbox-no">No</label>
                            </div>
                            <div class="me-label-2">
                                Note: Some jobs may require the use of your own registered vehicle.
                            </div>
                        </form>
                    </template>

                    <template slot="custom-modal-footer">
                        <div class="btn btn-link btn-delete" data-dismiss="modal" @click="deleteRecord"
                            v-if="gender || has_tfn || has_abn || english_skill || drivers_license || has_registered_vehicle">
                            Delete
                        </div>

                        <button class="pull-right" type="submit" @click="submit" :disabled="disabled">
                            Save Changes
                        </button>
                    </template>

                </main-modal>
                
                <edit-icon cls="edit-icon" data-target="#modalAboutMe"></edit-icon>
            
                <div class="profile-title">About Me</div>

                <span class="bl-label-15 mt-2 pt-1" v-if="gender">Gender</span>
                <span class="bl-label-14">
                    {{ gender }}
                </span>

                <div v-if="false">
                    <span class="bl-label-15 mt-2 pt-1" v-if="date_of_birth">Date of Birth</span>
                    <span class="bl-label-14">
                        {{ formatDate(date_of_birth) }}
                    </span>
                </div>

                <div v-if="false">
                    <span class="bl-label-15 mt-2 pt-1" v-if="marital_status">Marital Status</span>
                    <span class="bl-label-14">
                        {{ marital_status }}
                    </span>
                </div>

                <span class="bl-label-15 mt-2 pt-1" v-if="has_tfn">Australian ID</span>
                <span class="bl-label-14">
                    {{ has_tfn }}
                </span>
                <span class="bl-label-14">
                    {{ has_abn }}
                </span>

                <span class="bl-label-15 mt-2 pt-1" v-if="english_skill">English Skill</span>
                <span class="bl-label-14">
                    {{ english_skill }}
                </span>

                <span class="bl-label-15 mt-2 pt-1" v-if="drivers_license">Driver's License</span>
                <span class="bl-label-14">
                    {{ drivers_license }}
                </span>
                <span class="bl-label-14">
                    {{ has_registered_vehicle }}
                </span>
            </div>
        </div>
    </div>
</template>

<script>
    import Api from '@/api';
    
    export default {
        data() {
            return {
                disabled: false,
                days: [],
                months: Utils.getMonths(),
                years: Utils.getYears(new Date().getFullYear() - 18),
                birthDay: '',
                birthMonth: '',
                birthYear: '',
                countries: [],
                gender: '',
                date_of_birth: '',
                country_birth: '',
                marital_status: '',
                has_tfn: '',
                has_abn: '',
                english_skill: '',
                drivers_license: '',
                has_registered_vehicle: '',
                input: {
                    gender: '', date_of_birth: '', country_birth: '',marital_status: '', has_tfn: '', has_abn: '',
                    english_skill: '', drivers_license: '', has_registered_vehicle: '',
                },
                errors: {
                    gender: '', date_of_birth: '', country_birth: '', marital_status: '', has_tfn: '', has_abn: '',
                    english_skill: '', drivers_license: '', has_registered_vehicle: '',
                },
                endpoints: {
                    save: '/api/v1/worker/optional'
                }
            }
        },

        created() {
            let component = this;

            Bus.$on('aboutMeDetails', function(details) {
                if (details) {
                    component.setValues(component, details);
                    component.setValues(component.input, details);
                }
            });

            Bus.$on('removeAboutMe', function() {
                Utils.setObjectValues(component.input, null);

                component.submit('clear');
            });

            Promise.resolve(Api.getCountries()).then(function(data) {
                component.countries = data.data.countries;
            });
        },

        methods: {
            
            setValues(val, details) {
                val.gender = details.gender;
                val.date_of_birth = details.date_of_birth;
                val.country_birth = details.country_birth;
                val.marital_status = details.marital_status;
                
                if (! Utils.isNullOrEmpty(details.has_tfn)) {
                    val.has_tfn = details.has_tfn == 1 ? 
                        'Has Australian Tax File Number (TFN)' : 'Does not have Australian Tax File Number (TFN)';
                } else {
                    val.has_tfn = null;
                }

                if (! Utils.isNullOrEmpty(details.has_abn)) {
                    val.has_abn = details.has_abn == 1 ? 
                        'Has Australian Business Number (ABN)' : 'Does not have Australian Business Number (ABN)';
                } else {
                    val.has_abn = null;
                }

                if (! Utils.isNullOrEmpty(details.english_skill)) {
                    val.english_skill = details.english_skill == 1 ? 
                        'Competent in written and spoken' : 'Not competent in written and spoken';
                } else {
                    val.english_skill = null;
                }

                if (! Utils.isNullOrEmpty(details.drivers_license)) {
                    val.drivers_license = details.drivers_license == 1 ?
                        'Owns valid license' : 'Does not own valid license';
                } else {
                    val.drivers_license = null;
                }
                
                if (! Utils.isNullOrEmpty(details.has_registered_vehicle)) {
                    val.has_registered_vehicle = details.has_registered_vehicle == 1 ?
                        'Owns/has access to personal registered vehicle' : 
                        'Does not own/have access to personal registered vehicle';
                } else {
                    val.has_registered_vehicle = null;
                }

                this.formatCheckbox('has_tfn', details.has_tfn);
                this.formatCheckbox('has_abn', details.has_abn);
                this.formatCheckbox('english_skill', details.english_skill);
                this.formatCheckbox('drivers_license', details.drivers_license);
                this.formatCheckbox('has_registered_vehicle', details.has_registered_vehicle);

                if (! Utils.isNullOrEmpty(details.date_of_birth)) {
                    let d = new Date(details.date_of_birth);

                    this.birthDay = d.getDate();
                    this.birthMonth = d.getMonth() + 1;
                    this.birthYear = d.getFullYear();

                    this.days = Utils.getDaysInMonth(this.birthMonth, this.birthYear);
                
                } else {
                    let d = new Date();

                    this.birthDay = d.getDate();
                    this.birthMonth = d.getMonth() + 1;
                    this.birthYear = d.getFullYear() - 18;

                    this.days = Utils.getDaysInMonth(this.birthMonth, this.birthYear);
                }
            },

            formatDate(d) {
                if (d) {
                    let date = new Date(d);

                    return date.getDate() + ' ' + Utils.getMonth(date.getMonth()) + ' ' + date.getFullYear();
                }
            },
                    
            formatCheckbox(refName, value) {
                Utils.formatCheckbox(this.$refs, this.input, refName, value);
            },

            onChangeBirthMonthYear() {
                this.days = Utils.getDaysInMonth(this.birthMonth, this.birthYear);
            },

            close() {
                this.setValues(this.input, this);

                Utils.setObjectValues(this.errors, '');
            },
            
            deleteRecord() {
                $('#deleteRecordModal').modal('show');

                Bus.$emit('deleteAboutMe');
            },

            async submit(action = 0) {
                let component = this;

                if (action !== 'clear') {
                    this.input.date_of_birth = this.birthYear + '-' + this.birthMonth + '-' + this.birthDay;
                }

                Utils.setObjectValues(this.errors, '');

                this.disabled = true;
                
                await axios.post(component.endpoints.save, component.$data.input, Utils.getBearerAuth())
                    
                    .then(function(response) {
                        let data = response.data;
						
                        $('#modalAboutMe').modal('hide');

                        component.setValues(component, data.data.optional);

                        if (action === 'clear') {
                            component.setValues(component.input, data.data.optional);
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
                
                this.disabled = false;
            },
        }
    }
</script>