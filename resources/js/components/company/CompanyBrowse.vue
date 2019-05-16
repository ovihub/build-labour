<template>
    <div class="profile-item-2 ta-center">
        <div class="profile-content">
            <div :class="postsCls" @click="show('Posts')">
                Posts
            </div>
            <div :class="peopleCls" @click="show('People')">
                People
            </div>
            <div :class="jobsCls" @click="show('Jobs')">
                Jobs
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                postsCls: 'company-header header-active',
                peopleCls: 'company-header',
                jobsCls: 'company-header'
            }
        },

        methods: {

            show(type) {
                Bus.$emit('showCompany' + type, true);

                if (type == 'Posts') {
                    this.postsCls = 'company-header header-active';
                    this.peopleCls = 'company-header header-inactive';
                    this.jobsCls = 'company-header header-inactive';

                } else if (type == 'People') {
                    this.peopleCls = 'company-header header-active';
                    this.postsCls = 'company-header header-inactive';
                    this.jobsCls = 'company-header header-inactive';

                } else if (type == 'Jobs') {
                    this.jobsCls = 'company-header header-active';
                    this.postsCls = 'company-header header-inactive';
                    this.peopleCls = 'company-header header-inactive';
                }
            },

        }
    }
</script>