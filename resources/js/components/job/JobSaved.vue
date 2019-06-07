<template>
    <div class="profile-item-3">
        <div class="profile-content">
            <span class="bl-label-16">Saved</span>
            <ul class="list-items" v-if="bookmarks.length > 0">
                <li v-for="(bookmark, index) in bookmarks" :key="index">
                    <div class="jobads-row">
                        <div class="bl-col-1">
                            <img :src="bookmark.company_photo">
                            <avatar cls="" size="32" border="0" border-radius="8px"
                                :initials="getInitials(bookmark.company_name)">
                            </avatar>
                        </div>
                        <div class="bl-col-2" style="margin-top:-2px">
                            <div class="bl-display">
                                <span class="bl-label-15 mt-0 pt-0">bookmark.job_role</span>
                                <span class="job-text">
                                    {{ bookmark.company_name }} • {{ bookmark.location }}
                                </span>
                            </div>
                            <div class="bl-box-3"></div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</template>

<script>

    import Api from '@/api';

    export default {
        data() {
            return {
                bookmarks: [],
            }
        },

        created() {
            let component = this;

            Bus.$on('saveJobPost', function(post) {
                component.bookmarks.push(post);
            });

            this.getBookmarks();
        },

        methods: {

            getInitials(name) {
                return Utils.getInitials(name);
            },

            getBookmarks() {
                this.bookmarks = Api.getBookmarks();
            },

        }
    }
</script>