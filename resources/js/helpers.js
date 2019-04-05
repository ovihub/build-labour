import Api from '@/api';

window.Helper = {
    data: {

    },
    
    methods: {

        getUrlParams() {
            let regex = /[?&]([^=#]+)=([^&#]*)/g,
                url = window.location.href,
                params = {},
                match;
            
            while(match = regex.exec(url)) {
                params[match[1]] = match[2];
            }

            return params;
        },

        setObjectValues(obj, val) {
            for (let key in obj) {
                obj[key] = val;
            }
        },

        handleError(error) {
            if (error.response) {
                let data = error.response.data;
                
                if (data.http_status == 422) {
                    Bus.$emit('alertError', 'Invalid input! Please see errors below.');
                
                } else {
                    Bus.$emit('alertError', data.message);
                }
            } else {
                console.log(error);
            }
        },

        getBearerAuth() {
            return {
                headers: {
                    "Authorization" : "Bearer " + Api._getBearerToken()
                }
            }
        }
    }
}