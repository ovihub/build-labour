import Api from '@/api';

var month = new Array();

month[0] = "January";
month[1] = "February";
month[2] = "March";
month[3] = "April";
month[4] = "May";
month[5] = "June";
month[6] = "July";
month[7] = "August";
month[8] = "September";
month[9] = "October";
month[10] = "November";
month[11] = "December";

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
            window.scrollTo(0, 0);

            if (error.response) {
                let data = error.response.data;
                
                if (data.http_status == 422) {
                    Bus.$emit('alertError', 'Invalid input! Please see errors below.');
                
                } else {
                    Bus.$emit('alertError', data.message);
                }
            } else {
                console.log(error);
                Bus.$emit('alertError', error);
            }
        },

        getBearerAuth() {
            return {
                headers: {
                    "Authorization" : "Bearer " + Api._getBearerToken()
                }
            }
        },

        getMonth(index) {
            return month[index];
        }
    }
}