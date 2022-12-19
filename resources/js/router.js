import Vue from "vue";
import VueRouter from "vue-router";

import Home from './components/Home.vue'
import New from './components/New.vue'

const routes = [{
        path: '/home',
        name: 'home',
        component: Home,
        props: true
    },
    {
        path: '/new',
        component: New
    }

]
Vue.use(VueRouter);


export default new VueRouter({
    mode: 'history',
    routes: routes
});