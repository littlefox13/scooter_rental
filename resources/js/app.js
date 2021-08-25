/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue').default;

import App from './App.vue';
import VueAxios from 'vue-axios';
import VueRouter from 'vue-router';
import axios from 'axios';
import { routes } from './routes';

import moment from 'moment';

Vue.filter('formatDate', function(value) {
    console.log(value);
    if (value) {
        return moment(String(value * 1000)).format('MM/DD/YYYY')
    }
});


/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.use(VueRouter);
Vue.use(VueAxios, axios);


const router = new VueRouter({
    mode: 'history',
    routes: routes
});

router.beforeEach((to, from, next) => {

    let perm = to.meta.permissions;
    console.log(perm);
    console.log(typeof perm);
    if (typeof perm == "undefined") {
        next({name: 'home'});
        return;
    }

    if(perm.indexOf('all') != -1) {
        console.log('all');
        next();
    } else {
        axios.post('/auth/init')
            .then((resp)=>
                {
                    let user = resp.data.user;
                    console.log('user');
                    console.log(user);
                    if (user == null){
                        next({name: 'login'});
                    } else {
                        if (perm.indexOf(user.role) != -1) {
                            next();
                        } else {
                            next({name: 'home'});
                        }
                    }
                });
    }

        /*if (to.name !== 'Login' && !isAuthenticated()) next({ name: 'booking' })
        else next()*/
});

const app = new Vue({
    el: '#app',
    router: router,
    render: h => h(App),
});

/*
const app = new Vue({
    el: '#app',
});
*/


/*
window.onload = function () {
    var app = new Vue({
        el: '#app',
    });
}
*/
