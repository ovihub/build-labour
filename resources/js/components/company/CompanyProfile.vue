<template>
    <div class="profile-item-1">
        <div class="profile-content">
            
            <photo-modal></photo-modal>
            
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
                <!-- <img v-if="profile_photo_url" class="profile-picture" :src="profile_photo_url" alt="" @click="onClickProfilePhoto">
                <div v-else @click="onClickProfilePhoto">
                    <avatar cls="profile-picture" size="110" border="0"></avatar>
                </div> -->
                <div class="company-image">
                    <img :src="photo_url" @click="onClickProfilePhoto">
                </div>
            </div>
            <div class="profile-content-p20 pb-4">
                <div class="bl-label-22 m0">{{ name }}</div>
            
                <div class="bl-label-17 pb-3">
                    Surveyors
                </div>
                
                <div class="row bl-label-15">
                    <div class="bl-col-3">
                        <img class="text-icon-3" src="/img/icons/pinlocation.png"
                            srcset="/img/icons/pinlocation@2x.png 2x, /img/icons/pinlocation@3x.png 3x">
                    </div>
                    <div class="bl-col-4 bl-display">
                        {{ address }}
                    </div>
                </div>

                <div class="row bl-label-15">
                    <div class="bl-col-3">
                        <img class="text-icon-5" src="/img/icons/globe.png"
                            srcset="/img/icons/globe@2x.png 2x, /img/icons/globe@3x.png 3x">
                    </div>
                    <div class="bl-col-4 bl-display">
                        {{ contact_email }}
                    </div>
                </div>

                <div class="row bl-label-15">
                    <div class="bl-col-3">
                        <img class="text-icon-5" src="/img/icons/phone.png"
                            srcset="/img/icons/phone@2x.png 2x, /img/icons/phone@3x.png 3x">
                    </div>
                    <div class="bl-col-4 bl-display">
                        {{ phone }}
                    </div>
                </div>
                
                <div class="bl-display">
                    <div class="bl-label-15-style-2 bl-mb20" style="margin-top:24px">
                        {{ introduction }}
                    </div>
                </div>
                <div class="bl-label-16" v-if="specializations">
                    We specialise in
                </div>
                <div class="job-body">
                    <ul class="job-list-items" v-for="(spec, index) in specializations" :key="index">
                        <li>
                            {{ spec }}
                        </li>
                    </ul>
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
                photo_url: '',
                name: '',
                address: '',
                contact_email: '',
                phone: '',
                introduction: '',
                specialization: [],
                input: {
                    name: '', address: '', contact_email: '', phone: '', introduction: '', specialization: []
                },
                errors: {
                    name: '', address: '', contact_email: '', phone: '', introduction: '', specialization: ''
                },
                endpoints: {
                    save: '',
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
                this.address = details.address;
                this.contact_email = details.contact_email;
                this.phone = details.phone;
                this.introduction = details.introduction;
                this.specialization = details.specialization;
            },

            setDisplayValues(val, details) {
                val.name = details.name;
                val.address = details.address;
                val.contact_email = details.contact_email;
                val.phone = details.phone;
                val.introduction = details.introduction;
                val.specialization = details.specialization;
            },

            open() {

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
        }
    }
</script>