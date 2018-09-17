require('bootstrap')
import Vue from 'vue'
import VueRouter from 'vue-router'
import VueFlashMessage from 'vue-flash-message';
import App from './components/App';
import AddStudent from './components/AddStudent'
import AppNav from './components/AppNav'
import Students from './components/Students'

Vue.use(VueFlashMessage);
Vue.use(VueRouter);

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/add-student',
            name: 'add',
            component: AddStudent
        },
        {
            path: '/students',
            name: 'students',
            component: Students
        },
    ],
});

const app = new Vue({
    el: '#app',
    components: { App, AppNav },
    router,
});