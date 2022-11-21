import Vue from "vue";
import VueRouter from "vue-router";

import Test from './components/Test.vue'
const routes = [{
    path: "/test",
    component: Test
}, ]
Vue.use(VueRouter);


export default new VueRouter({
    mode: 'history',
    routes: routes
});