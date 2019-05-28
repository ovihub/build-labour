<template>
    <div>
        <div class="form-text-header" style="margin-bottom:12px">Company Registration</div>
        
        <div class="form-sub-header">{{ subHeader }}</div>
        
        <div class="comp-progress">
            <div class="form-progress bl-mr24" :class="firstProgressCls"></div>
            <div class="form-progress bl-mr24" :class="secondProgressCls"></div>
            <div class="form-progress bl-mr24" :class="thirdProgressCls"></div>
            <div class="form-progress" :class="fourthProgressCls"></div>
        </div>

        <form :class="firstCardCls">
            <div class="form-group">
                <input id="first_name" type="text" name="first_name" class="form-control" style="padding-left:24px"
                    v-model="input.first_name" placeholder="First Name" required autofocus />

                <span class="err-msg" v-if="errors.first_name">
                    {{ errors.first_name }}
                </span>
            </div>

            <div class="form-group">
                <input id="last_name" type="text" name="last_name" class="form-control" style="padding-left:24px"
                    v-model="input.last_name" placeholder="Last Name" required autofocus />

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
                <a class="btn btn-link" v-bind:href="endpoints.login">
                    Back to login
                </a>
                
                <button class="pull-right" type="button" :disabled="disabled" @click="onClickNext(1)">
                    Next
                </button>
            </div>
        </form>

        <form :class="secondCardCls">
            <div class="form-group">
                <input id="company_name" type="text" name="company_name" class="form-control" style="padding-left:24px"
                    v-model="input.company_name" placeholder="Company Name" required autofocus />

                <span class="err-msg" v-if="errors.company_name">
                    {{ errors.company_name }}
                </span>
            </div>

            <div class="emp-row">
                <select v-model="input.sector">
                    <option value="" disabled selected>Business Entity Type</option>
                    <option v-for="(sector, index) in sectors" :key="index" v-bind:value="sector.id">
                        {{ sector.name }}
                    </option>
                </select> 
            </div>
            <span class="err-msg" v-if="errors.sector">
                {{ errors.sector }}
            </span>

            <div class="emp-row">
                <select v-model="input.tier">
                    <option value="" disabled selected>Entity type specialisation</option>
                    <option v-for="(tier, index) in tiers" :key="index" v-bind:value="tier.id">
                        {{ tier.name }}
                    </option>
                </select> 
            </div>
            <span class="err-msg" v-if="errors.tier">
                {{ errors.tier }}
            </span>

            <input type="file" id="upload" value="Choose a file" accept="image/*" style="display:none" @change="onFileChange" />

            <div class="comp-label">
                Company Logo
            </div>
            <div class="disp-flex">
                <div class="bl-col-1">
                    <div class="comp-logo">
                        <!-- <img class="bl-image-100" src="/img/logo/1.jpg"> -->
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
                <div class="comp-nophoto-label">
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
        </form>

        <form :class="thirdCardCls">
            <div class="comp-label">
                What is your main company function?
            </div>
            <div class="emp-row">
                <select v-model="input.business_type">

                    <option value="" disabled selected>Company Specialisation</option>
                    <option v-for="(type, index) in business_types" :key="index" v-bind:value="type.id">
                        {{ type.name }}
                    </option>
                </select> 
            </div>

            <div class="comp-label">
                What are the secondary functions?
            </div>
            <div class="form-group emp-row row-center"
                :ref="'specItem-' + index" 
                v-for="(spec, index) in input.specialization"
                :key="index">

                <div class="comp-col-left">
                    <input class="form-control" type="text" placeholder="Business entity type"
                        v-model="input.specialization[index]"
                        @keyup="onKeyupSpecialization" />
                </div>

                <div class="comp-col-right">
                    <span @click="removeEntity(index)">
                        <img src="/img/icons/remove.png"
                            srcset="/img/icons/remove@2x.png 2x, /img/icons/remove@3x.png 3x">
                    </span>
                </div>
            </div>

            <center>
                <div class="btn btn-link btn-delete" @click="addNewEntity">
                    Add Another
                </div>
            </center>

            <div class="form-group">
                <a class="btn btn-link" href="#" @click="onClickPrevious(3)">
                    Previous
                </a>
                
                <button class="pull-right" type="button" :disabled="disabled" @click="onClickNext(3)">
                    Next
                </button>
            </div>
        </form>

        <form :class="fourthCardCls">
            <div class="comp-label">
                Head Office Address
            </div>

            <div class="form-group">
                <input id="company_address" type="text" name="company_address" class="form-control" style="padding-left:24px"
                    v-model="input.company_address" placeholder="Start typing address..."
                    @keyup="onChangeLocation(input.company_address)"
                    required autofocus />

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
                <input id="company_contact" type="text" name="company_contact" class="form-control" style="padding-left:24px"
                    v-model="input.company_contact" placeholder="Business contact number" required />

                <span class="err-msg" v-if="errors.company_contact">
                    {{ errors.company_contact }}
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
                    ref="styled-checkbox-1"
                    @change="formatOperate(1)" />
                <label for="rc-checkbox-yes">Yes</label>
                
                <input class="styled-checkbox-round" id="rc-checkbox-no" type="checkbox"
                    ref="styled-checkbox-0"
                    @change="formatOperate(0)" />
                <label for="rc-checkbox-no">No</label>
            </div>

            <div class="comp-label-2">
                Check all that apply
            </div>
            <div class="bl-inline" v-for="(state, index) in states" :key="index">
                <input class="styled-checkbox" :id="'styled-checkbox-'+index" type="checkbox"
                    v-bind:value="state" v-model="input.selected" />
                <label :for="'styled-checkbox-'+index">{{ state }}</label>
            </div>

            <div class="form-group">
                <a class="btn btn-link" href="#" @click="onClickPrevious(4)">
                    Previous
                </a>
                
                <button class="pull-right" type="button" :disabled="disabled" @click="onClickNext(4)">
                    Submit
                </button>
            </div>
        </form>
    </div>
</template>

<script>
    import Api from '@/api';

    export default {

        data() {
            return {
                subHeader: 'About yourself',
                firstProgressCls: 'progress-active',
                secondProgressCls: 'progress-incomplete',
                thirdProgressCls: 'progress-incomplete',
                fourthProgressCls: 'progress-incomplete',
                firstCardCls: '',
                secondCardCls: 'hidden',
                thirdCardCls: 'hidden',
                fourthCardCls: 'hidden',
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
                business_types: [
                    { id: 1, name: 'Building Contractor' },
                    { id: 2, name: 'Trade Services Contractor' },
                    { id: 3, name: 'Supplier' },
                    { id: 4, name: 'Design Consultant' },
                    { id: 5, name: 'Training and Education Provider' },
                ],
                states: [
                    'QLD', 'NSW', 'SA', 'VIC', 'WA', 'ACT', 'TAS', 'NT',
                ],
                input: {
                    first_name: '', last_name: '', email: '', password: '', password_confirmation: '',
                    company_name: '', sector: '', business_type: '', specialization: [],
                    company_address: '', company_contact: '', company_website: '', operate: '', selected: [],
                },
                errors: {
                    first_name: '', last_name: '', email: '', password: '',
                    company_name: '', sector: '', business_type: '', specialization: '',
                    company_address: '', company_contact: '', company_website: '', operate: '', selected: '',
                },
                endpoints: {
                    login: '/login',
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

            this.input.specialization.push('');
        },

        methods: {

            onChangeLocation(keyword) {
                this.locations = Api.getLocations(keyword);
            },

            onSelectLocation(location) {
                this.input.company_address = location;
                
                this.locations = [];
            },

            onKeyupSpecialization() {
                this.input.specialization = this.input.specialization.filter(r => r!=='');

                if (this.input.specialization.length == 0) {
                    this.input.specialization.push('');
                }
            },

            addNewEntity() {
                this.input.specialization = this.input.specialization.filter(r => r!=='');
                this.input.specialization.push('');
            },

            removeEntity(index) {
                if (this.input.specialization.length > 1) {
                    this.input.specialization.splice(index, 1);
                }
            },

            formatOperate(index) {
                if (index == 1) {
                    this.$refs['rc-checkbox-1'].checked = true;
                    this.$refs['rc-checkbox-0'].checked = false;
                    this.input.operate = 1;

                } else if (index == 0) {
                    this.$refs['rc-checkbox-1'].checked = false;
                    this.$refs['rc-checkbox-0'].checked = true;
                    this.input.operate = 0;
                } else {
                    this.$refs['rc-checkbox-1'].checked = false;
                    this.$refs['rc-checkbox-0'].checked = false;
                    this.input.operate = null;
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
                    
                    Bus.$emit('imageToCrop', reader.result, 0, 'Company');

                }, false);

                if (file) {
                    reader.readAsDataURL(file);
                }
            },

            onClickPrevious(curPage) {
                switch(curPage) {
                    case 2:
                        this.subHeader = 'About yourself';

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
                        this.subHeader = 'About the Business';

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
                        this.subHeader = 'About the Business';

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
                        this.subHeader = 'About the Business';

                        this.firstProgressCls = 'progress-complete';
                        this.secondProgressCls = 'progress-active';
                        this.thirdProgressCls = 'progress-incomplete';
                        this.fourthProgressCls = 'progress-incomplete';

                        this.firstCardCls = 'hidden';
                        this.secondCardCls = '';

                        break;

                    case 2:
                        this.subHeader = 'About the Business';

                        this.firstProgressCls = 'progress-complete';
                        this.secondProgressCls = 'progress-complete';
                        this.thirdProgressCls = 'progress-active';
                        this.fourthProgressCls = 'progress-incomplete';

                        this.secondCardCls = 'hidden';
                        this.thirdCardCls = '';

                        break;
                    
                    case 3:
                        this.subHeader = 'Location & Contact';

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