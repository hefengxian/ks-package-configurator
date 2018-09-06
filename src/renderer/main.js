import 'ant-design-vue/dist/antd.css'
import 'github-markdown-css/github-markdown.css'
import 'prismjs/themes/prism.css'

import Vue from 'vue'
import Antd from 'ant-design-vue'

import App from './App'
import router from './router'

if (!process.env.IS_WEB) Vue.use(require('vue-electron'))
Vue.config.productionTip = false

Vue.use(Antd)

/* eslint-disable no-new */
new Vue({
    components: {App},
    router,
    template: '<App/>'
}).$mount('#app')
