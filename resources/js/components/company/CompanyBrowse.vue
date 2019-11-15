<template>
    <div class="profile-item-2 ta-center">
        <div class="profile-content">
            <div :class="postsCls" @click="show('Posts')" v-show="false">
                Posts
            </div>
            <div :class="peopleCls" @click="show('People')">
                Candidates
            </div>
            <div :class="jobsCls" @click="show('Jobs')">
                My Jobs
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
        mounted() {
            this.show('People');
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

<style>
    @media (max-width: 380px) {
        .company-header {
            margin-right: 2%;
            margin-left: 2%;
        }
    }
    @media (max-width: 340px) {
        .company-header {
            margin-right: 0;
            margin-left: 0;
        }
    }
</style>