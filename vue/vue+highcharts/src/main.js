import Vue from 'vue';
import iView from 'iview';
import VueRouter from 'vue-router';
import {routers} from "./router.js";
import store from './store/index';
import Vuex from 'vuex';
import App from './app.vue';
import 'iview/dist/styles/iview.css';
// import $ from 'jquery'
// import 'bootstrap/dist/css/bootstrap.min.css'
// import 'bootstrap/dist/js/bootstrap.min'
import VueHighcharts from 'vue-highcharts';
// import HighCharts from 'highcharts'

Vue.use(VueRouter);
Vue.use(Vuex);
Vue.use(iView);
Vue.use(VueHighcharts);

// 路由配置
const RouterConfig = {
    routes: routers
};  

const router = new VueRouter(RouterConfig);

router.beforeEach((r_to, r_from, next) => {
    iView.LoadingBar.start();
    console.log(r_to)
    let to = r_to.path;
    let from  = r_from.path;
    let requireAuth = r_to.meta.requireAuth;
    

    if(to === "/"){
        next({path:'/login'})
    }else{
        if (requireAuth) {
            if (store.state.token != '') {
                next();
            }
            else {
                next({
                    path: '/login',
                    query: {redirect: to}
                })
            }
        }
        else {
            next();
        }
    }
});

router.afterEach(() => {
    iView.LoadingBar.finish();
    window.scrollTo(0, 0);
});

new Vue({
    el: '#app',
    router: router,
    store: store,
    render: h => h(App)
});
