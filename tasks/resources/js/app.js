require('./bootstrap')

window.Vue=require('vue')
window.VueRouter = require('vue-router');
window.VueAxios = require('vue-axios');
window.Axios = require('axios');

let AppLayout = require('./components/App.vue');


const ListTask = Vue.component('ListTask', require('./components/ListTask'));
const AddTask = Vue.component('AddTask', require('./components/AddTask'));
const EditTask = Vue.component('EditTask', require('./components/EditTask'));

Vue.use(VueRouter,VueAxios,axios);

const routes = [
    {
        name: 'ListTask',
        path: '/',
        component: ListTask
    },
    {
        name: 'AddTask',
        path: '/add-task',
        component: AddTask
    },
    {
        name: 'EditTask',
        path: '/edit/:id',
        component: EditTask
    },
]

const router = new VueRouter({mode:history, routes: routes});


new Vue(
    Vue.util.extend(
        {router},
        AppLayout
    ),
).$mount('#app');
