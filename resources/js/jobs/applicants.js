import Vue from 'vue';

import JobApplicants from '../components/job/JobApplicants';
import JobApplicantsCompare from '../components/job/JobApplicantsCompare';
import CreateJob from '../components/job/CreateJob';
import JobSummary from '../components/job/JobSummary';
import Alert from '../components/common/Alert';
import Navigation from '../components/common/Navigation';

new Vue({
    el: "#app",
    components: {
        JobApplicants,
        JobApplicantsCompare,
        CreateJob,
        JobSummary,
        Alert,
        Navigation,
    },
});