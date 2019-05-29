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

        <form method="POST" @submit.prevent="submit">
            <div :class="firstCardCls">
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
                    <select v-model="input.company_main_specialization">
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
                    v-for="(spec, index) in input.company_specialization"
                    :key="index">

                    <div class="comp-col-left">
                        <select v-model="input.company_specialization[index]">
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

                <div class="form-group">
                    <a class="btn btn-link" v-bind:href="endpoints.login">
                        Back to login
                    </a>
                    
                    <button class="pull-right" type="button" :disabled="disabled" @click="onClickNext(1)">
                        Next
                    </button>
                </div>
            </div>

            <div :class="secondCardCls">
                <div class="emp-row">
                    <select v-model="input.company_sector">
                        <option value="" disabled selected>Business Entity Type</option>
                        <option v-for="(sector, index) in sectors" :key="index" v-bind:value="sector.id">
                            {{ sector.name }}
                        </option>
                    </select> 
                </div>
                <span class="err-msg" v-if="errors.company_sector">
                    {{ errors.company_sector }}
                </span>

                <div class="emp-row">
                    <select v-model="input.company_tier">
                        <option value="" disabled selected>Entity type specialisation</option>
                        <option v-for="(tier, index) in tiers" :key="index" v-bind:value="tier.id">
                            {{ tier.name }}
                        </option>
                    </select> 
                </div>
                <span class="err-msg" v-if="errors.company_tier">
                    {{ errors.company_tier }}
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
                
                <div class="form-group">
                    <a class="btn btn-link" href="#" @click="onClickPrevious(2)">
                        Previous
                    </a>
                    
                    <button class="pull-right" type="button" :disabled="disabled" @click="onClickNext(2)">
                        Next
                    </button>
                </div>
            </div>

            <div :class="thirdCardCls">
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

                <div class="form-group">
                    <a class="btn btn-link" href="#" @click="onClickPrevious(3)">
                        Previous
                    </a>
                    
                    <button class="pull-right" type="button" :disabled="disabled" @click="onClickNext(3)">
                        Next
                    </button>
                </div>
            </div>

            <div :class="fourthCardCls">
                <div class="form-group">
                    <input id="first_name" type="text" name="first_name" class="form-control" style="padding-left:24px"
                        v-model="input.first_name" placeholder="First Name" required autofocus />

                    <span class="err-msg" v-if="errors.first_name">
                        {{ errors.first_name }}
                    </span>
                </div>

                <div class="form-group">
                    <input id="last_name" type="text" name="last_name" class="form-control" style="padding-left:24px"
                        v-model="input.last_name" placeholder="Last Name" required />

                    <span class="err-msg" v-if="errors.last_name">
                        {{ errors.last_name }}
                    </span>
                </div>

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

                <div class="form-group">
                    <a class="btn btn-link" href="#" @click="onClickPrevious(4)">
                        Previous
                    </a>
                    
                    <button class="pull-right" type="submit" @click="submit" :disabled="disabled">
                        Submit
                    </button>
                </div>
            </div>
        </form>
    </div>
</template>

<script>
    import Api from '@/api';

    export default {

        data() {
            return {
                subHeader: 'About the business',
                firstProgressCls: 'progress-active',
                secondProgressCls: 'progress-incomplete',
                thirdProgressCls: 'progress-incomplete',
                fourthProgressCls: 'progress-incomplete',
                firstCardCls: '',
                secondCardCls: 'hidden',
                thirdCardCls: 'hidden',
                fourthCardCls: 'hidden',
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
                    company_name: '', company_sector: '', company_tier: '',
                    company_address: '', company_contact_number: '', company_operate_outside_states: '', company_website: '',
                    company_states: [], company_main_specialization: '', company_specialization: [], company_photo: '',
                    role: 2, first_name: '', last_name: '', email: '', password: '', password_confirmation: '',
                },
                errors: {
                    company_name: '', company_sector: '', company_tier: '',
                    company_address: '', company_contact_number: '', company_operate_outside_states: '', company_website: '',
                    company_states: '', company_main_specialization: '', company_specialization: '', company_photo: '',
                    first_name: '', last_name: '', email: '', password: '', password_confirmation: '',
                },
                endpoints: {
                    login: '/login',
                    save: '/api/v1/auth/company/register',
                    company_profile: '/company/profile',
                }
            }
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

            this.input.company_specialization.push('');
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
                this.input.company_specialization = this.input.company_specialization.filter(r => r!=='');
                this.input.company_specialization.push('');
            },

            removeEntity(index) {
                if (this.input.company_specialization.length > 1) {
                    this.input.company_specialization.splice(index, 1);
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
                
                console.log(component.$data.input)
                // await axios.post(component.endpoints.save, component.$data.input, Utils.getBearerAuth())
                    
                //     .then(function(response) {
                //         let data = response.data;
						
                //         console.log(component, data.data);

                //         window.location.href = component.endpoints.company_profile;
                //     })
                //     .catch(function(error) {
                //         if (error.response) {
                //             let data = error.response.data;

				// 			for (let key in data.errors) {
				// 				component.errors[key] = data.errors[key] ? data.errors[key][0] : '';
                //             }
                //         }

                //         Utils.handleError(error);
                //     });
                
                this.disabled = false;
            },

            onClickPrevious(curPage) {
                switch(curPage) {
                    case 2:
                        this.subHeader = 'About the business';

                        this.firstProgressCls = 'progress-active';
                        this.secondProgressCls = 'progress-incomplete';
                        this.thirdProgressCls = 'progress-incomplete';
                        this.fourthProgressCls = 'progress-incomplete';

                        this.firstCardCls = '';
                        this.secondCardCls = 'hidden';
                        this.thirdCardCls = 'hidden';
                        this.fourthCardCls = 'hidden';

                        break;
                    
                    case 3:
                        this.subHeader = 'About the business';

                        this.firstProgressCls = 'progress-complete';
                        this.secondProgressCls = 'progress-active';
                        this.thirdProgressCls = 'progress-incomplete';
                        this.fourthProgressCls = 'progress-incomplete';

                        this.firstCardCls = 'hidden';
                        this.secondCardCls = '';
                        this.thirdCardCls = 'hidden';
                        this.fourthCardCls = 'hidden';

                        break;

                    case 4:
                        this.subHeader = 'Location & Contact';

                        this.firstProgressCls = 'progress-complete';
                        this.secondProgressCls = 'progress-complete';
                        this.thirdProgressCls = 'progress-active';
                        this.fourthProgressCls = 'progress-incomplete';

                        this.firstCardCls = 'hidden';
                        this.secondCardCls = 'hidden';
                        this.thirdCardCls = '';
                        this.fourthCardCls = 'hidden';

                        break;

                    default:
                        break;
                }
            },

            onClickNext(curPage) {
                switch(curPage) {
                    case 1:
                        this.subHeader = 'About the business';

                        this.firstProgressCls = 'progress-complete';
                        this.secondProgressCls = 'progress-active';
                        this.thirdProgressCls = 'progress-incomplete';
                        this.fourthProgressCls = 'progress-incomplete';

                        this.firstCardCls = 'hidden';
                        this.secondCardCls = '';

                        break;

                    case 2:
                        this.subHeader = 'Location & Contact';

                        this.firstProgressCls = 'progress-complete';
                        this.secondProgressCls = 'progress-complete';
                        this.thirdProgressCls = 'progress-active';
                        this.fourthProgressCls = 'progress-incomplete';

                        this.secondCardCls = 'hidden';
                        this.thirdCardCls = '';

                        break;
                    
                    case 3:
                        this.subHeader = 'About yourself';

                        this.firstProgressCls = 'progress-complete';
                        this.secondProgressCls = 'progress-complete';
                        this.thirdProgressCls = 'progress-complete';
                        this.fourthProgressCls = 'progress-active';

                        this.thirdCardCls = 'hidden';
                        this.fourthCardCls = '';

                        break;

                    default:
                        break;
                }
            },
        }
    }
</script>