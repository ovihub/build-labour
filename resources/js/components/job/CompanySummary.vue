<template>
    <div class="profile-item-1">
        <div class="company-image">
            <img v-if="photo_url" :src="photo_url">
            <avatar v-else cls="" size="110" border="0" border-radius="8px"></avatar>
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

                <div class="company-view" v-if="show">
                    <a :href="'/company/profile/' + id">
                        View Business
                    </a>
                </div>
            </div>
        
        </div>

        <button style="width: 100%;" v-if="show">
            Apply
        </button>
    </div>
</template>

<script>
    import Avatar from '../common/Avatar';
    
    export default {
        name: "company-summary",
        data() {
            return {
                show: true,
                disabled: false,
                id: '',
                photo_url: '',
                name: '',
                address: '',
                introduction: '',
            }
        },
        created() {
            let vm = this;

            Bus.$on('companySummaryDetails', function(details, action) {
                if (details) {
                    vm.id = details.id;
                    vm.photo_url = details.photo_url;
                    vm.name = details.name;
                    vm.address = details.address;
                    vm.introduction = details.introduction;
                } 

                if (action == 'new') {
                    vm.show = false;
                }
            });
        },
        methods: {

        },
        components: {
            Avatar,
        },
    }
</script>