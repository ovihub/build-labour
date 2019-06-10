<template>
    <div class="profile-item-1" v-if="show">
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

                <div class="company-view">
                    <!-- TODO: add view company endpoint for worker type -->
                    <a :href="'/company/profile/' + id">
                        View Business
                    </a>
                </div>
            </div>
        
        </div>

        <button style="width:100%">
            Apply
        </button>
    </div>
    <div v-else>
        <button style="width:100%">
            Save as template
        </button>

        <button style="width:100%" @click="postJob">
            Post Job
        </button>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                show: true,
                id: '',
                photo_url: '',
                name: '',
                address: '',
                introduction: '',
            }
        },

        created() {
            let component = this;

            Bus.$on('companySummaryDetails', function(details) {
                if (details) {
                    component.id = details.id;
                    component.photo_url = details.photo_url;
                    component.name = details.name;
                    component.address = details.address;
                    component.introduction = details.introduction;
                
                } else {
                    component.show = false;
                }
            });
        },

        methods: {

            postJob() {
                Bus.$emit('postJob');
            }

        }
    }
</script>