<template>
    <div>
        <div v-for="(education, idx) in educations" :key="idx">
            <span class="edit-icon edit-icon-3"
                data-toggle="modal"
                data-backdrop="static"
                data-keyboard="false"
                data-target="#modalEducation"
                @click="action(idx)">

                <img src="/img/icons/editbutton.png"
                    srcset="/img/icons/editbutton@2x.png 2x, /img/icons/editbutton@3x.png 3x">
            </span>
            <div class="jobads-row mt-4">
                <div class="bl-col-1">
                    <img class="bl-image-56" style="margin-top:0px" src="/img/logo/1.jpg">
                </div>
                <div class="bl-col-2" style="margin-top:-4px">
                    <div class="bl-display">
                        <span class="bl-label-16 bl-ml15" :ref="'eduCourse-' + idx">
                            {{ education.course ? education.course.course_name : education.course_name }}
                        </span>
                        <span class="bl-label-15 bl-ml15 mt-0 pt-0" :ref="'eduSchool-' + idx">
                            {{ education.school }}
                        </span>
                        <span class="bl-label-14 bl-ml15 mb-0 pb-0" :ref="'eduPeriod-' + idx">
                            {{ formatPeriod(education) }}
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

                    component.$refs['eduCourse-' + index][0].textContent = details.course ? details.course.course_name : details.course_name;
                    component.$refs['eduSchool-' + index][0].textContent = details.school;
                    component.$refs['eduPeriod-' + index][0].textContent = component.formatPeriod(details);
                }
            });

            Bus.$on('removeEducation', function(index, id) {
                component.educations.splice(index, 1);
            });
        },

        methods: {

            formatPeriod(edu) {
                if (! edu.end_month || ! edu.end_year) {
                    return Utils.getMonth(edu.start_month - 1) + ' ' + edu.start_year + ' - Present (Currently Studying)';
                }

                return Utils.getMonth(edu.start_month - 1) + ' ' + edu.start_year + ' - ' + 
                       Utils.getMonth(edu.end_month - 1) + ' ' + edu.end_year;
            },

            action(index) {
                Bus.$emit('showEducation', index, index != -1 ?  this.educations[index] : null);
            },
        }
    }
</script>