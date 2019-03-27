export default {
    data() {
        return {
            url_params: Helper.methods.getUrlParams(),
            title: '',
            record: null,
            endpoints: {
                get: '/api/v1/auth/user'
            }
        }
    },
    
    created() {
        this.viewRecord();
    },
    
    methods: {
        
          viewRecord() {
            let app = this;

            axios.get(app.endpoints.get,
                        {
                            headers: {
                                "Authorization" : "Bearer " + this.url_params.token
                            }
                        })
                  .then(function(response) {
                            app.record = response.data.data.user;
                            
                            delete app.record.date_created_at;
                            delete app.record.date_updated_at;
                            delete app.record.date_email_verified_at;
                            delete app.record.deleted_at;
                          })
                  .catch(function(error) {
                            console.log('Error', error);
                          });
          }
     }
}