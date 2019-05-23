<template>
    <div class="profile-item-2">
        <div class="profile-content">
            
            <span class="edit-icon"
                data-toggle="modal"
                data-backdrop="static"
                data-keyboard="false"
                data-target="#modalJobRequirements">

                <img src="/img/icons/editbutton.png"
                    srcset="/img/icons/editbutton@2x.png 2x, /img/icons/editbutton@3x.png 3x">
            </span>
            
            <div class="profile-title">
                <img src="/img/icons/requirements.png"
                    srcset="/img/icons/requirements@2x.png 2x, /img/icons/requirements@3x.png 3x">
                
                Requirements
            </div>
        
            <div class="job-title">
                Qualifications 
            </div>

            <div class="job-body">
                <ul class="job-list-items">
                    <li>
                        Bachelor Degree in Construction or a related field
                    </li>
                </ul>
            </div>

            <div class="job-title">
                Experience
            </div>

            <div class="job-body">
                <ul class="job-list-items">
                    <li>
                        Minimum of 10 years industry experience
                    </li>
                    <li>
                        Experienced in leading teams
                    </li>
                </ul>
            </div>

            <div class="job-title">
                Skills
            </div>

            <div class="job-body">
                <ul class="job-list-items">
                    <li>
                        Able to mentor and become involved in on the job training of others.
                    </li>
                </ul>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {

            }
        },

        created() {
            let component = this;

            Bus.$on('jobRequirements', function(detailsArray) {
            
            });
        },

        methods: {

        }
    }
</script>