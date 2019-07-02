<template>
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
</template>

<script>
    import Api from '@/api';

    export default {
        data() {
            return {
                show: false,
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
        },

        computed: {
            endpointGet() {
                return this.endpoints.get + this.companyId + '/posts/people';
            }
        },

        created() {
            let component = this;

            Bus.$on('showCompanyPeople', function(flag) {
                component.show = flag;
                component.getEmployees();
                
                Bus.$emit('hideCompanyJobs');
                Bus.$emit('hideCompanyPosts');
            });

            Bus.$on('hideCompanyPeople', function() {
                component.show = false;
            });
        },

        methods: {

            getInitials(name) {
                return Utils.getInitials(name);
            },

            getEmployees(endpoint) {
                let component = this;

                Promise.resolve(Api.getEmployees(component.companyId)).then(function(data) {
                    component.employees = data.data.people;
                });
            },

            onClickProfilePhoto(id) {
                Api.redirectToUserProfile(id);
            },
        }
    }
</script>