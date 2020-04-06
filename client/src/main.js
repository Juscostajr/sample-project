import Vue from 'vue';
import ElementUI from 'element-ui';
import 'element-ui/lib/theme-chalk/index.css';
import App from './App.vue';
import router from '@/router'
import store from '@/store'
import Axios from "axios";
Vue.use(ElementUI);

Vue.prototype.$request = Axios.create({
  baseURL: "http://192.168.99.100:8080/",
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
