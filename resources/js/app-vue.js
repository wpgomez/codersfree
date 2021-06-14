require('./bootstrap');

require('alpinejs');

window.Vue = require('vue').default;

import App from './views/App.vue'
import router from './router'
import store from './store'
import vuetify from './plugins/vuetify'
import proxyConfig from './proxies/_config'

/* Default title tag */
const defaultDocumentTitle = 'Cátalogo D´Lirio'

/* Collapse mobile aside menu on route change & set title */
router.afterEach(to => {
  if (to.meta && to.meta.title) {
    document.title = `${to.meta.title} — ${defaultDocumentTitle}`
  } else {
    document.title = defaultDocumentTitle
  }
})

Vue.config.productionTip = false

Vue.use({
  install (Vue) {
    Object.defineProperty(Vue.prototype, '$proxies', {
      value: proxyConfig
    })
  }
})

const app = new Vue({
  el: '#app',
  components: {App},
  router,
  store,
  vuetify
});