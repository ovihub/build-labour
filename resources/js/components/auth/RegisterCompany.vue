<template>
    <div>
        <photo-modal></photo-modal>

        <div class="form-text-header" style="margin-bottom:12px">Company Registration</div>
        
        <div class="form-sub-header">{{ subHeader }}</div>
        
        <div class="comp-progress">
            <div class="form-progress bl-mr24" :class="firstProgressCls"></div>
            <div class="form-progress bl-mr24" :class="secondProgressCls"></div>
            <div class="form-progress bl-mr24" :class="thirdProgressCls"></div>
            <div class="form-progress" :class="fourthProgressCls"></div>
        </div>
        <div class="div-form">
            <form method="POST">
                <ul class="comp-card-wrapper" ref="compCardWrapper">
                    <li>
                        <div class="form-group">
                            <input id="company_name" type="text" name="company_name" class="form-control" style="padding-left:24px"
                                v-model="input.company_name" placeholder="Company Name"
                                @keyup="onKeyupCompanyName" required />

                            <span class="err-msg" v-if="errors.name">
                                {{ errors.name }}
                            </span>
                        </div>

                        <div class="comp-label">
                            What is your main company function?
                        </div>
                        <div class="emp-row">
                            <select v-model="input.company_main_company_id" style="background-position:450px"
                                @change="onChangeMainCompanyFunctions">

                                <option value="" disabled selected style="display:none">Company Specialisation</option>
                                <option v-for="(main, index) in main_company_functions" :key="index" v-bind:value="main.id">
                                    {{ main.main_name }}
                                </option>
                            </select> 
                        </div>

                        <div class="comp-label">
                            What are the secondary functions?
                        </div>
                        <div class="comp-label-3">
                            Add as many as applicable
                        </div>

                        <div class="form-group emp-row row-center"
                            :ref="'specItem-' + index" 
                            v-for="(spec, index) in input.company_secondary_functions"
                            :key="index">

                            <div class="comp-col-left">
                                <select v-model="input.company_secondary_functions[index]" style="background-position:405px"
                                    @change="setNextDisabled(1)">

                                    <option value="" disabled selected style="display:none">Company Specialisation</option>
                                    <option v-for="(type, idx) in secondary_company_functions" 
                                        :ref="'specOptItem-' + index + '-' + (idx + 1)"
                                        :key="idx + 1"
                                        v-bind:value="type.id">

                                        {{ type.secondary_name }}
                                    </option>
                                </select> 
                            </div>

                            <div class="comp-col-right">
                                <span @click="removeEntity(index)">
                                    <img src="/img/icons/remove.png"
                                        srcset="/img/icons/remove@2x.png 2x, /img/icons/remove@3x.png 3x"
                                        style="cursor:pointer">
                                </span>
                            </div>
                        </div>

                        <center>
                            <div class="btn btn-link btn-delete" @click="addNewEntity">
                                Add Another
                            </div>
                        </center>
                    </li>

                    <li>
                        <div class="emp-row">
                            <select v-model="input.company_business_type_id" style="background-position:450px"
                                @change="setNextDisabled(2)">

                                <option value="" disabled selected style="display:none">Business Entity Type</option>
                                <option v-for="(type, index) in business_types" :key="index" v-bind:value="type.id">
                                    {{ type.business_type }}
                                </option>
                            </select> 
                        </div>
                        <span class="err-msg" v-if="errors.company_business_type_id">
                            {{ errors.company_business_type_id }}
                        </span>

                        <div class="emp-row">
                            <select v-model="input.company_tier_id" style="background-position:450px"
                                @change="setNextDisabled(2)">

                                <option value="" disabled selected style="display:none">Entity Type Specialisation</option>
                                <option v-for="(tier, index) in tiers" :key="index" v-bind:value="tier.id">
                                    {{ tier.tier_name }}
                                </option>
                            </select> 
                        </div>
                        <span class="err-msg" v-if="errors.company_tier_id">
                            {{ errors.company_tier_id }}
                        </span>

                        <input type="file" id="upload" value="Choose a file" accept="image/*" style="display:none" @change="onFileChange" />

                        <div class="comp-label">
                            Company Logo
                        </div>
                        <div class="disp-flex">
                            <div class="bl-col-1">
                                <div class="comp-logo">
                                    <img v-if="input.company_photo" class="bl-image-100" :src="input.company_photo">
                                    <img v-else class="bl-image-100" style="padding:15px"
                                        src="/img/icons/uploadlogo.jpg"
                                        srcset="/img/icons/uploadlogo@2x.png 2x, /img/icons/uploadlogo@3x.png 3x">
                                </div>
                            </div>
                            <div class="bl-col-2">
                                <div class="bl-display">
                                    <div class="comp-button-1" @click="onClickProfilePhoto">
                                        <p>Choose File</p>
                                    </div>
                                    <div class="comp-button-2" @click="onClickUpload">
                                        <p>Upload</p>
                                    </div>
                                </div>
                            </div>
                            <div class="comp-nophoto-label" v-if="! input.company_photo">
                                no photo chosen
                            </div>
                        </div>
                        <div id="myProgress" v-show="showProgress">
                            <div id="myBar"></div>
                        </div>
                    </li>

                    <li>
                        <div class="comp-label">
                            Head Office Address
                        </div>

                        <div class="form-group">
                            <input id="company_address" type="text" name="company_address" class="form-control" style="padding-left:24px"
                                v-model="input.company_address" placeholder="Start typing address..."
                                @keyup="onChangeLocation(input.company_address)"
                                required />

                            <span class="err-msg" v-if="errors.company_address">
                                {{ errors.company_address }}

                            </span>

                            <div class="emp-row" style="margin-top:0" v-if="locations.length > 0">
                                <div class="locations-wrapper">
                                    <p class="location-item" v-for="(place, idx) in locations" :key="idx"
                                       @click="onSelectLocation(place.place_name)">{{ place.place_name.trim() }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <input id="company_contact_number" type="text" name="company_contact_number" class="form-control"
                                style="padding-left:24px" v-model="input.company_contact_number" placeholder="Business contact number"
                                @keyup="setNextDisabled(3)" required />

                            <span class="err-msg" v-if="errors.company_contact_number">
                                {{ errors.company_contact_number }}
                            </span>
                        </div>

                        <div class="form-group">
                            <input id="company_website" type="text" name="company_website" class="form-control"
                                style="padding-left:24px" v-model="input.company_website" placeholder="Business Website"
                                @keyup="setNextDisabled(3)" required />

                            <span class="err-msg" v-if="errors.website">
                                {{ errors.website }}
                            </span>
                        </div>

                        <div class="comp-label-2">
                            Do you operate out of any other states?
                        </div>
                        <div class="bl-inline">
                            <input class="styled-checkbox-round" id="rc-checkbox-yes" type="checkbox"
                                ref="rc-checkbox-1"
                                @change="formatOperate(1)" />
                            <label for="rc-checkbox-yes">Yes</label>
                            
                            <input class="styled-checkbox-round" id="rc-checkbox-no" type="checkbox"
                                ref="rc-checkbox-0"
                                @change="formatOperate(0)" />
                            <label for="rc-checkbox-no">No</label>
                        </div>

                        <div v-if="showStates">
                            <div class="comp-label-2">
                                Check all that apply
                            </div>
                            <div class="bl-inline" v-for="(state, index) in states" :key="index">
                                <input class="styled-checkbox" :id="'styled-checkbox-'+index" type="checkbox"
                                    v-bind:value="state" v-model="input.company_states" />
                                <label :for="'styled-checkbox-'+index" style="width:80px">{{ state }}</label>
                            </div>
                        </div>
                    </li>

                    <li>
                        <div class="form-group">
                            <input id="email" type="email" name="email" class="form-control" style="padding-left:24px"
                                v-model="input.email" placeholder="Email Address" required />

                            <span class="err-msg" v-if="errors.email">
                                {{ errors.email }}
                            </span>
                        </div>

                        <div class="form-group">
                            <password-eye ref-name="regTogglePassword" style="margin-right:15px"></password-eye>
                            
                            <input id="password" ref="regTogglePassword" type="password" name="password" class="form-control" 
                                style="padding-left:24px" v-model="input.password" placeholder="Password" required />

                            <span class="err-msg" v-if="errors.password">
                                {{ errors.password }}
                            </span>
                        </div>

                        <div class="form-group">
                            <password-eye ref-name="regToggleConfirm" style="margin-right:15px"></password-eye>

                            <input id="password-confirm" ref="regToggleConfirm" type="password" class="form-control"
                                style="padding-left:24px" name="password_confirmation" v-model="input.password_confirmation"
                                placeholder="Confirm Password" required>
                        </div>
                    </li>
                </ul>

                <div class="form-group">
                    <a v-if="isFirstStep" class="btn btn-link" :href="endpoints.login">Back to login</a>

                    <button v-if="! isLastStep" class="pull-right" type="button" @click="skip(1)" :disabled="disabledNext">
                        Next
                    </button>
                    
                    <button v-if="isLastStep" class="pull-right" type="button" @click="submit" :disabled="disabled">
                        Submit
                    </button>
                    
                    <div class="loading">
                        <pulse-loader :loading="loading" color="#ff7705" size="8px"></pulse-loader>
                    </div>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
    import Api from '@/api';

    export default {

        data() {
            return {
                loading: false,
                width: 10,
                sections: null,
                step: 1,
                max: 1,
                orientation: '',
                subHeader: 'About the business',
                firstProgressCls: '',
                secondProgressCls: '',
                thirdProgressCls: '',
                fourthProgressCls: '',
                showStates: false,
                showProgress: false,
                disabled: false,
                disabledNext: true,
                time_out: false,
                locations: [],
                business_types: [],
                location_timeout: false,
                tiers: [],
                main_company_functions: [],
                secondary_company_functions: [],
                states: [
                    'QLD', 'NSW', 'SA', 'VIC', 'WA', 'ACT', 'TAS', 'NT',
                ],
                input: {
                    company_name: '', company_business_type_id: '', company_tier_id: '',
                    company_address: '', company_contact_number: '', company_operate_outside_states: '', company_website: '',
                    company_states: [], company_main_company_id: '', company_secondary_functions: [], company_photo: '',
                    email: '', password: '', password_confirmation: '',
                },
                errors: {
                    name: '', company_business_type_id: '', company_tier_id: '',
                    company_address: '', company_contact_number: '', company_operate_outside_states: '', website: '',
                    company_states: '', company_main_company_id: '', company_secondary_functions: '', company_photo: '',
                    email: '', password: '', password_confirmation: '',
                },
                endpoints: {
                    login: '/login',
                    save: '/api/v1/auth/company/register',
                    company_profile: '/user/profile',
                    company_options: '/api/v1/company/options',
                }
            }
        },

        computed: {
            isFirstStep: function(){
                return (this.step === 1);
            },

            isLastStep: function(){
                return (this.step === this.max);
            },
        },

        watch: {
            orientation: 'setCssVars',
        },

        created() {
            let component = this;

            Bus.$on('regTogglePassword', function(type) {
                component.$refs['regTogglePassword'].type = type;
            });

            Bus.$on('regToggleConfirm', function(type) {
                component.$refs['regToggleConfirm'].type = type;
            });

            Bus.$on('croppedPhoto', function(photo_url) {
                component.input.company_photo = photo_url;

                component.showProgress = false;
                component.width = 10;
            });

            Bus.$on('closePhotoModal', function() {
                $('#upload').val('');
            });

            this.input.company_secondary_functions.push('');

            setTimeout(function() {
                component.$sections = component.$refs['compCardWrapper'].querySelectorAll('li');
                component.max = component.$sections.length;
                component.goToStep(1);
            }, 1);

            this.getCompanyOptions();
        },

        methods: {

            getCompanyOptions() {
                let component = this;

                Promise.resolve(Api.getCompanyOptions()).then(function(data) {
                    
                    component.business_types = data.business_types;
                    component.tiers = data.tiers;
                    component.main_company_functions = data.main_company_functions;
                });
            },

            setNextDisabled(step) {
                
                switch (step) {
                    case 1:
                        if (this.input.company_name && this.input.company_main_company_id && 
                            this.input.company_secondary_functions && this.input.company_secondary_functions[0] != '') {
                                
                            this.disabledNext = false;
                        } else {
                            this.disabledNext = true;
                        }

                        break;

                    case 2:
                        if (this.input.company_business_type_id && this.input.company_tier_id && this.input.company_photo) {
                            this.disabledNext = false;
                        } else {
                            this.disabledNext = true;
                        }

                        break;

                    case 3:
                        if (this.input.company_address && this.input.company_contact_number && this.input.company_website &&
                            (this.input.company_operate_outside_states === 0 || this.input.company_operate_outside_states === 1)) {
                            
                            this.disabledNext = false;
                        } else {
                            this.disabledNext = true;
                        }

                        break;
                }
            },

            onKeyupCompanyName(e) {
                this.setNextDisabled(1);
            },

            onChangeMainCompanyFunctions(e) {
                this.secondary_company_functions = this.main_company_functions.find(el => el.id == e.target.value).items;

                this.setNextDisabled(1);
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
                this.input.company_address = location;
                this.locations = [];

                this.setNextDisabled(3);
            },

            addNewEntity() {
                this.input.company_secondary_functions = this.input.company_secondary_functions.filter(r => r !== '');

                this.input.company_secondary_functions.push('');
            },

            removeEntity(index) {
                if (this.input.company_secondary_functions.length > 1) {
                    this.input.company_secondary_functions.splice(index, 1);
                }
            },

            formatOperate(index) {
                if (index == 1) {
                    this.$refs['rc-checkbox-1'].checked = true;
                    this.$refs['rc-checkbox-0'].checked = false;

                    this.input.company_operate_outside_states = 1;
                    this.showStates = true;

                } else if (index == 0) {
                    this.$refs['rc-checkbox-1'].checked = false;
                    this.$refs['rc-checkbox-0'].checked = true;

                    this.input.company_operate_outside_states = 0;
                    this.showStates = false;
                    
                    this.input.company_states = [];

                } else {
                    this.$refs['rc-checkbox-1'].checked = false;
                    this.$refs['rc-checkbox-0'].checked = false;

                    this.input.company_operate_outside_states = null;
                }

                this.setNextDisabled(3);
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
                    
                    Bus.$emit('imageToCrop', reader.result, 0, 'CompanyRegister');

                }, false);

                if (file) {
                    reader.readAsDataURL(file);
                }
            },

            onClickUpload() {
                let component = this;

                this.showProgress = true;

                if (this.input.company_photo && this.width < 100) {
                    var elem = document.getElementById('myBar');
                    var id = setInterval(frame, 20);
                    
                    function frame() {
                        if (component.width >= 100) {
                            clearInterval(id);
                        } else {
                            component.width++;
                            elem.style.width = component.width + '%'; 
                            elem.innerHTML = (component.width != 100) ? component.width * 1 + '%' : component.width * 1 + '% Complete';
                        }
                        if (component.width == 100) {
                            component.setNextDisabled(2);
                        }
                    }
                }
            },

            async submit() {
                let component = this;

                Utils.setObjectValues(this.errors, '');

                this.loading = true;
                this.disabled = true;
                
                await axios.post(component.endpoints.save, component.$data.input, Utils.getBearerAuth())
                    
                    .then(function(response) {
                        let data = response.data;
                        
                        Api.setToken(data.data.token);
                        
                        window.location.href = component.endpoints.company_profile;
                    })
                    .catch(function(error) {
                        if (error.response) {
                            let data = error.response.data;

                            if (data.errors.name) {
                                component.skip(-3);
                            }
                            if (data.errors.website) {
                                component.skip(-1);
                            }

							for (let key in data.errors) {
								component.errors[key] = data.errors[key] ? data.errors[key][0] : '';
                            }
                        }

                        Utils.handleError(error);
                    });
                
                this.loading = false;
                this.disabled = false;
            },

            setCssVars() {
                this.$refs['compCardWrapper'].style.setProperty('--x', (((this.step * 100) - 100) * -1) + '%')
                this.$refs['compCardWrapper'].style.setProperty('--y', (((this.step * 100) - 100) * 0) + '%')
                this.$refs['compCardWrapper'].style.setProperty('--axis', 'row')
                this.$refs['compCardWrapper'].style.setProperty('--axis-reverse', 'row-reverse')
                this.$refs['compCardWrapper'].style.setProperty('--cross', 'column')
                this.$refs['compCardWrapper'].style.setProperty('--cross-reverse', 'column-reverse')
            },

            skip(step) {
                this.step += step;
                this.disabledNext = true;
                this.goToStep(this.step);
            },

            goToStep(step) {
                this.step = step > this.max ? this.max : step < 1 ? 1 : step;
                this.currentSection = this.$sections[this.step-1];

                this.$sections.forEach(function(section) {
                    section.classList.remove('current');
                });

                this.currentSection.classList.add('current');
                this.currentSection.scrollTop = 0;

                this.setCssVars();

                if (step == 1) {
                    this.subHeader = 'About the business';
                    this.firstProgressCls = 'active';
                    this.secondProgressCls = 'incomplete';
                    this.thirdProgressCls = 'incomplete';
                    this.fourthProgressCls = 'incomplete';

                } else if (step == 2) {
                    this.subHeader = 'About the business';
                    this.firstProgressCls = 'complete';
                    this.secondProgressCls = 'active';
                    this.thirdProgressCls = 'incomplete';
                    this.fourthProgressCls = 'incomplete';

                } else if (step == 3) {
                    this.subHeader = 'Location & Contact';
                    this.firstProgressCls = 'complete';
                    this.secondProgressCls = 'complete';
                    this.thirdProgressCls = 'active';
                    this.fourthProgressCls = 'incomplete';

                } else if (step == 4) {
                    this.subHeader = 'Login Credentials';
                    this.firstProgressCls = 'complete';
                    this.secondProgressCls = 'complete';
                    this.thirdProgressCls = 'complete';
                    this.fourthProgressCls = 'active';
                }
            },

        }
    }
</script>