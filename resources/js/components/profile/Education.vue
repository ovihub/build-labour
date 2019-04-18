<template>
    <div class="profile-item-2">
        <div class="profile-content">

            <record-form title="AddEducation" :record="input" save-endpoint="/api/v1/user/education"></record-form>

            <span class="edit-icon" data-toggle="modal" data-target="#modalAddEducation">
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
                    <div class="bl-col-1">
                        <img class="bl-image-56" src="/img/logo/1.jpg">
                    </div>
                    <div class="bl-col-2">
                        <div class="bl-display">
                            <span class="bl-label-16 bl-ml15">
                                {{ education.course }}
                            </span>
                            <span class="bl-label-15 bl-ml15 mt-0 pt-0">
                                {{ education.school }}
                            </span>
                            <span class="bl-label-14 bl-ml15 mb-0 pb-0">
                                {{ education.start_date_formatted }} - {{ education.end_date_formatted }}
                            </span>
                        </div>
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
                input: {
                    course: '', school: '', start_date: '', end_date: ''
                },
                educations: []
            }
        },

        created() {
            let component = this;

            Bus.$on('educationDetails', function(detailsArray) {
                component.educations = detailsArray;
            });

            Bus.$on('AddEducation', function(details) {
                component.educations.push(details);
            });
        },

        methods: {
            
        }
    }
</script>