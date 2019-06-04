<template>
    <div class="profile-item-1">
        <div class="profile-content">
            
            <photo-modal></photo-modal>
            
            <main-modal id="modalCompanyProfile">
		
                <template slot="custom-modal-title">
                    <h4 class="modal-title">Edit Introduction</h4>
                    <div class="close" data-dismiss="modal" @click="close">&times;</div>
                </template>

                <template slot="custom-modal-content">
                    <form class="modal-form" method="POST" @submit.prevent="submit">
                        <div class="skill-label">Company Overview</div>
                        <textarea rows="4" ref="companyIntro" class="form-control" style="overflow:hidden"
                            placeholder="Example: We are a modern, professional and sophisticated surveying firm specialising in land development, construction and engineering surveying. We provide quality, cost-effective and efficient surveying service."
                            @keyup="textAreaAdjust()" v-model="input.introduction"></textarea>
                        
                        <span class="err-msg" v-if="errors.introduction">
                            {{ errors.introduction }}
                        </span>

                        <div class="emp-row">
                            <div class="modal-form-label">Company Name</div>
                            <input id="name" type="text" name="name" class="form-control" style="padding-left:24px"
                                v-model="input.name" required />

                            <span class="err-msg" v-if="errors.name">
                                {{ errors.name }}
                            </span>
                        </div>

                        <div class="emp-row">
                            <div class="modal-form-label">Location</div>
                            <input class="form-control" type="text" v-model="input.address"
                                @keyup="onChangeLocation(input.address)" />
                            
                            <span class="err-msg" v-if="errors.address">
                                {{ errors.address }}
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

                        <div class="emp-row">
                            <div class="modal-form-label">Website</div>
                            <input class="form-control" type="text" v-model="input.website" />

                            <span class="err-msg" v-if="errors.website">
                                {{ errors.website }}
                            </span>
                        </div>

                        <div class="emp-row">
                            <div class="modal-form-label">Phone</div>
                            <input class="form-control" type="text" v-model="input.phone" />

                            <span class="err-msg" v-if="errors.phone">
                                {{ errors.phone }}
                            </span>
                        </div>

                        <div class="skill-label" style="margin-bottom:-15px">Company Details</div>

                        <div class="emp-row">
                            <div class="modal-form-label">Business Entity Type</div>
                            <select v-model="input.business_type.id" style="background-position:480px">
                                <option v-for="(type, index) in business_types" :key="index" v-bind:value="type.id">
                                    {{ type.business_type }}
                                </option>
                            </select> 
                        </div>
                        <span class="err-msg" v-if="errors.business_type">
                            {{ errors.business_type }}
                        </span>

                        <div class="emp-row">
                            <div class="modal-form-label">Entity Type Specialisation</div>
                            <select v-model="input.tier.id" style="background-position:480px">
                                <option v-for="(tier, index) in tiers" :key="index" v-bind:value="tier.id">
                                    {{ tier.tier_name }}
                                </option>
                            </select> 
                        </div>
                        <span class="err-msg" v-if="errors.tier">
                            {{ errors.tier }}
                        </span>

                        <div class="comp-label">
                            What is your main company function?
                        </div>
                        <div class="emp-row">
                            <select v-model="input.main_function.id" style="background-position:480px"
                                @change="onChangeMainCompanyFunctions">
                                
                                <option value="" disabled selected style="display:none">Company Specialisation</option>
                                <option v-for="(main, index) in main_functions" :key="index" v-bind:value="main.id">
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
                            v-for="(spec, index) in input.secondary_functions"
                            :key="index">

                            <div class="comp-col-left">
                                <select v-model="spec.id">
                                    <option value="" disabled selected style="display:none">Company Specialisation</option>
                                    <option v-for="type in specialization"
                                        :key="type.id"
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

                    </form>
                </template>

                <template slot="custom-modal-footer">
                    <button class="pull-right" type="submit" @click="submit" :disabled="disabled">
                        Save Changes
                    </button>
                </template>

            </main-modal>

            <span class="edit-icon edit-icon-2"
                data-toggle="modal"
                data-backdrop="static"
                data-keyboard="false"
                data-target="#modalCompanyProfile"
                @click="open">

                <img src="/img/icons/editbutton.png"
                    srcset="/img/icons/editbutton@2x.png 2x, /img/icons/editbutton@3x.png 3x">
            </span>

            <input type="file" id="upload" value="Choose a file" accept="image/*" style="display:none" @change="onFileChange" />
            
            <div class="profile-header" >
                <div class="company-image" @click="onClickProfilePhoto">
                    <img v-if="photo_url" :src="photo_url">
                    <avatar v-else cls="" size="110" border="0" border-radius="8px"></avatar>
                </div>
            </div>
            <div class="profile-content-p20 pb-4">
                <div class="bl-label-22 m0">{{ name }}</div>
            
                <div class="bl-label-17 pb-3" v-if="main_function">
                    {{ main_function.main_name }}
                </div>
                
                <div class="row bl-label-15" v-if="address">
                    <div class="bl-col-3">
                        <img class="text-icon-3" src="/img/icons/pinlocation.png"
                            srcset="/img/icons/pinlocation@2x.png 2x, /img/icons/pinlocation@3x.png 3x">
                    </div>
                    <div class="bl-col-4 bl-display">
                        {{ address }}
                    </div>
                </div>

                <div class="row bl-label-15" v-if="website">
                    <div class="bl-col-3">
                        <img class="text-icon-5" src="/img/icons/globe.png"
                            srcset="/img/icons/globe@2x.png 2x, /img/icons/globe@3x.png 3x">
                    </div>
                    <div class="bl-col-4 bl-display">
                        {{ website }}
                    </div>
                </div>

                <div class="row bl-label-15"  v-if="phone">
                    <div class="bl-col-3">
                        <img class="text-icon-5" src="/img/icons/phone.png"
                            srcset="/img/icons/phone@2x.png 2x, /img/icons/phone@3x.png 3x">
                    </div>
                    <div class="bl-col-4 bl-display">
                        {{ phone }}
                    </div>
                </div>

                <div class="row bl-label-15"  v-if="business_type.business_type || tier.tier_name">
                    <div class="bl-col-3">
                        <img class="text-icon-5" src="/img/icons/industrysegment.png"
                            srcset="/img/icons/industrysegment@2x.png 2x, /img/icons/industrysegment@3x.png 3x">
                    </div>
                    <div class="bl-col-4 bl-display">
                        {{ business_type.business_type }} • {{ tier.tier_name }}
                    </div>
                </div>
                
                <div class="bl-display" v-if="introduction">
                    <div class="bl-label-15-style-2" style="margin-top:24px">
                        {{ introduction }}
                    </div>
                </div>
                <div class="bl-label-16 bl-mt20" v-if="secondary_functions.length != 0">
                    We specialise in
                </div>
                <div class="job-body">
                    <ul class="job-list-items">
                        <li v-for="(spec, index) in secondary_functions" :key="index">
                            {{ spec.secondary_name }}
                        </li>
                    </ul>
                </div>
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
                time_out: false,
                locations: [],
                photo_url: '',
                name: '',
                business_type: '',
                tier: '',
                address: '',
                website: '',
                phone: '',
                introduction: '',
                main_function: '',
                business_types: [],
                tiers: [],
                main_functions: [],
                secondary_functions: [],
                specialization: [],
                input: {
                    name: '', address: '', website: '', phone: '', introduction: '',
                    business_type: { id: 0, business_type: '' }, 
                    tier: { id: 0, tier_name: '' },
                    main_function: { id: 0, main_name: '' },
                    business_type_id: '', tier_id: '', main_company_id: '',
                    secondary_functions: [],
                },
                errors: {
                    name: '', business_type: '', tier: '', address: '', website: '', phone: '', introduction: '',
                    main_function: '', secondary_functions: '',
                },
                endpoints: {
                    save: '/api/v1/company/update',
                    secondary_options: '/api/v1/company/options/',
                },
            }
        },

        created() {
            let component = this;

            Bus.$on('companyProfileDetails', function(details) {
                component.setValues(details);
                component.setDisplayValues(component.input, details);
            });

            this.getCompanyOptions();
        },

        methods: {

            getCompanyOptions() {
                let component = this;

                Promise.resolve(Api.getCompanyOptions()).then(function(data) {
                    
                    component.business_types = data.business_types;
                    component.tiers = data.tiers;
                    component.main_functions = data.main_company_functions;
                });
            },

            setValues(details) {
                this.photo_url = details.photo_url;
                this.name = details.name;
                this.address = details.address;
                this.website = details.website;
                this.phone = details.phone;
                this.introduction = details.introduction;
                this.business_type = details.business_type ? details.business_type : { id: 0, business_type: '' };
                this.tier = details.tier ? details.tier : { id: 0, tier_name: '' };
                this.main_function = details.main_function ? details.main_function : { id: 0, main_name: '' };
                this.secondary_functions = details.specialization;

                this.getSecondaryOptions(details.main_function.id);
            },

            setDisplayValues(val, details) {
                val.name = details.name;
                val.address = details.address;
                val.website = details.website;
                val.phone = details.phone;
                val.introduction = details.introduction;
                val.business_type = details.business_type ? details.business_type : { id: 0, business_type: '' };
                val.tier = details.tier ? details.tier : { id: 0, tier_name: '' };
                val.main_function = details.main_function ? details.main_function : { id: 0, main_name: '' };
                val.secondary_functions = details.specialization;
            },

            getSecondaryOptions(id) {
                let component = this;

                axios.get(component.endpoints.secondary_options + id, Utils.getBearerAuth())

                    .then(function(response) {
                        
                        component.specialization = response.data.data;
                    })
                    .catch(function(error) {

                        Utils.handleError(error);
                    });
            },

            textAreaAdjust(index) {
                let o = this.$refs['companyIntro'];
                
                o.style.height = '1px';
                o.style.height = (2 + o.scrollHeight) + 'px';
            },

            open() {

            },

            close() {
                this.setDisplayValues(this.input, this);
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

            onChangeMainCompanyFunctions(e) {
                this.input.secondary_functions = [];
                
                this.getSecondaryOptions(e.target.value);
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
                this.input.address = location;
                
                this.locations = [];
            },

            addNewEntity() {
                let component  = this;

                this.input.secondary_functions.push({
                    id: 0,
                    main_id: component.main_function.id,
                    secondary_name: '',
                });
            },

            removeEntity(index) {
                if (this.input.secondary_functions.length > 1) {
                    this.input.secondary_functions.splice(index, 1);
                }
            },

            async submit() {
                let component = this;
                let espArray = [];
                
                Utils.setObjectValues(this.errors, '');

                this.disabled = true;
                
                for (let i = 0; i < component.input.secondary_functions.length; i++) {
                    espArray.push(component.input.secondary_functions[i].id);
                }

                component.input.secondary_functions = espArray;
                component.input.business_type_id = component.input.business_type.id;
                component.input.tier_id = component.input.tier.id;
                component.input.main_company_id = component.input.main_function.id;

                await axios.post(component.endpoints.save, component.$data.input, Utils.getBearerAuth())
                    
                    .then(function(response) {
                        let data = response.data;
						
                        $('#modalCompanyProfile').modal('hide');

                        component.setDisplayValues(component, data.data.company);
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