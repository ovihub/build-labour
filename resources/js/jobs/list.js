import Vue from 'vue';

import CreateJob from '../components/job/CreateJob';
import JobSummary from '../components/job/JobSummary';
import Alert from '../components/common/Alert';
import Navigation from '../components/common/Navigation';

Vue.config.productionTip = false;
Vue.config.devtools = false;

new Vue({
    el: "#app",
    components: {
        CreateJob,
        JobSummary,
        Alert,
        Navigation,
    },
});