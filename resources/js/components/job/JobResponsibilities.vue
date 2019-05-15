<template>
    <div class="profile-item-2">
        <div class="profile-content">
            
            <span class="edit-icon"
                data-toggle="modal"
                data-backdrop="static"
                data-keyboard="false"
                data-target="#modalJobResponsibilities">

                <img src="/img/icons/editbutton.png"
                    srcset="/img/icons/editbutton@2x.png 2x, /img/icons/editbutton@3x.png 3x">
            </span>
            
            <div class="profile-title">
                <img src="/img/icons/responsibilities-orange.png"
                    srcset="/img/icons/responsibilities-orange@2x.png 2x, /img/icons/responsibilities-orange@3x.png 3x">
                
                Responsibilities
            </div>
        
            <div class="job-title">
                Quality Management 
            </div>

            <div class="job-body">
                <ul class="job-list-items">
                    <li>
                        Comply with and ensure project works are in accordance with Probuild QM Policies, Plans and Procedures.
                    </li>
                    <li>
                        Lead and drive a “Quality Built In” culture.
                    </li>
                    <li>
                        Ensure systems and processes are in place to manage quality planning processes and the application of risk management methods.
                    </li>
                    <li>
                        Ensure project team effectively manage the quality performance of subcontractors and implement improvements.
                    </li>
                </ul>
            </div>

            <div class="job-title">
                Next Title
            </div>

            <div class="job-body">
                <ul class="job-list-items">
                    <li>
                        Comply with and ensure project works are in accordance with Probuild QM Policies, Plans and Procedures.
                    </li>
                    <li>
                        Lead and drive a “Quality Built In” culture.
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

            Bus.$on('jobResponsibilities', function(detailsArray) {
            
            });
        },

        methods: {

        }
    }
</script>