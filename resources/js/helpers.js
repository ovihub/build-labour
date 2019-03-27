window.Helper = {
    data() {
        return {

        }
    },
    
    created () {

    },
  
    mounted () {

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
        }
    }
}