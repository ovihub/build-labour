<template>
    <div>
        <div class="loading" style="position: unset; text-align: center;">
            <pulse-loader :loading="loading" color="#00aeef" size="10px"></pulse-loader>
        </div>
        <transition name="slide-fade">
        <div class="profile-item-2">
            <div class="row">
                <div class="col-md-4" v-for="(company, index) in companies" :key="index">
                    <div class="profile-content ta-center mb-3">
                        <img class="bl-image-80" :src="company.photo_url"
                            v-if="company.photo_url"
                            @click="onClickProfilePhoto(company.id)">

                        <avatar cls="bl-image-80" size="80" border="0" border-radius="100%"
                            :initials="getInitials(company.name)" v-else>
                        </avatar>

                        <div class="bl-label-16 bl-ellipsis">
                            {{ company.name }}
                        </div>
                        <div class="bl-label-14 bl-ellipsis">
                            {{ company.main_function.main_name }}
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
        name: "company-preview",
        data() {
            return {
                loading: false,
                companies: [],
            }
        },
        props: {
            postType: {
                type: String,
                default: ''
            },
        },
        created() {
            let vm = this;

            if (this.postType == 'open_search') {
                Bus.$on('openSearchCompanies', function(results) {
                    vm.show = true;
                    vm.companies = [];
                    vm.loading = true;

                    setTimeout(function() {
                        vm.companies = results;
                        vm.loading = false;
                    }, 1000);
                });
            }
        },
        methods: {
            getInitials(name) {
                return Utils.getInitials(name);
            },
            onClickProfilePhoto(id) {
                Api.redirectToCompanyProfile(id);
            },
        },
        components: {
            Avatar,
            PulseLoader,
        },
    }
</script>