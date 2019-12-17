import Vue from 'vue';
import Export from '../components/admin/Export';

Vue.config.productionTip = false;
Vue.config.devtools = false;

new Vue({
    el: "#app",
    components: {
        Export
    },
});