import Vue from 'vue';

import JobPosts from '../components/job/JobPosts';
import JobSaved from '../components/job/JobSaved';
import JobSearch from '../components/job/JobSearch';
import Alert from '../components/common/Alert';
import Navigation from '../components/common/Navigation';

new Vue({
    el: "#app",
    components: {
        JobPosts,
        JobSaved,
        JobSearch,
        Alert,
        Navigation,
    },
});