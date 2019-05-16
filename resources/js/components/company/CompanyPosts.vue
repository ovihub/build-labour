<template>
    <div class="profile-item-2" v-if="show">
        <ul class="list-job-items" v-for="n in 5" :key="n">
            <li class="job-items">
                <div class="profile-content">
                    <div class="jobads-row">
                        <div class="bl-col-1">
                            <img class="bl-image-40" src="/img/logo/1.jpg">
                        </div>
                        <div class="bl-col-2">
                            <div class="bl-display">
                                <span class="bl-label-19 bl-ml14">
                                    Richmond Surveying
                                </span>

                                <span class="bl-label-14 bl-ml14" style="margin-top:-5px">
                                    3hrs ago
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="bl-label-15 bl-mt16 bl-mb16">
                        Lorem ipsum dolor sit amet, consec tetur adipiscing elit. Donec rutrum con vallis sem at mattis.
                    </div>
                    <div class="post-action">
                        Share
                    </div>
                    <div class="post-action">
                        Comments
                    </div>
                    <div class="post-action">
                        Like
                    </div>
                </div>
            </li>
        </ul>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                show: false,
            }
        },

        created() {
            let component = this;

            Bus.$on('showCompanyPosts', function(flag) {
                component.show = flag;
                
                Bus.$emit('hideCompanyPeople');
                Bus.$emit('hideCompanyJobs');
            });

            Bus.$on('hideCompanyPosts', function() {
                component.show = false;
            });
        },

        methods: {

        }
    }
</script>