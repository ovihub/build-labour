import Vue from 'vue';

import Register from '../components/auth/Register';
import Alert from '../components/common/Alert';

Vue.config.productionTip = false;
Vue.config.devtools = false;

new Vue({
    el: "#app",
    components: {
        Register,
        Alert,
    },
});