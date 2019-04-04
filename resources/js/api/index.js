import Axios from 'axios'
import VueCookie from 'vue-cookie'

class BuildLabourApi {
    constructor () {
        const prod = ''
        const local = ''

        this.options = {
            Api: {
                Domain: local,
                Version: 'v1'
            }
        }
      //  this._headers()
    }

    _headers () {
        Axios.defaults.headers.put['Content-Type'] = 'application/json'
        Axios.defaults.headers.post['Content-Type'] = 'application/json'
        Axios.defaults.baseURL = this._apiURL()

        if(this.isAuthenticated())
            this._invalidateToken();
    }

    _apiURL () {
        return [ this.options.Api.Domain, this.options.Api.Version ].join('/')
    }

    _getBearerToken() {
        let token = JSON.parse(VueCookie.get("bl_token"))
        return token
    }

    _invalidateToken() {
        Axios.defaults.headers.authorization = "Bearer " + this._getBearerToken()
    }

    isAuthenticated() {
        const authed = JSON.parse(VueCookie.get("bl_token"))
        return authed != null;
    }

    setToken(token) {

        console.log('xxxxxxxxx');
        console.log(token);
        VueCookie.set("bl_token", JSON.stringify(token))
        this._invalidateToken()
    }

}

export default new BuildLabourApi()