export default {

    data() {
        return {
            message: '',
            alert: 'hidden',
            icon: '',
        }
    },

    mounted() {
        var app = this;

        Bus.$on('alertSuccess', function (message) {
            app.message = message;
            app.alert = 'alert-main alert-success alert-dismissible';
            app.icon = '/img/icons/alert-success.png';
        });

        Bus.$on('alertError', function (message) {
            app.message = message;
            app.alert = 'alert-main alert-error alert-dismissible';
            app.icon = '/img/icons/alert-error.png';
        });

        Bus.$on('alertHide', function () {
            app.hide();
        });
    },

    methods: {

        hide() {
            this.message = ''
            this.alert = 'hidden';
            this.icon = '';
        }
    }

}
