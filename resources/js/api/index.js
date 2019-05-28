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

        this.endpoints = {
            locations: '/api/v1/locations',
            companies: '/api/v1/company/search',
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

    _search(endpoint, keyword) {
        let component = this;

        if (this.time_out) {
            clearTimeout(this.time_out);
        }

        this.time_out = setTimeout(function() {

            Axios.get(endpoint + "?keyword=" + keyword, Utils.getBearerAuth())

                .then(function(response) {
                    let data = response.data;

                    component.searchResults = data;
                })
                .catch(function(error) {

                    Utils.handleError(error);
                });
        
        }.bind(this), 200);

        return this.searchResults;
    }

    getLocations(keyword) {

        let results = this._search(this.endpoints.locations, keyword);
        
        this.locations = (keyword != '' && (keyword && keyword.length > 0) && results.data && results.data.locations) ? results.data.locations.features : [];

        return this.locations;
    }

    getCompanies(keyword) {

        let results = this._search(this.endpoints.companies, keyword);

        this.companies = (keyword != '' && (keyword && keyword.length > 0) && results.data && results.data.companies) ? results.data.companies : [];
        
        return this.companies;
    }

}

export default new BuildLabourApi()