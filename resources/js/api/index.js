import Axios from 'axios'
import VueCookie from 'vue-cookie'

class BuildLabourApi {

    constructor () {

        const prod = '';
        const local = '';

        this.tokenName = 'bl_token';

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

        this.endpoints = {
            jobs: '/api/v1/job/search/filter',
            bookmarks: '/api/v1/bookmarks/posts/jobs',
            locations: '/api/v1/locations',
            companies: '/api/v1/company/search',
            company_options: '/api/v1/company/options',
            responsibilities: '/api/v1/job/',
            savedJobPosts: '/api/v1/bookmarks/posts/ids',
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

    setToken(token) {
        VueCookie.set(this.tokenName, JSON.stringify(token));
        this._invalidateToken()
    }

    deleteToken() {
        VueCookie.delete(this.tokenName);
        window.location.href = '/login';
    }

    async _get(endpoint) {
        let component = this;

        await Axios.get(endpoint, Utils.getBearerAuth())

            .then(function(response) {
                
                component.getResults = response.data;
            })
            .catch(function(error) {

                Utils.handleError(error);
            });
                
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

    getLocations(keyword) {
        return this._get(this.endpoints.locations + '?keyword=' + keyword);
    }

    getCompanies(keyword) {
        return this._get(this.endpoints.companies + '?keyword=' + keyword);
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
}

export default new BuildLabourApi()