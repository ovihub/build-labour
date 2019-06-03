<template>
    <div class="profile-item-3">
        <div class="profile-content">
            <span class="bl-label-16">Jobs you may be interested in</span>
            <span class="bl-label-14">Based off on your profile</span>
            <ul class="list-items">
                <li>
                    <div class="jobads-row">
                        <div class="bl-col-1">
                            <img src="/img/logo/1.jpg">
                            <!-- <avatar cls="" size="32" border="0" border-radius="8px"
                                :initials="getInitials(company_name)">
                            </avatar> -->
                        </div>
                        <div class="bl-col-2" style="margin-top:-2px">
                            <div class="bl-display">
                                <span class="bl-label-15 mt-0 pt-0">Contracts Administrator (Commercial)</span>
                                <span class="job-text">
                                    ABC Constructions Group • Cremorne VIC
                                </span>
                            </div>
                            <div class="bl-box-3"></div>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="jobads-row">
                        <div class="bl-col-1">
                            <img src="/img/logo/1.jpg">
                            <!-- <avatar cls="" size="32" border="0" border-radius="8px"
                                :initials="getInitials(company_name)">
                            </avatar> -->
                        </div>
                        <div class="bl-col-2" style="margin-top:-2px">
                            <div class="bl-display">
                                <span class="bl-label-15 mt-0 pt-0">Contracts Manager (Commercial)</span>
                                <span class="job-text">XYZ Constructions • South Yarra VIC</span>
                            </div>
                            <div class="bl-box-3"></div>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="jobads-row">
                        <div class="bl-col-1">
                            <img src="/img/logo/1.jpg">
                            <!-- <avatar cls="" size="32" border="0" border-radius="8px"
                                :initials="getInitials(company_name)">
                            </avatar> -->
                        </div>
                        <div class="bl-col-2" style="margin-top:-2px">
                            <div class="bl-display">
                                <span class="bl-label-15 mt-0 pt-0">Junior Project Manager (Commercial)</span>
                                <span class="job-text">ABC Constructions Group • Cremorne VIC</span>
                            </div>
                            <div class="bl-box-3"></div>
                        </div>
                    </div>
                </li>
            </ul>
            <div class="profile-more">
                <a href="#">View More<i class="fa fa-angle-right ml-2"></i></a>
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

        methods: {

            getInitials(name) {
                return Utils.getInitials(name);
            },

        }
    }
</script>