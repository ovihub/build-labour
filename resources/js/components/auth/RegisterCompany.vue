<template>
    <div>
        <photo-modal></photo-modal>

        <div class="form-text-header" style="margin-bottom:12px">Company Registration</div>
        
        <div class="form-sub-header">{{ subHeader }}</div>
        
        <div class="comp-progress">
            <!-- <div class="form-progress bl-mr24" v-for="(n, idx) in max" :key="idx" :class="{active: n == step}" @click="goToStep(n)"></div> -->
            <div class="form-progress bl-mr24" :class="firstProgressCls"></div>
            <div class="form-progress bl-mr24" :class="secondProgressCls"></div>
            <div class="form-progress bl-mr24" :class="thirdProgressCls"></div>
            <div class="form-progress" :class="fourthProgressCls"></div>
        </div>

        <form method="POST" @submit.prevent="submit">
            <ul class="comp-card-wrapper" ref="compCardWrapper">
                <li>
                    <div class="form-group">
                        <input id="company_name" type="text" name="company_name" class="form-control" style="padding-left:24px"
                            v-model="input.company_name" placeholder="Company Name" required />

                        <span class="err-msg" v-if="errors.company_name">
                            {{ errors.company_name }}
                        </span>
                    </div>

                    <div class="comp-label">
                        What is your main company function?
                    </div>
                    <div class="emp-row">
                        <select v-model="input.company_main_company_id">
                            <option value="" disabled selected>Company Specialisation</option>
                            <option v-for="(type, index) in main_types" :key="index" v-bind:value="type.id">
                                {{ type.name }}
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
                            <select v-model="input.company_secondary_functions[index]">
                                <option value="" disabled selected>Business entity type</option>
                                <option v-for="(type, index) in secondary_types" :key="index" v-bind:value="type.id">
                                    {{ type.name }}
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
                        <select v-model="input.company_business_type_id">
                            <option value="" disabled selected>Business Entity Type</option>
                            <option v-for="(sector, index) in sectors" :key="index" v-bind:value="sector.id">
                                {{ sector.name }}
                            </option>
                        </select> 
                    </div>
                    <span class="err-msg" v-if="errors.company_business_type_id">
                        {{ errors.company_business_type_id }}
                    </span>

                    <div class="emp-row">
                        <select v-model="input.company_tier_id">
                            <option value="" disabled selected>Entity type specialisation</option>
                            <option v-for="(tier, index) in tiers" :key="index" v-bind:value="tier.id">
                                {{ tier.name }}
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
                                <!-- <img v-else class="bl-image-100" src="/img/logo/1.jpg"> -->
                            </div>
                        </div>
                        <div class="bl-col-2">
                            <div class="bl-display">
                                <div class="comp-button-1" @click="onClickProfilePhoto">
                                    <p>Choose File</p>
                                </div>
                                <div class="comp-button-2">
                                    <p>Upload</p>
                                </div>
                            </div>
                        </div>
                        <div class="comp-nophoto-label" v-if="! input.company_photo">
                            no photo chosen
                        </div>
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
                    </div>

                    <div class="emp-row" style="margin-top:0" v-if="locations.length > 0">
                        <ul class="list-group">
                            <li class="list-group-item" v-for="(place, idx) in locations" :key="idx"
                                @click="onSelectLocation(place.place_name)">
                                {{ place.place_name }}
                            </li>
                        </ul>
                    </div>

                    <div class="form-group">
                        <input id="company_contact_number" type="text" name="company_contact_number" class="form-control" style="padding-left:24px"
                            v-model="input.company_contact_number" placeholder="Business contact number" required />

                        <span class="err-msg" v-if="errors.company_contact_number">
                            {{ errors.company_contact_number }}
                        </span>
                    </div>

                    <div class="form-group">
                        <input id="company_website" type="text" name="company_website" class="form-control" style="padding-left:24px"
                            v-model="input.company_website" placeholder="Business Website" required />

                        <span class="err-msg" v-if="errors.company_website">
                            {{ errors.company_website }}
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
                            <label :for="'styled-checkbox-'+index">{{ state }}</label>
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
                        <password-eye ref-name="regTogglePassword"></password-eye>
                        
                        <input id="password" ref="regTogglePassword" type="password" name="password" class="form-control" 
                            style="padding-left:24px" v-model="input.password" placeholder="Password" required />

                        <span class="err-msg" v-if="errors.password">
                            {{ errors.password }}
                        </span>
                    </div>

                    <div class="form-group">
                        <password-eye ref-name="regToggleConfirm"></password-eye>

                        <input id="password-confirm" ref="regToggleConfirm" type="password" class="form-control"
                            style="padding-left:24px" name="password_confirmation" v-model="input.password_confirmation"
                            placeholder="Confirm Password" required>
                    </div>
                </li>
            </ul>

            <div class="form-group">
                <span v-if="isFirstStep" class="btn btn-link" :href="endpoints.login">Back to login</span>
                <span v-if="! isFirstStep" class="btn btn-link" @click="skip(-1)">Back</span>
                <button v-if="! isLastStep" class="pull-right" type="button" :disabled="disabled" @click="skip(1)">Next</button>
                <button v-if="isLastStep" class="pull-right" type="submit" @click="submit" :disabled="disabled">Submit</button>
            </div>
        </form>
    </div>
</template>

<script>
    import Api from '@/api';

    export default {

        data() {
            return {
                sections: null,
                step: 1,
                max: 1,
                orientation: '',
                subHeader: 'About the business',
                firstProgressCls: '',
                secondProgressCls: '',
                thirdProgressCls: '',
                fourthProgressCls: '',
                showStates: true,
                disabled: false,
                locations: [],
                sectors: [
                    { id: 1, name: 'Residential' },
                    { id: 2, name: 'Commercial' },
                    { id: 3, name: 'Civil' },
                ],
                tiers: [
                    { id: 1, name: 'Tier 1' },
                    { id: 2, name: 'Tier 2' },
                    { id: 3, name: 'Tier 3' },
                    { id: 4, name: 'Tier 4' },
                    { id: 5, name: 'Tier 5' },
                ],
                main_types: [
                    { id: 1, name: 'Building Contractor' },
                    { id: 2, name: 'Trade Services Contractor' },
                    { id: 3, name: 'Supplier' },
                    { id: 4, name: 'Design Consultant' },
                    { id: 5, name: 'Training and Education Provider' },
                ],
                secondary_types: [
                    { id: 1, bid: 4, name: 'Engineer' },
                    { id: 2, bid: 4, name: 'Architect' },
                    { id: 3, bid: 2, name: 'Plumbing' },
                    { id: 4, bid: 2, name: 'Carpentry' },
                ],
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
                    company_name: '', company_business_type_id: '', company_tier_id: '',
                    company_address: '', company_contact_number: '', company_operate_outside_states: '', company_website: '',
                    company_states: '', company_main_company_id: '', company_secondary_functions: '', company_photo: '',
                    email: '', password: '', password_confirmation: '',
                },
                endpoints: {
                    login: '/login',
                    save: '/api/v1/auth/company/register',
                    company_profile: '/company/profile',
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
            });

            Bus.$on('closePhotoModal', function() {
                $('#upload').val('');
            });

            this.input.company_secondary_functions.push('');

            setTimeout(function(){
                component.$sections = component.$refs['compCardWrapper'].querySelectorAll('li');
                component.max = component.$sections.length;
                component.goToStep(1);
            }, 1)
        },

        methods: {

            onChangeLocation(keyword) {
                this.locations = Api.getLocations(keyword);
            },

            onSelectLocation(location) {
                this.input.company_address = location;
                
                this.locations = [];
            },

            addNewEntity() {
                this.input.company_secondary_functions = this.input.company_secondary_functions.filter(r => r!=='');
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

                } else {
                    this.$refs['rc-checkbox-1'].checked = false;
                    this.$refs['rc-checkbox-0'].checked = false;

                    this.input.company_operate_outside_states = null;
                }
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

            async submit() {
                let component = this;

                Utils.setObjectValues(this.errors, '');

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

                            console.log(component, data.errors);

							for (let key in data.errors) {
								component.errors[key] = data.errors[key] ? data.errors[key][0] : '';
                            }
                        }

                        Utils.handleError(error);
                    });
                
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
                    this.firstProgressCls = 'active';
                    this.secondProgressCls = 'incomplete';
                    this.thirdProgressCls = 'incomplete';
                    this.fourthProgressCls = 'incomplete';

                } else if (step == 2) {
                    this.firstProgressCls = 'complete';
                    this.secondProgressCls = 'active';
                    this.thirdProgressCls = 'incomplete';
                    this.fourthProgressCls = 'incomplete';

                } else if (step == 3) {
                    this.firstProgressCls = 'complete';
                    this.secondProgressCls = 'complete';
                    this.thirdProgressCls = 'active';
                    this.fourthProgressCls = 'incomplete';

                } else if (step == 4) {
                    this.firstProgressCls = 'complete';
                    this.secondProgressCls = 'complete';
                    this.thirdProgressCls = 'complete';
                    this.fourthProgressCls = 'active';
                }
            },

            skip(step) {
                this.step += step;
                this.goToStep(this.step);
            },

        }
    }
</script>