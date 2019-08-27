import Vue from 'vue';

import Onboarding from '../components/onboarding/Onboarding';
import JobAds from '../components/common/JobAds';
import Ads from '../components/common/Ads';
import Alert from '../components/common/Alert';
import Navigation from '../components/common/Navigation';

new Vue({
    el: "#app",
    components: {
        Onboarding,
        JobAds,
        Ads,
        Alert,
        Navigation,
    },
});