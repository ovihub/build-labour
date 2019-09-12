<template>
    <div>
        <div class="loading" style="position: unset; text-align: center;">
            <pulse-loader :loading="loading" color="#00aeef" size="10px"></pulse-loader>
        </div>
        <transition name="slide-fade">
        <div class="profile-item-2" v-if="show">
            <div class="row">
                <div class="col-md-4" v-for="(employee, index) in employees" :key="index">
                    <div class="profile-content ta-center mb-3">
                        <img class="bl-image-80" :src="employee.profile_photo_url"
                            v-if="employee.profile_photo_url"
                            @click="onClickProfilePhoto(employee.id)">

                        <avatar cls="bl-image-80" size="80" border="0" border-radius="100%"
                            :initials="getInitials(employee.full_name)" v-else>
                        </avatar>

                        <div class="bl-label-16 bl-ellipsis">
                            {{ employee.full_name }}
                        </div>
                        <div class="bl-label-14 bl-ellipsis">
                            {{ employee.job_role }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </transition>
    </div>
</template>

<script>
    import Api from '@/api';
    import Avatar from '../common/Avatar';
    import PulseLoader from 'vue-spinner/src/PulseLoader.vue';

    export default {
        name: "company-people",
        data() {
            return {
                show: false,
                loading: false,
                employees: [],
                endpoints: {
                    get: '/api/v1/company/',
                },
            }
        },
        props: {
            companyId: {
                type: String,
                required: false
            },
            postType: {
                type: String,
                default: ''
            },
        },
        computed: {
            endpointGet() {
                return this.endpoints.get + this.companyId + '/posts/people';
            }
        },
        created() {
            let vm = this;

            if (this.postType == 'open_search') {
                Bus.$on('openSearchIndividuals', function(results) {
                    vm.show = true;
                    vm.employees = [];
                    vm.loading = true;

                    setTimeout(function() {
                        vm.employees = results;
                        vm.loading = false;
                    }, 1000);
                });

            } else {
                Bus.$on('showCompanyPeople', function(flag) {
                    vm.show = flag;
                    vm.getEmployees();
                    
                    Bus.$emit('hideCompanyJobs');
                    Bus.$emit('hideCompanyPosts');
                });

                Bus.$on('hideCompanyPeople', function() {
                    vm.show = false;
                });
            }
        },
        methods: {
            getInitials(name) {
                return Utils.getInitials(name);
            },
            getEmployees(endpoint) {
                let vm = this;

                Promise.resolve(Api.getEmployees(vm.companyId)).then(function(data) {
                    vm.employees = data.data.people;
                });
            },
            onClickProfilePhoto(id) {
                Api.redirectToUserProfile(id);
            },
        },
        components: {
            Avatar,
            PulseLoader,
        },
    }
</script>