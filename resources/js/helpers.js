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

var months = [];
            
months.push({ id: 1, name: 'January' });
months.push({ id: 2, name: 'February' });
months.push({ id: 3, name: 'March' });
months.push({ id: 4, name: 'April' });
months.push({ id: 5, name: 'May' });
months.push({ id: 6, name: 'June' });
months.push({ id: 7, name: 'July' });
months.push({ id: 8, name: 'August' });
months.push({ id: 9, name: 'September' });
months.push({ id: 10, name: 'October' });
months.push({ id: 11, name: 'November' });
months.push({ id: 12, name: 'December' });

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

        setObjectWithSameKeys(obj, o) {
            for (let key in obj) {
                obj[key] = o[key];
            }
        },

        setObjectValues(obj, val) {
            for (let key in obj) {
                obj[key] = val;
            }
        },

        isNullOrEmpty(value) {
            return (value === false || value === null || value === undefined || value === '' || value.length === 0);
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

        formatPeriod(start, end) {
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
        
        getDaysInMonth(month, year) {
           return new Date(year, month, 0).getDate();
        },

        getMonth(index) {
            return month[index];
        },
        
        getMonths() {
            return months;
        },

        getYears() {
            let startYear = new Date().getFullYear(), years = [], endYear = 1980;

            while ( startYear >= endYear ) {
                years.push(startYear--);
            }

            return years;
        }
    }
}