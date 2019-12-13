import Vue from 'vue';

import RegisterCompany from '../components/auth/RegisterCompany';
import Alert from '../components/common/Alert';

Vue.config.productionTip = false;
Vue.config.devtools = false;

new Vue({
    el: "#app",
    components: {
        RegisterCompany,
        Alert,
    },
});