require('./bootstrap');
import Vue from "vue";
import ElementUI from 'element-ui';
Vue.use(ElementUI);
import lang from 'element-ui/lib/locale/lang/ru-RU'
import locale from 'element-ui/lib/locale'
locale.use(lang);
import VueDataTables from 'vue-data-tables';
Vue.use(VueDataTables);

//Components
Vue.component('LoginForm', require('./components/login/Form.vue').default);
Vue.component('HeaderProfile',require('./components/common/HeaderProfile').default)
//Views
Vue.component('HomePage',require('./views/home/index').default);
Vue.component('StaticPages', require('./views/static-page/index').default);






const app = new Vue({
    el: '#app',
    created(){

    },
    data: {
        isLoading: true,

    },
    methods:{

    }
});
