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
                        <div class="emp-row">
                            <div class="modal-form-label">Company Name</div>
                            <input id="name" type="text" name="name" class="form-control" style="padding-left:24px"
                                v-model="input.name" placeholder="Company Name" required />

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

                        <div class="skill-label">Company Overview</div>
                        <textarea rows="4" ref="companyIntro" class="form-control" style="overflow:hidden"
                            placeholder="Example: We are a modern, professional and sophisticated surveying firm specialising in land development, construction and engineering surveying. We provide quality, cost-effective and efficient surveying service."
                            @keyup="textAreaAdjust()" v-model="input.introduction"></textarea>
                        
                        <span class="err-msg" v-if="errors.introduction">
                            {{ errors.introduction }}
                        </span>
                        
                        <div class="emp-label" style="margin-bottom:17px">Specialization</div>
                        <textarea class="form-control" style="overflow:hidden"
                            rows="1"
                            v-for="(esp, index) in input.specialization"
                            :id="esp.id"
                            :ref="'espItem-' + index" 
                            :key="index"
                            v-model="input.specialization[index].secondary_name"
                            placeholder="Add Another Specialization"
                            @focus="espTextAreaAdjust(index)"
                            @keyup="onChangeSpecialization(index)">
                        </textarea>

                    </form>
                </template>

                <template slot="custom-modal-footer">
                    <button class="pull-right" type="submit" @click="submit" :disabled="disabled">Save Changes</button>
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
                    {{ main_function }}
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

                <div class="row bl-label-15"  v-if="business_type || tier">
                    <div class="bl-col-3">
                        <img class="text-icon-5" src="/img/icons/globe.png"
                            srcset="/img/icons/globe@2x.png 2x, /img/icons/globe@3x.png 3x">
                    </div>
                    <div class="bl-col-4 bl-display">
                        {{ business_type }} • {{ tier }}
                    </div>
                </div>
                
                <div class="bl-display" v-if="introduction">
                    <div class="bl-label-15-style-2" style="margin-top:24px">
                        {{ introduction }}
                    </div>
                </div>
                <div class="bl-label-16 bl-mt20" v-if="specialization.length != 0">
                    We specialise in
                </div>
                <div class="job-body">
                    <ul class="job-list-items">
                        <li v-for="(spec, index) in specialization" :key="index">
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
                specialization: [],
                input: {
                    name: '', business_type: '', tier: '', address: '', website: '', phone: '', introduction: '',
                    main_function: '', specialization: [],
                },
                errors: {
                    name: '', business_type: '', tier: '', address: '', website: '', phone: '', introduction: '',
                    main_function: '', specialization: '',
                },
                endpoints: {
                    save: '/api/v1/company/update',
                },
            }
        },

        created() {
            let component = this;

            Bus.$on('companyProfileDetails', function(details) {
                component.setValues(details);
                component.setDisplayValues(component.input, details);
            });
        },

        methods: {

            setValues(details) {
                this.photo_url = details.photo_url;
                this.name = details.name;
                this.business_type = details.business_type;
                this.tier = details.tier;
                this.address = details.address;
                this.website = details.website;
                this.phone = details.phone;
                this.introduction = details.introduction;
                this.main_function = details.main_function;
                this.specialization = details.specialization;
            },

            setDisplayValues(val, details) {
                val.name = details.name;
                val.business_type = details.business_type;
                val.tier = details.tier;
                val.address = details.address;
                val.website = details.website;
                val.phone = details.phone;
                val.introduction = details.introduction;
                val.main_function = details.main_function;
                val.specialization = details.specialization;

                this.input.specialization = this.input.specialization.filter(r => r.secondary_name !== '');
                this.input.specialization.push({ secondary_name: '' });
            },

            textAreaAdjust(index) {
                let o = this.$refs['companyIntro'];
                
                o.style.height = '1px';
                o.style.height = (2 + o.scrollHeight) + 'px';
            },

            espTextAreaAdjust(index) {
                let o = this.$refs['espItem-' + index][0];

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

            onChangeLocation(location) {
                this.locations = Api.getLocations(location);
            },

            onSelectLocation(location) {
                this.input.address = location;
                
                this.locations = [];
            },

            onChangeSpecialization(index) {
                this.espTextAreaAdjust(index);

                this.input.specialization = this.input.specialization.filter(r => r.secondary_name !== '');
                this.input.specialization.push({ secondary_name: '' });
            },

            async submit() {
                let component = this;
                let espArray = [];
                
                Utils.setObjectValues(this.errors, '');

                this.disabled = true;
                
                for (let i = 0; i < component.input.specialization.length; i++) {
                    let espId = this.$refs['espItem-' + i][0].id,
                        espName = this.$refs['espItem-' + i][0].value;

                    if (espName != '') {
                        espArray.push({
                            id: espId,
                            name: espName
                        })
                    }
                }

                component.input.specialization = espArray;

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