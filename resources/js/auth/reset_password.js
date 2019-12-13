import Vue from 'vue';

import Alert from '../components/common/Alert';
import ResetPassword from '../components/auth/passwords/ResetPassword';

Vue.config.productionTip = false;
Vue.config.devtools = false;

new Vue({
    el: "#app",
    components: {
        Alert,
        ResetPassword,
    },
});