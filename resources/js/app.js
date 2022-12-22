import router from "./router";
import "remixicon/fonts/remixicon.css";
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue').default;

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

// Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
import Vue from 'vue'
import Vuetify from 'vuetify'
import 'vuetify/dist/vuetify.min.css'
import AppComponent from "./components/AppComponent";

Vue.use(Vuetify);
const app = new Vue({
    el: '#app',
    vuetify: new Vuetify(),
    router,
    components: {
        "app-component": AppComponent,
    },
});




var startPos = 0,
    winScrollTop = 0;
// scrollイベントを設定
window.addEventListener('scroll', function() {
    winScrollTop = this.scrollY;
    if (winScrollTop >= startPos) {
        // 下にスクロールされた時
        if (winScrollTop >= 200) {
            // 下に200pxスクロールされたら隠す
            document.getElementById('scrollArea').classList.add('hide');
        }
    } else {
        // 上にスクロールされた時
        document.getElementById('scrollArea').classList.remove('hide');
    }
    startPos = winScrollTop;
});