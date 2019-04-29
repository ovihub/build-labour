<template>
    <div class="profile-item-2">
        <div class="profile-content">

            <education-modal></education-modal>

            <span class="add-icon" data-toggle="modal" data-backdrop="static" data-keyboard="false" data-target="#modalEducation" @click="action(-1, null)">
                <img src="/img/icons/plus.png"
                    srcset="/img/icons/plus@2x.png 2x, /img/icons/plus@3x.png 3x">
            </span>
            
            <span class="profile-title">
                <img src="/img/icons/education.png"
                    srcset="/img/icons/education@2x.png 2x, /img/icons/education@3x.png 3x">

                Education
            </span>
            
            <div v-for="(education, idx) in educations" :key="idx">
                <span class="edit-icon" data-toggle="modal" data-backdrop="static" data-keyboard="false" data-target="#modalEducation" @click="action(idx, education)">
                    <img src="/img/icons/editbutton.png"
                        srcset="/img/icons/editbutton@2x.png 2x, /img/icons/editbutton@3x.png 3x">
                </span>
                <div class="row mt-4">
                    <div class="bl-col-1">
                        <img class="bl-image-56" src="/img/logo/1.jpg">
                    </div>
                    <div class="bl-col-2">
                        <div class="bl-display">
                            <span class="bl-label-16 bl-ml15" :ref="'eduCourse-' + idx">
                                {{ education.course }}
                            </span>
                            <span class="bl-label-15 bl-ml15 mt-0 pt-0" :ref="'eduSchool-' + idx">
                                {{ education.school }}
                            </span>
                            <span class="bl-label-14 bl-ml15 mb-0 pb-0" :ref="'eduPeriod-' + idx">
                                {{ getPeriod(education) }}
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
                educations: [],
            }
        },

        created() {
            let component = this;

            Bus.$on('educationDetails', function(detailsArray) {
                component.educations = detailsArray;
            });

            Bus.$on('updateEducation', function(index, details) {
                if (index == -1) {
                    component.educations.push(details);
                
                } else {
                    component.educations[index] = details;

                    component.$refs['eduCourse-' + index][0].textContent = details.course;
                    component.$refs['eduSchool-' + index][0].textContent = details.school;
                    component.$refs['eduPeriod-' + index][0].textContent = component.getPeriod(details);
                }
            });
        },

        methods: {

            getPeriod(edu) {
                return Utils.getMonth(edu.start_month - 1) + ' ' + edu.start_year + ' - ' + 
                       Utils.getMonth(edu.end_month - 1) + ' ' + edu.end_year;
            },

            action(index, education) {
                Bus.$emit('showEducation', index, education);
            },
        }
    }
</script>