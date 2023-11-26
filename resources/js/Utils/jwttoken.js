class JwtToken {

    constructor() {
        this.token = window.localStorage.getItem('token')
    }


    setToken(token) {
        this.token = token
        window.localStorage.setItem('token', this.token)
    }


    getToken() {
        return this.token
    }

}


export default new JwtToken()
