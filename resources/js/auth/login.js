import Vue from 'vue';

import Login from '../components/auth/Login';
import Alert from '../components/common/Alert';

Vue.config.productionTip = false;
Vue.config.devtools = false;

new Vue({
    el: "#app",
    components: {
        Login,
        Alert,
    }
});

