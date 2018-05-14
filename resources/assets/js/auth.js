class Auth {
  constructor() {
    this.token = window.localStorage.getItem('token');
    this.user = window.localStorage.getItem('user');
  }
  login (token, user) {        
    window.localStorage.setItem('token', token);
    window.localStorage.setItem('user', JSON.stringify(user));
    this.token = token;
    this.user = user;
    this.BearerAuth();

    Event.$emit('userLoggedIn');
  }
  logout() {
    window.localStorage.removeItem('token');
    window.localStorage.removeItem('user');
    this.token = null
    this.user = null
    Event.$emit('userLoggedOut');
  }
  BearerAuth() {
    axios.defaults.headers.common['Authorization'] = 'Bearer ' + this.token
  }
  check () {
    return !! this.token;
  }
}

export default new Auth();