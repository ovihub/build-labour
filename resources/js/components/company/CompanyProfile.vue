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
                    <img class="sidebar-logo-image" src="/img/build-labour-logo-orange.png" 
                        srcset="/img/build-labour-logo-orange@2x.png 2x, /img/build-labour-logo-orange@3x.png 3x">
                </div>
            </div>
            <div class="profile-content-p20 pb-4">
                <div class="bl-label-22 m0">Richmond Surveying</div>
            
                <div class="bl-label-17 pb-3">
                    Surveyors
                </div>
                
                <div class="row bl-label-15">
                    <div class="bl-col-3">
                        <img class="text-icon-3" src="/img/icons/pinlocation.png"
                            srcset="/img/icons/pinlocation@2x.png 2x, /img/icons/pinlocation@3x.png 3x">
                    </div>
                    <div class="bl-col-4 bl-display">
                        Richmond, Victoria, Australia
                    </div>
                </div>

                <div class="row bl-label-15">
                    <div class="bl-col-3">
                        <img class="text-icon-3" src="/img/icons/pinlocation.png"
                            srcset="/img/icons/pinlocation@2x.png 2x, /img/icons/pinlocation@3x.png 3x">
                    </div>
                    <div class="bl-col-4 bl-display">
                        www.richmondsurveying.com.au
                    </div>
                </div>

                <div class="row bl-label-15">
                    <div class="bl-col-3">
                        <img class="text-icon-3" src="/img/icons/pinlocation.png"
                            srcset="/img/icons/pinlocation@2x.png 2x, /img/icons/pinlocation@3x.png 3x">
                    </div>
                    <div class="bl-col-4 bl-display">
                        (03) 3934 3829
                    </div>
                </div>
                
                <div class="bl-display">
                    <div class="bl-label-15-style-2 bl-mb20" style="margin-top:24px">
                        We are a modern, professional and sophisticated surveying firm specialising in land development,
                        construction and engineering surveying. We provide quality, cost-effective and efficient surveying service.
                    </div>
                </div>
                <div class="bl-label-16">
                    We specialise in
                </div>
                <div class="job-body">
                    <ul class="job-list-items">
                        <li>
                            Land Development
                        </li>
                        <li>
                            Construction
                        </li>
                        <li>
                            Engineering Surveying
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
                locations: [],
                profile_photo_url: '',
                profile_description: '',
                input: {
                    profile_description: '', first_name: '', last_name: '', address: '', education_id: '',
                },
                errors: {
                    profile_description: '', first_name: '', last_name: '', address: '', education_id: '',
                },
                endpoints: {
                    save: '/api/v1/worker/introduction',
                },
            }
        },

        created() {
            let component = this;

            Bus.$on('userProfileDetails', function(details) {

            });
        },

        methods: {

        }
    }
</script>