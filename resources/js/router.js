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
    },
    {
        /**
         * 指定外のURLを入力した際にhomeにリダイレクトする処理
         */
        path: '/*',
        redirect: 'home'
    }

]
Vue.use(VueRouter);


export default new VueRouter({
    mode: 'history',
    routes: routes
});