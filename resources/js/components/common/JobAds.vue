<template>
    <div class="profile-item-3">
        <div class="profile-content">
            <span class="bl-label-16">Jobs you may be interested in</span>
            <span class="bl-label-14">Based off on your profile</span>
            <ul class="list-items">
                <li v-for="(post, index) in jobPosts" :key="index+0">
                    <div class="jobads-row">
                        <div class="bl-col-1">
                            <!-- <img class="bl-image-32" src="/img/logo/1.jpg"> -->
                            <img v-if="post.company.photo_url" class="bl-image-32" :src="post.company.photo_url"
                                 @click="onClickCompanyPhoto(post.company_id)">

                            <avatar v-if="!post.company.photo_url" cls="bl-image-32" size="32" border="0" border-radius="8px"
                                    :initials="getInitials(post.company.name)"
                                    :company-id="(post.company_id) ? post.company_id + '' : ''">
                            </avatar>
                        </div>
                        <div class="bl-col-2" style="margin-top:-2px">
                            <div class="bl-display">
                                <span class="bl-label-15 mt-0 pt-0">{{ post.title ? post.title : post.job_role_name }}</span>
                                <span class="job-text">
                                    {{ post.company.name }} • {{ post.location }}
                                </span>
                            </div>
                            <div class="bl-box-3"></div>
                        </div>
                    </div>
                </li>
                <!--<li>-->
                    <!--<div class="jobads-row">-->
                        <!--<div class="bl-col-1">-->
                            <!--&lt;!&ndash; <img class="bl-image-32" src="/img/logo/1.jpg"> &ndash;&gt;-->
                            <!--<avatar cls="bl-image-32" size="32" border="0" border-radius="8px"-->
                                <!--:initials="getInitials('XYZ Constructions')">-->
                            <!--</avatar>-->
                        <!--</div>-->
                        <!--<div class="bl-col-2" style="margin-top:-2px">-->
                            <!--<div class="bl-display">-->
                                <!--<span class="bl-label-15 mt-0 pt-0">Contracts Manager (Commercial)</span>-->
                                <!--<span class="job-text">XYZ Constructions • South Yarra VIC</span>-->
                            <!--</div>-->
                            <!--<div class="bl-box-3"></div>-->
                        <!--</div>-->
                    <!--</div>-->
                <!--</li>-->
                <!--<li>-->
                    <!--<div class="jobads-row">-->
                        <!--<div class="bl-col-1">-->
                            <!--&lt;!&ndash; <img class="bl-image-32" src="/img/logo/1.jpg"> &ndash;&gt;-->
                            <!--<avatar cls="bl-image-32" size="32" border="0" border-radius="8px"-->
                                <!--:initials="getInitials('ABC Constructions Group')">-->
                            <!--</avatar>-->
                        <!--</div>-->
                        <!--<div class="bl-col-2" style="margin-top:-2px">-->
                            <!--<div class="bl-display">-->
                                <!--<span class="bl-label-15 mt-0 pt-0">Junior Project Manager (Commercial)</span>-->
                                <!--<span class="job-text">ABC Constructions Group • Cremorne VIC</span>-->
                            <!--</div>-->
                            <!--<div class="bl-box-3"></div>-->
                        <!--</div>-->
                    <!--</div>-->
                <!--</li>-->
            </ul>
            <div class="profile-more">
                <a href="/job/search">View More<i class="fa fa-angle-right ml-2"></i></a>
            </div>
        </div>
    </div>
</template>

<script>
    import Avatar from '../common/Avatar';
    import Api from '@/api';

    export default {
        name: "job-ads",

        data() {
            return {
                jobPosts: [],
                endpoints: {
                    search: '/api/v1/job/search?keyword='
                },
            }
        },
        methods: {
            getInitials(name) {
                return Utils.getInitials(name);
            },
            getJobPosts(endpoint) {
                let vm = this;

                Promise.resolve(Api.getJobPosts(endpoint)).then(function(data) {
                    vm.jobPosts = data.data.jobs;
                });
            },
        },
        created() {

            this.getJobPosts(this.endpoints.search + '&status=' + status);
        },
        components: {
            Avatar,
        },
    }
</script>