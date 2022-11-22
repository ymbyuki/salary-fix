import Vue from "vue";
import VueRouter from "vue-router";

import Test from './components/Test.vue'
import Home from './components/Home.vue'

const routes = [{
        path: "/test",
        component: Test
    },
    {
        path: '/home',
        component: Home
    }
]
Vue.use(VueRouter);


export default new VueRouter({
    mode: 'history',
    routes: routes
});