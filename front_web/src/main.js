import Vue from 'vue'
import App from './App.vue'
import VueCarousel from 'vue-carousel'
import axios from 'axios'
import VueAxios from 'vue-axios'

Vue.config.productionTip = false
Vue.use(VueCarousel)
Vue.use(VueAxios, axios)

new Vue({
  render: h => h(App),
}).$mount('#app')
