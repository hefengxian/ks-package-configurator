import Vue from 'vue'
import Router from 'vue-router'

Vue.use(Router)

export default new Router({
  routes: [
    {
      path: '/',
      component: require('../components/configurator/common').default
    },
    {
      path: '/common',
      name: 'common',
      component: require('../components/configurator/common').default
    },
    {
      path: '/database',
      name: 'database',
      component: require('../components/configurator/database').default
    },
    {
      path: '/analysis',
      name: 'analysis',
      component: require('../components/configurator/analysis').default
    },
    {
      path: '/application',
      name: 'application',
      component: require('../components/configurator/application').default
    },
    {
      path: '/fetch',
      name: 'fetch',
      component: require('../components/configurator/fetch').default
    },
    {
      path: '*',
      redirect: '/'
    }
  ]
})
