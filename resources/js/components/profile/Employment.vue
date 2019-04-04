<template>
    <div class="profile-item-2 m0">
        <div class="profile-content">
            <span class="edit-icon">
                <img src="/img/icons/editbutton.png"
                    srcset="/img/icons/editbutton@2x.png 2x, /img/icons/editbutton@3x.png 3x">
            </span>
            
            <div class="profile-title">
                <img src="/img/icons/employmenthistory.png"
                    srcset="/img/icons/employmenthistory@2x.png 2x, /img/icons/employmenthistory@3x.png 3x">
                
                Employment History
            </div>
        
            <ul class="list-main-items">
                <li class="main-items-top">
                    <span class="text-icon-2" v-if="expanded === false">
                        <img src="/img/icons/expand.png"
                            srcset="/img/icons/expand@2x.png 2x, /img/icons/expand@3x.png 3x"
                            @click="expand">
                    </span>
                    <span class="text-icon-2" v-if="expanded">
                        <img src="/img/icons/collapse.png"
                            srcset="/img/icons/collapse@2x.png 2x, /img/icons/collapse@3x.png 3x"
                            @click="collapse">
                    </span>
                    <div class="row mt-2 mb-2">
                        <div class="col-md-2 col-sm-2">
                            <img class="profile-role-image" src="/img/logo/1.jpg">
                        </div>

                        <div class="col-md-10 col-sm-10">
                            <div class="profile-role-name">Project Manager</div>
                            <span class="profile-label mt-0 pt-0">Probuild</span>
                            <span class="profile-text">2 years and 4 months</span>
                        </div>
                    </div>
                    
                    <div class="row" v-if="expanded">
                        <div class="col-md-2 col-sm-2">

                        </div>
                        <div class="col-md-10 col-sm-10">
                            <span class="employment-label">
                                <img class="text-icon" src="/img/icons/pinlocation.png"
                                    srcset="/img/icons/pinlocation@2x.png 2x, /img/icons/pinlocation@3x.png 3x">
                                Richmond, Victoria, Australia
                            </span>
                            <span class="employment-label">
                                <img class="text-icon" src="/img/icons/dollarsign.png"
                                    srcset="/img/icons/dollarsign@2x.png 2x, /img/icons/dollarsign@3x.png 3x">
                                $1,750,000
                            </span>
                            <span class="employment-label">
                                <img class="text-icon" src="/img/icons/responsibilities.png"
                                    srcset="/img/icons/responsibilities@2x.png 2x, /img/icons/responsibilities@3x.png 3x">
                                Responsibilities:
                            </span>
                            <div class="profile-label">
                                <ul class="list-items">
                                    <li>
                                        Meeting with engineers, architects and contractors
                                        on an ongoing basis regarding project objective
                                        and progress
                                    </li>
                                    <li>
                                        Managing and motivating site foremen and teams
                                    </li>
                                    <li>
                                        Ensuring all equipment needed is available on site
                                    </li>
                                    <li>
                                        Conducting ongoing quality inspections
                                    </li>
                                    <li>
                                        Ensuring the construction process starts and ends
                                        on time, and ensuring  daily and weekly deadlines
                                        are met
                                    </li>
                                    <li>
                                        Ensuring budget costs relating to wages,
                                        contractors, materials and equipment aren't
                                        exceeded
                                    </li>
                                    <li>
                                        Approving purchase requests
                                    </li>
                                    <li>
                                        Ensuring compliance with health, safety and all
                                        other regulations
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </li>
                <div v-for="employment in employments" v-bind:key="employment.id">
                    <li class="main-items">
                        <span class="text-icon-2">
                            <img src="/img/icons/expand.png"
                                srcset="/img/icons/expand@2x.png 2x, /img/icons/expand@3x.png 3x">
                        </span>
                        <div class="row mt-4">
                            <div class="col-md-2 col-sm-2">
                                <img class="profile-role-image" src="/img/logo/1.jpg">
                            </div>
                            <div class="col-md-10 col-sm-10">
                                <div class="profile-role-name">
                                    {{ employment.job_role }}
                                </div>
                                <span class="profile-label mt-0 pt-0">
                                    {{ employment.company_name }}
                                </span>
                                <span class="profile-text mb-0 pb-0">
                                    {{ employment.period }}
                                </span>
                            </div>
                        </div>
                    </li>
                </div>
                
                <!-- <li class="main-items">
                    <span class="text-icon-2">
                        <img src="/img/icons/expand.png"
                            srcset="/img/icons/expand@2x.png 2x, /img/icons/expand@3x.png 3x">
                    </span>
                    <div class="row mt-4">
                        <div class="col-md-2 col-sm-2">
                            <img class="profile-role-image" src="/img/logo/1.jpg">
                        </div>
                        <div class="col-md-10 col-sm-10">
                            <div class="profile-role-name">Construction</div>
                            <span class="profile-label mt-0 pt-0">Tools 'r' Us</span>
                            <span class="profile-text">2 years and 4 months</span>
                        </div>
                    </div>
                </li>
                <li class="main-items">
                    <span class="text-icon-2">
                        <img src="/img/icons/expand.png"
                            srcset="/img/icons/expand@2x.png 2x, /img/icons/expand@3x.png 3x">
                    </span>
                    <div class="row mt-4">
                        <div class="col-md-2 col-sm-2">
                            <img class="profile-role-image" src="/img/logo/1.jpg">
                        </div>
                        <div class="col-md-10 col-sm-10">
                            <span class="profile-role-name">Site Manager</span>
                            <span class="profile-label mt-0 pt-0">Richmond Surveying</span>
                            <span class="profile-text">2 years and 4 months</span>
                        </div>
                    </div>  
                </li> -->
            </ul>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                expanded: true,
                employments: []
            }
        },

        created() {
            let component = this;

            Bus.$on('employmentDetails', function(detailsArray) {
                component.employments = detailsArray;
            });
        },

        methods: {
            collapse() {
                this.expanded = false;
            },
            expand() {
                this.expanded = true;
            }
        }
    }
</script>