import Vue from 'vue'
import App from './App.vue'
import VueRouter from 'vue-router'
import Users from "./components/Users";

import BootstrapVue from 'bootstrap-vue';
import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'

import User from "./components/User";
import EditUser from "./components/EditUser";
import CreateUser from "./components/CreateUser";



Vue.config.productionTip = false

Vue.use(VueRouter)
Vue.use(BootstrapVue);




const router = new VueRouter({
  routes: [
    // динамические сегменты начинаются с двоеточия
    { path: '/',
      name: 'users',
      component: Users
    },
    { path: '/show/:id',
        name: 'user',
        component: User
    },
      { path: '/create',
          name: 'create',
          component: CreateUser
      },
      { path: '/edit/:id',
          name: 'edit',
          component: EditUser
      },



  ]
})

new Vue({
  render: h => h(App),
  router
}).$mount('#app')
