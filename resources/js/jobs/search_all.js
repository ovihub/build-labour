import Vue from 'vue';

import JobSearchFilters from '../components/job/JobSearchFilters';
import JobPosts from '../components/job/JobPosts';
import CompanyPeople from '../components/company/CompanyPeople';
import JobAds from '../components/common/JobAds';
import Ads from '../components/common/Ads';
import Alert from '../components/common/Alert';
import Navigation from '../components/common/Navigation';

new Vue({
    el: "#app",
    components: {
        JobSearchFilters,
        JobPosts,
        CompanyPeople,
        JobAds,
        Ads,
        Alert,
        Navigation,
    },
});