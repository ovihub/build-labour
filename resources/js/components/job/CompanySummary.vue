<template>
    <div class="profile-item-1">
        <div class="company-image">
            <img :src="photo_url">
        </div>

        <div class="profile-content" style="margin-top:-56px">
            <span class="edit-icon edit-icon-4"
                data-toggle="modal"
                data-backdrop="static"
                data-keyboard="false"
                data-target="#modalCompanyProfile">

                <img src="/img/icons/editbutton.png"
                    srcset="/img/icons/editbutton@2x.png 2x, /img/icons/editbutton@3x.png 3x">
            </span>

            <div class="profile-content-p20 pb-4">
                <div class="company-title">
                    {{ name }}
                </div>
            
                <div class="company-address">
                    {{ address }}
                </div>
                
                <div class="company-body">
                    {{ introduction }}
                </div>

                <div class="company-view">
                    View Business
                </div>
            </div>
        
        </div>

        <button style="width:100%">
            Apply
        </button>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                id: '',
                company_id: '',
                photo_url: '',
                name: '',
                address: '',
                introduction: '',
            }
        },

        created() {
            let component = this;

            Bus.$on('companySummaryDetails', function(details) {
                component.company_id = details.company_id;
                component.photo_url = details.photo_url;
                component.name = details.name;
                component.address = details.address;
                component.introduction = details.introduction;
            });
        },

        methods: {

        }
    }
</script>