import Vue from 'vue'
import axios from 'axios'
import VueAxios from 'vue-axios'

Vue.use(VueAxios, axios)

export const bus = new Vue()

// GLOBAL STATIC VARIABLES
// api static variable
Vue.prototype.$hostname = 'http://localhost/MY_WEB_WORKS/backslash/api/'
// Vue.prototype.$hostname = 'https://backslash/api/'

// public image static variable
Vue.prototype.$imageFolder = 'http://localhost/MY_WEB_WORKS/backslash/public/image/'
