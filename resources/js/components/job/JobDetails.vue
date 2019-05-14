<template>
    <div class="profile-item-2">
        <div class="profile-content">
            
            <span class="edit-icon"
                data-toggle="modal"
                data-backdrop="static"
                data-keyboard="false"
                data-target="#modalJobDetails">

                <img src="/img/icons/editbutton.png"
                    srcset="/img/icons/editbutton@2x.png 2x, /img/icons/editbutton@3x.png 3x">
            </span>
            
            <div class="profile-title">
                <img src="/img/icons/employmenthistory.png"
                    srcset="/img/icons/employmenthistory@2x.png 2x, /img/icons/employmenthistory@3x.png 3x">
                
                Job Details
            </div>

            <div class="job-header">
                Project Manager
            </div>

            <div class="job-title">
                Job Description
            </div>

            <div class="job-body">
                The Project Manager is accountable for the leadership and management of their nominated project
                including the achievement of safety, quality, commercial and programme objectives and the
                effective day to day management of the project team.
            </div>

            <div class="job-title">
                About the Project
            </div>

            <div class="job-body">
                $730 million Residential Skycraper comprising of 941 residential apartments and 208 serviced
                apartments across 88 storeys. 
            </div>

            <div class="job-title">
                Experience Level
            </div>

            <div class="job-body">
                Senior 
            </div>

            <div class="job-title">
                Contract type
            </div>

            <div class="job-body">
                Full-time permanent
            </div>

            <div class="job-title">
                Salary 
            </div>

            <div class="job-body">
                $ - - - , - - - 
            </div>

            <div class="job-title">
                Reports to
            </div>

            <div class="job-body">
                Construction Manager
                Construction Director
            </div>

            <div class="job-title">
                Location
            </div>

            <div class="job-body">
                South Yarra, Melbourne, Victoria
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

            Bus.$on('jobDetails', function(detailsArray) {
            
            });
        },

        methods: {

        }
    }
</script>