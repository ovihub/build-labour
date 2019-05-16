<template>
    <div class="profile-item-2" v-if="show">
        <ul class="list-job-items" v-for="(post, index) in posts" :key="index">
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
                                    <!-- 3hrs ago -->
                                    {{ getTimeDiffNow(post.created_at) }}
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="bl-label-15 bl-mt16 bl-mb16">
                        <!-- Lorem ipsum dolor sit amet, consec tetur adipiscing elit. Donec rutrum con vallis sem at mattis. -->
                        {{ post.content }}
                    </div>
                    <div class="post-action">
                        <img class="mr-1" src="/img/icons/share.png"
                            srcset="/img/icons/share@2x.png 2x, /img/icons/share@3x.png 3x">

                        Share
                    </div>
                    <div class="post-action">
                        <img class="mr-1" src="/img/icons/comments.png"
                            srcset="/img/icons/comments@2x.png 2x, /img/icons/comments@3x.png 3x">

                        Comments
                    </div>
                    <div class="post-action">
                        <img class="mr-1" src="/img/icons/like.png"
                            srcset="/img/icons/like@2x.png 2x, /img/icons/like@3x.png 3x">

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
                show: true,
                posts: [],
                endpoints: {
                    get_posts: '/api/v1/company/1/posts',
                },
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

            this.getPosts();
        },

        methods: {

            getPosts() {
                let component = this;

                axios.get(component.endpoints.get_posts, Utils.getBearerAuth())
                    
                    .then(function(response) {
                        
                        component.posts = response.data.data.posts;
                    })
                    .catch(function(error) {

                        Utils.handleError(error);
                    });
            },

            getTimeDiffNow(created_at) {
                return Utils.formatTimeDiffNow(created_at);
            }
        }
    }
</script>