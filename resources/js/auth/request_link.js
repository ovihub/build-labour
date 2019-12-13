import Vue from 'vue';

import Alert from '../components/common/Alert';
import RequestLink from '../components/auth/passwords/RequestLink';

Vue.config.productionTip = false;
Vue.config.devtools = false;

new Vue({
    el: "#app",
    components: {
        Alert,
        RequestLink,
    },
});