import Vue from 'vue';

import CreateJob from '../components/job/CreateJob';
import NewJobDetails from '../components/job/NewJobDetails';
import NewJobRequirements from '../components/job/NewJobRequirements';
import NewJobResponsibilities from '../components/job/NewJobResponsibilities';
import Alert from '../components/common/Alert';
import Navigation from '../components/common/Navigation';

new Vue({
    el: "#app",
    components: {
        CreateJob,
        NewJobDetails,
        NewJobRequirements,
        NewJobResponsibilities,
        Alert,
        Navigation,
    },
});