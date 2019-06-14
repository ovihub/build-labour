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

        <button style="width:100%" v-if="show">
            Apply
        </button>

        <div v-else>
            <button style="width:100%" :disabled="disabled" @click="postJob(1)">
                Save as template
            </button>

            <button style="width:100%" :disabled="disabled" @click="postJob(0)">
                Post Job
            </button>
        </div>
    </div>
</template>

<script>
    export default {
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
            let component = this;

            Bus.$on('companySummaryDetails', function(details, action) {
                if (details) {
                    component.id = details.id;
                    component.photo_url = details.photo_url;
                    component.name = details.name;
                    component.address = details.address;
                    component.introduction = details.introduction;
                } 

                if (action == 'new') {
                    component.show = false;
                }
            });

            Bus.$on('postedJob', function() {
                component.disabled = false;
            });
        },

        methods: {

            postJob(isTemplate) {
                this.disabled = true;

                Bus.$emit('postJob', isTemplate);
            },

        }
    }
</script>