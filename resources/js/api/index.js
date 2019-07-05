import Axios from 'axios'
import VueCookie from 'vue-cookie'

class BuildLabourApi {

    constructor () {

        const prod = '';
        const local = '';

        this.tokenName = 'bl_token';
        this.initials = 'bl_initials';
        this.profile_photo_url = 'bl_profile_photo_url';

        this.options = {
            Api: {
                Domain: local,
                Version: 'v1'
            }
        };

        this.time_out = false;
        this.searchResults = [];
        this.locations = [];
        this.companies = [];
        this.getResults = [];
        this.returnValue = [];

        this.endpoints = {
            job_roles: '/api/v1/roles/job/search',
            jobs: '/api/v1/job/search/filter',
            bookmarks: '/api/v1/bookmarks/posts/jobs',
            tickets: '/api/v1/tickets/search',
            locations: '/api/v1/locations',
            companies: '/api/v1/company/search',
            employees: '/api/v1/company/',
            company_options: '/api/v1/company/options',
            responsibilities: '/api/v1/job/',
            savedJobPosts: '/api/v1/bookmarks/posts/jobs/ids',
            countries: '/api/v1/countries',
            courses: '/api/v1/courses',
            worker_tickets: '/api/v1/worker/tickets',
            schools: '/api/v1/schools'
        };
        
        //  this._headers()
    }

    _headers () {
        Axios.defaults.headers.put['Content-Type'] = 'application/json';
        Axios.defaults.headers.post['Content-Type'] = 'application/json';
        Axios.defaults.baseURL = this._apiURL();

        if(this.isAuthenticated())
            this._invalidateToken();
    }

    _apiURL () {
        return [ this.options.Api.Domain, this.options.Api.Version ].join('/')
    }

    _getBearerToken() {
        let token = JSON.parse(VueCookie.get(this.tokenName));
        return token
    }

    _invalidateToken() {
        Axios.defaults.headers.authorization = "Bearer " + this._getBearerToken()
    }

    isAuthenticated() {
        const authed = JSON.parse(VueCookie.get(this.tokenName));
        return authed != null;
    }

    setNavAvatar(initials, profile_photo_url) {
        VueCookie.set(this.initials, initials);
        VueCookie.set(this.profile_photo_url, profile_photo_url);
    }

    getNavAvatar() {
        return { initials: VueCookie.get(this.initials),
                 profile_photo_url: VueCookie.get(this.profile_photo_url) };
    }

    setToken(token) {
        VueCookie.set(this.tokenName, JSON.stringify(token));
        this._invalidateToken()
    }

    deleteToken() {
        VueCookie.delete(this.tokenName);
        VueCookie.delete(this.initials);
        VueCookie.delete(this.profile_photo_url);
        window.location.href = '/login';
    }

    checkAuthUser() {
        if (! parseInt(window.location.pathname.split('/').pop(), 10)) {
            return true;
        }
        
        return false;
    }

    redirectToProfile() {
        if (window.location.pathname == '/user/profile') {
            window.location.reload();
        
        } else {
            window.location = '/user/profile';
        }
    }

    redirectToUserProfile(user_id) {
        window.location = '/user/profile/' + user_id;
    }

    redirectToCompanyProfile(company_id) {
        window.location = '/company/profile/' + company_id;
    }

    redirectToJobPost(company_id, job_id) {
        window.location = '/job/view/?cid=' + company_id + '&jid=' + job_id;
    }

    async _get(endpoint) {
        let component = this;

        // if (component.time_out) {
        //     clearTimeout(component.time_out);
        // }

        // component.time_out = await setTimeout(async function() {
            
            await Axios.get(endpoint, Utils.getBearerAuth())

                .then(function(response) {
                    
                    component.getResults = response.data;
                })
                .catch(function(error) {

                    Utils.handleError(error);
                });

        // }.bind(this), 100);
                
        return this.getResults;
    }

    async _post(endpoint, input) {
        
        let component = this;

        await Axios.post(endpoint, input, Utils.getBearerAuth())

            .then(function(response) {
                
                component.getResults = response.data;
            })
            .catch(function(error) {

                Utils.handleError(error);
            });
                
        return this.getResults;
    }

    async _search(endpoint) {
        let component = this;

        // if (component.time_out) {
        //     clearTimeout(component.time_out);
        // }

        // component.time_out = await setTimeout(async function() {
            
            await Axios.get(endpoint, Utils.getBearerAuth())

                .then(function(response) {
                    
                    component.getResults = response.data;
                })
                .catch(function(error) {

                    Utils.handleError(error);
                });

        // }.bind(this), 100);
                
        return this.getResults;
    }

    async submit(endpoint, input) {
        
        await Axios.post(endpoint, input, Utils.getBearerAuth())

            .then(function(response) {
                console.log(response.data.message);
                // Bus.$emit('alertSuccess', response.data.message);
            })
            .catch(function(error) {
                console.log(error.response.data.message);
                // Bus.$emit('alertError', error.response.data.message);

                Utils.handleError(error);
            });
    }

    getTickets(keyword) {
        return this._search(this.endpoints.tickets + '?keyword=' + keyword);
    }

    getWorkerTickets() {
        return this._get(this.endpoints.worker_tickets);
    }

    getLocations(keyword) {
        return this._search(this.endpoints.locations + '?keyword=' + keyword);
    }

    getCompanies(keyword) {
        return this._search(this.endpoints.companies + '?keyword=' + keyword);
    }

    getCompanyOptions() {
        return this._get(this.endpoints.company_options);
    }

    getJobResponsibilities(id) {
        return this._get(this.endpoints.responsibilities + id + '/responsibilities');
    }

    getBookmarks() {
        return this._get(this.endpoints.bookmarks);
    }

    getSavedJobPosts() {
        return this._get(this.endpoints.savedJobPosts);
    }

    getJobPosts(endpoint) {
        return this._get(endpoint);
    }

    getJobs(role = '', tiers = [], sectors = [], locations = []) {

        let input = { role: role, tiers: tiers, sectors: sectors, locations: locations };

        return this._post(this.endpoints.jobs, input);
    }

    getJobRoles(keyword) {
        let self = this;

        Promise.resolve(self._search(this.endpoints.job_roles + '?keyword=' + keyword)).then(function(data) {
            self.returnValue = data.data ? data.data.job_roles : [];
        });

        return self.returnValue;
    }

    getCountries() {
        return this._get(this.endpoints.countries);
    }

    getCourses(keyword) {
        return this._search(this.endpoints.courses + '?keyword=' + keyword);
    }
    
    getEmployees(id) {
        return this._get(this.endpoints.employees + id + '/people');
    }

    getSchools(keyword) {
        return this._search(this.endpoints.schools + '?keyword=' + keyword);
    }
}

export default new BuildLabourApi()