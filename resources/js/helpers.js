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
            if (error.response) {
                let data = error.response.data;
                
                if (data.http_status == 422) {
                    // Bus.$emit('alertError', 'Invalid input! Please see errors below.');
                
                } else {
                    window.scrollTo(0, 0);
                    Bus.$emit('alertError', data.message);
                }
            } else {
                window.scrollTo(0, 0);
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
        },

        getPeriod(start, end) {
            let diff = (end === null) ? new Date() - new Date(start) : new Date(end) - new Date(start),
                offset = new Date().getTimezoneOffset()/60,
                hours = Math.abs(diff / 36e5) + offset,
                years, months, days, period = '';
            
            hours = Math.floor(hours);
            days = Math.floor(hours/24);

            if (days > 29) {
                months = Math.floor(days/30);

                if (months > 11) {
                    years = Math.floor(months/12);
                    period = (years == 1) ? '1 year' : years + ' years';

                    months = months - (years * 12);
                    period += (months == 1) ? ' and 1 month' : '';
                    period += (months != 1 && months > 0) ? ' and ' + months + ' months' : '';
                
                } else {
                    period += (months == 1) ? '1 month' : months + ' months';
                }

            } else {
                period = '1 month';
            }

            return period;
        },
    }
}