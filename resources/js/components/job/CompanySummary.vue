<template>
    <div class="profile-item-1">
        <div class="company-image">
            <img :src="photo_url">
        </div>

        <div class="profile-content" style="margin-top:-56px">
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
                    <!-- TODO: add view company endpoint for worker type -->
                    <a :href="'/company/profile'">
                        View Business
                    </a>
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