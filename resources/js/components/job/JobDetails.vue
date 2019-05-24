<template>
    <div class="profile-item-2">
        <div class="profile-content">
            
            <!-- <span class="edit-icon"
                data-toggle="modal"
                data-backdrop="static"
                data-keyboard="false"
                data-target="#modalJobDetails">

                <img src="/img/icons/editbutton.png"
                    srcset="/img/icons/editbutton@2x.png 2x, /img/icons/editbutton@3x.png 3x">
            </span> -->
            
            <div class="profile-title">
                <img src="/img/icons/jobdetails.png"
                    srcset="/img/icons/jobdetails@2x.png 2x, /img/icons/jobdetails@3x.png 3x">
                
                Job Details
            </div>

            <div class="job-header">
                {{ title }}
            </div>

            <div class="job-title">Job Description</div>
            <div class="job-body">
                {{ description }}
            </div>

            <div class="job-title">About the Project</div>
            <div class="job-body">
                {{ about }}
            </div>

            <div class="job-title">Experience Level</div>
            <div class="job-body">
                {{ exp_level }} 
            </div>

            <div class="job-title">Contract type</div>
            <div class="job-body">
                {{ contract_type }}
            </div>

            <div class="job-title">Salary</div>
            <div class="job-body">
                $ - - - , - - - 
            </div>

            <div class="job-title">Reports to</div>
            <div class="job-body">
                <ul class="job-list-items-2">
                    <li v-for="(item, index) in reports_to" :key="index">
                        {{ item }}
                    </li>
                </ul>
            </div>

            <div class="job-title">Location</div>
            <div class="job-body">
                {{ location }}
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                title: '',
                description: '',
                about: '',
                exp_level: '',
                contract_type: '',
                salary: '',
                reports_to: [],
                location: '',
            }
        },

        created() {
            let component = this;

            Bus.$on('jobDetails', function(details) {
                component.title = details.title;
                component.description = details.description;
                component.about = details.about;
                component.exp_level = details.exp_level;
                component.contract_type = details.contract_type;
                component.salary = details.salary;
                component.reports_to = details.reports_to;
                component.location = details.location;
            });
        },

        methods: {

        }
    }
</script>