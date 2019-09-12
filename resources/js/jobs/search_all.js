import Vue from 'vue';

import SearchResults from '../components/common/SearchResults';
import JobSearchFilters from '../components/job/JobSearchFilters';
import JobAds from '../components/common/JobAds';
import Ads from '../components/common/Ads';
import Alert from '../components/common/Alert';
import Navigation from '../components/common/Navigation';

new Vue({
    el: "#app",
    components: {
        SearchResults,
        JobSearchFilters,
        JobAds,
        Ads,
        Alert,
        Navigation,
    },
});