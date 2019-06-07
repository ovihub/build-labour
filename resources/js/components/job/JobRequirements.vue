<template>
    <div class="profile-item-2">
        <div class="profile-content">
            
            <!-- <span class="edit-icon"
                data-toggle="modal"
                data-backdrop="static"
                data-keyboard="false"
                data-target="#modalJobRequirements">

                <img src="/img/icons/editbutton.png"
                    srcset="/img/icons/editbutton@2x.png 2x, /img/icons/editbutton@3x.png 3x">
            </span> -->
            
            <div class="profile-title">
                <img src="/img/icons/requirements.png"
                    srcset="/img/icons/requirements@2x.png 2x, /img/icons/requirements@3x.png 3x">
                
                Requirements
            </div>

            <div v-if="qualifications.length > 0">
                <div class="job-title">Qualifications</div>
                <div class="job-body">
                    <ul class="job-list-items">
                        <li v-for="(qualification, index) in qualifications" :key="index">
                            {{ qualification }}
                        </li>
                    </ul>
                </div>
            </div>

            <div v-if="experience.length > 0">
                <div class="job-title">Experience</div>
                <div class="job-body">
                    <ul class="job-list-items">
                        <li v-for="(exp, index) in experience" :key="index">
                            {{ exp }}
                        </li>
                    </ul>
                </div>
            </div>

            <div v-if="skills.length > 0">
                <div class="job-title">Skills</div>
                <div class="job-body">
                    <ul class="job-list-items">
                        <li v-for="(skill, index) in skills" :key="index">
                            {{ skill }}
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
                qualifications: [],
                experience: [],
                skills: [],
            }
        },

        created() {
            let component = this;

            Bus.$on('jobRequirementsDetails', function(detailsArray) {
                if (detailsArray.length != 0) {
                    component.qualifications = detailsArray[0].items;
                    component.experience = detailsArray[1].items;
                    component.skills = detailsArray[2].items;
                }
            });
        },

        methods: {

        }
    }
</script>