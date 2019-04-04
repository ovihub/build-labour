<template>
    <div class="profile-item-2">
        <div class="profile-content">
            <span class="edit-icon">
                <img src="/img/icons/editbutton.png"
                    srcset="/img/icons/editbutton@2x.png 2x, /img/icons/editbutton@3x.png 3x">
            </span>
            
            <span class="profile-title">
                <img src="/img/icons/education.png"
                    srcset="/img/icons/education@2x.png 2x, /img/icons/education@3x.png 3x">

                Education
            </span>
            
            <div v-for="education in educations" v-bind:key="education.id">
                <div class="row mt-4">
                    <div class="col-md-2 col-sm-2">
                        <img class="profile-role-image" src="/img/logo/1.jpg">
                    </div>
                    <div class="col-md-10 col-sm-10">
                        <div class="profile-role-name">
                            {{ education.course }}
                        </div>
                        <span class="profile-label mt-0 pt-0">
                            {{ education.school }}
                        </span>
                        <span class="profile-text mb-0 pb-0">
                            {{ education.start_date_formatted }} - {{ education.end_date_formatted }}
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                educations: []
            }
        },

        created() {
            let component = this;

            Bus.$on('educationDetails', function(detailsArray) {
                component.educations = detailsArray;
            });
        },

        methods: {
            
        }
    }
</script>