import Vue from 'vue';
import ElementUI from 'element-ui';
import 'element-ui/lib/theme-chalk/index.css';
import App from './App.vue';
import router from '@/router'
import store from '@/store'
import Axios from "axios";
import Configuration from '@/config'
Vue.use(ElementUI);


const backendHost = Configuration.value('backendHost')

Vue.prototype.$request = Axios.create({
  baseURL: backendHost,
  timeout: 20000,
  headers: {
    "Content-Type": "application/json"
  }
});

new Vue({
  el: '#app',
  render: h => h(App),
  router,
  store
});
