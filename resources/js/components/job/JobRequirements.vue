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
                <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" viewBox="0 0 23 23">
                    <g fill="none" fill-rule="evenodd">
                        <path d="M0 0h23v23H0z"/>
                        <path fill="#00aeef" fill-rule="nonzero" d="M10 3a1 1 0 0 1 1-1h1a1 1 0 0 1 1 1h2a1 1 0 0 1 0 2H8a1 1 0 1 1 0-2h2zM6.525 4A1.25 1.25 0 0 0 7.75 5.5h7.5A1.25 1.25 0 0 0 16.475 4H17a2 2 0 0 1 2 2v13a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h.525zM6.5 7a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1h1a1 1 0 0 0 1-1V8a1 1 0 0 0-1-1h-1zm0 .5h1A.5.5 0 0 1 8 8v1a.5.5 0 0 1-.5.5h-1A.5.5 0 0 1 6 9V8a.5.5 0 0 1 .5-.5zm0 8.5a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1h1a1 1 0 0 0 1-1v-1a1 1 0 0 0-1-1h-1zm0 .5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1A.5.5 0 0 1 6 18v-1a.5.5 0 0 1 .5-.5zm0-5a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1h1a1 1 0 0 0 1-1v-1a1 1 0 0 0-1-1h-1zm0 .5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5zm4-4a.5.5 0 1 0 0 1h6a.5.5 0 1 0 0-1h-6zm0 4.5a.5.5 0 1 0 0 1h6a.5.5 0 1 0 0-1h-6zm0 4.5a.5.5 0 1 0 0 1h6a.5.5 0 1 0 0-1h-6z"/>
                    </g>
                </svg>

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
                if (detailsArray && detailsArray.length != 0) {
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